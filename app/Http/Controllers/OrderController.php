<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // public function index()  {
    //     $orders = Order::all();
    //     return view('order.index',compact('orders'));
    // }

    // public function create()  {
    //     return view('order.create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Order::create($request->all());
        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function initiatePayment(Request $request, $id)
    {

        $totalPrice = $request->totalPrice;
        $order = Product::find($id);
        $currency = "USD"; //your currency

        $kashierOrderHash = $this->generateKashierOrderHash($order, $currency, $totalPrice);

        $paymentUrl = "https://checkout.kashier.io/?merchantId=MID-39252-773" .
            "&mode=test" .
            "&merchantOrderId={$order->id}" . // ✅ استخدم merchantOrderId مش orderId
            "&orderId={$order->id}" . // ممكن تسيبه كمان لو حابب
            "&amount={$totalPrice}" .
            "&currency={$currency}" .
            "&hash={$kashierOrderHash}" .
            "&allowedMethods=card,bank_installments,wallet,fawry" .
            "&merchantRedirect=" . urlencode('http://firnas_30_9_2025.test/callback') .
            "&failureRedirect=" . urlencode('http://firnas_30_9_2025.test/failure') .
            "&redirectMethod=get" .
            "&brandColor=%2300bcbc" .
            "&display=en";
        return redirect()->away($paymentUrl);
    }


    private function generateKashierOrderHash($order, $currency, $totalPrice)
    {
        $mid = "MID-39252-773"; //your merchant id
        $amount = $totalPrice; //eg: 100
        $currency = $currency;
        $orderId = $order->id; //eg: 99, your system order ID
        $secret = "b21ba6f8-9a34-4263-bd7a-8d3a83ade2cc";
        $path = "/?payment=" . $mid . "." . $orderId . "." . $amount . "." . $currency . (isset($CustomerReference) ? ("." . $CustomerReference) : null);
        $hash = hash_hmac('sha256', $path, $secret, false);
        return $hash;
    }

    public function handleCallback(Request $request)
    {
        $secret = 'b21ba6f8-9a34-4263-bd7a-8d3a83ade2cc';
        Log::info('Callback hit with parameters: ', $request->all());

        $queryString = "";
        foreach ($request->query() as $key => $value) {
            if ($key === "signature" || $key === "mode") continue;
            $queryString .= "&{$key}={$value}";
        }
        $queryString = ltrim($queryString, "&");

        $signature = hash_hmac('sha256', $queryString, $secret, false);

        if ($signature === $request->query("signature")) {
            $paymentStatus = $request->query('paymentStatus');
            $merchantOrderId = $request->query('merchantOrderId'); // ✅ ده اللي بنستخدمه
            $transactionId = $request->query('transactionId');

            $order = Order::find($merchantOrderId);

            if (!$order) {
                return redirect('/store')->with('message', '⚠ Order not found.');
            }

            if ($paymentStatus === 'SUCCESS') {
                $order->update([
                    'payment_transaction_id' => $transactionId,
                    'payment_method' => 'online-payment',
                    'payment_status' => "Completed",
                ]);
                return redirect('/store')->with('message', '✅ تم الدفع بنجاح');
            } elseif ($paymentStatus === 'CANCELLED') {
                $order->update([
                    'payment_transaction_id' => $transactionId,
                    'payment_method' => 'online-payment',
                    'payment_status' => "Cancelled"
                ]);
                return redirect('/store')->with('message', '🚫 تم إلغاء العملية');
            } else {
                $order->update([
                    'payment_transaction_id' => $transactionId,
                    'payment_method' => 'online-payment',
                    'payment_status' => "Failed"
                ]);
                return redirect('/store')->with('message', '❌ فشلت عملية الدفع');
            }
        } else {
            Log::error('Invalid signature: ', $request->all());
            return redirect('/store')->with('message', '⚠ توقيع غير صالح.');
        }
    }
}
