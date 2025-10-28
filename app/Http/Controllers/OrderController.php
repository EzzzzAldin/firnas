<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function createSession(Request $request, $id)
    {
        $product = Product::findOrFail($id);
   

        $currency = "EGP";
        $amount = number_format($product->price, 2, '.', '');
        $orderId = uniqid('ORD_');


        $customerEmail = $request->input('email', 'guest@example.com');
        $customerMobile = $request->input('mobile', '01000000000');
        $customerName = $request->input('name', 'Guest User');

        dd($request->all());
        $order = Order::create([
            'user_id' => null,
            'product_id' => $product->id,
            'product_name' => $product->name,
            'price' => $amount,
            'currency' => $currency,
            'payment_status' => 'Pending',
            'customer_email' => $customerEmail,
            'customer_mobile' => $customerMobile,
            'customer_name' => $customerName,
            'order_reference' => $orderId,
        ]);


        $merchantId = env('KASHIER_MERCHANT_ID');
        $apiKey = env('KASHIER_API_KEY');
        $secretKey = env('KASHIER_SECRET_KEY');

        // 🧭 API endpoint
        $endpoint = "https://test-api.kashier.io/v3/payment/sessions";

        // 🕒 بيانات الـ Session
        $payload = [
            "expireAt" => now()->addDay()->toIso8601String(),
            "maxFailureAttempts" => 3,
            "paymentType" => "credit",
            "amount" => $amount,
            "currency" => $currency,
            "order" => $order->order_reference,
            "merchantRedirect" => route('payment.callback'),
            "display" => "en",
            "type" => "one-time",
            "allowedMethods" => "card,wallet",
            "redirectMethod" => null,
            "iframeBackgroundColor" => "#FFFFFF",
            "metaData" => [
                "customKey" => "customValue",
                "displayNotes" => ["order_ref" => $orderId],
            ],
            "merchantId" => $merchantId,
            "failureRedirect" => false,
            "brandColor" => "#FF5733",
            "defaultMethod" => "card",
            "description" => "Payment for order {$orderId}",
            "manualCapture" => false,
            "customer" => [
                "email" => $customerEmail,
                "reference" => $customerMobile,
            ],
            "saveCard" => "optional",
            "retrieveSavedCard" => true,
            "interactionSource" => "ECOMMERCE",
            "enable3DS" => true,
            "serverWebhook" => route('webhook.kashier'),
            "notes" => "Special handling required"
        ];


        $response = Http::withHeaders([
            'Authorization' => $secretKey,
            'api-key' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($endpoint, $payload);

        $data = $response->json();
        Log::info('Kashier create session response:', $data ?? ['raw' => $response->body()]);


        if ($response->successful() && isset($data['sessionUrl'])) {
            $order->update([
                'payment_session_id' => $data['_id'] ?? null,
            ]);
            return redirect()->away($data['sessionUrl']);
        }


        return response()->json([
            'status' => $response->status(),
            'error' => $response->body(),
        ], $response->status());
    }


    public function handleCallback(Request $request)
    {
        $paymentStatus = $request->query('paymentStatus', 'UNKNOWN');
        $orderId = $request->query('merchantOrderId');
        $transactionId = $request->query('transactionId');

        Log::info('Kashier callback received', $request->all());

        $order = Order::where('order_reference', $orderId)->first();
        if (!$order) {
            return redirect('/store')->with('message', '⚠️ Order not found.');
        }

        if ($paymentStatus === 'SUCCESS') {
            $order->update([
                'payment_transaction_id' => $transactionId,
                'payment_status' => 'Completed',
            ]);
            return redirect('/store')->with('message', '✅ Payment completed successfully.');
        } elseif ($paymentStatus === 'FAILED') {
            $order->update(['payment_status' => 'Failed']);
            return redirect('/store')->with('message', '❌ Payment failed.');
        } elseif ($paymentStatus === 'CANCELLED') {
            $order->update(['payment_status' => 'Cancelled']);
            return redirect('/store')->with('message', '🚫 Payment was cancelled.');
        }

        return redirect('/store')->with('message', '⚠️ Unknown payment status.');
    }


    public function webhook(Request $request)
    {
        $payload = $request->all();
        Log::info('Kashier Webhook received:', $payload);

        if (!isset($payload['data']['merchantOrderId'])) {
            return response('Invalid payload', 400);
        }

        $orderId = $payload['data']['merchantOrderId'];
        $status = $payload['data']['status'] ?? 'UNKNOWN';
        $transactionId = $payload['data']['transactionId'] ?? null;

        $order = Order::find($orderId);
        if (!$order) {
            return response('Order not found', 404);
        }

        switch ($status) {
            case 'SUCCESS':
                $order->update([
                    'payment_transaction_id' => $transactionId,
                    'payment_status' => 'Completed',
                ]);
                break;
            case 'FAILED':
                $order->update(['payment_status' => 'Failed']);
                break;
            case 'CANCELLED':
                $order->update(['payment_status' => 'Cancelled']);
                break;
        }

        return response('Webhook processed', 200);
    }
}
