<?php

use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WelcomeController;

Route::get('/generate-sitemap', function () {
    SitemapGenerator::create('https://firnasagency.com/')
        ->writeToFile(public_path('sitemap.xml'));

    return 'Sitemap generated!';
});
// payment
// 🛒 إنشاء جلسة الدفع
Route::post('/orders-submit/{id}', [OrderController::class, 'createSession'])
    ->name('order.submit');

// 🔁 صفحة العودة بعد الدفع (Callback)
Route::get('/callback', [OrderController::class, 'handleCallback'])
    ->name('payment.callback');

// ❌ صفحة فشل الدفع (تظهر عند failureRedirect)
Route::get('/payment-failed', function () {
    return redirect('/store')->with('message', '❌ Payment failed. Please try again.');
})->name('payment.failed');

// 🔔 Webhook من Kashier (الخادم → الخادم)
Route::post('/webhook/kashier', [OrderController::class, 'webhook'])
    ->name('webhook.kashier');

// Blogs
Route::get('/blogs', function () {
    $blogs = config('blogs');
    return view('pages.blogs', compact('blogs'));
})->name('blogs.index');

Route::get('/blogs-details/{id}', function ($id) {
    $blogs = config('blogs');
    $blog = collect($blogs)->firstWhere('id', $id);

    if (!$blog) {
        abort(404);
    }

    $suggestions = collect($blogs)
        ->where('id', '!=', $id)
        ->shuffle()
        ->take(3)
        ->values();

    return view('pages.blogs-details', compact('blog', 'suggestions'));
})->name('blogs.details');
// Store
Route::get('/store', [StoreController::class, 'index'])->name('store.index');
Route::get('/store/category/{id}', [StoreController::class, 'category'])->name('store.category');
Route::get('/store/service/{id}', [StoreController::class, 'service'])->name('store.service');

Route::get('/blogs/category/{category}', function ($category) {
    $blogs = collect(config('blogs'))->filter(function ($blog) use ($category) {
        return $blog['category'] === $category;
    });

    return view('pages.blogs-category', [
        'blogs' => $blogs,
        'category' => $category,
    ]);
})->name('blogs.category');

// Portfolio
Route::get('/portfolio', function () {
    $projects = config('projects');
    return view('pages.portfolio', compact('projects'));
})->name('portfolio.index');

Route::get('/portfolio-details/{id}', function ($id) {
    $projects = config('projects');
    $project = collect($projects)->firstWhere('id', $id);

    if (!$project) {
        abort(404);
    }

    return view('pages.portfolio-details', compact('project'));
})->name('portfolio.details');

// Services
Route::get('/services', function () {
    $serviceCategories = config('services-Ha');
    return view('pages.services', compact('serviceCategories'));
})->name('services.index');

Route::get('/services-details/{id}', function ($id) {
    $serviceCategories = config('services-Ha');

    $service = collect($serviceCategories)
        ->flatMap(fn($category) => $category['services'])
        ->firstWhere('id', $id);

    if (!$service) {
        abort(404);
    }

    return view('pages.services-details', compact('service'));
})->name('services.details');

// Contact
Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/learn', function () {
    $videos = config('learn');
    return view('pages.learn', compact('videos'));
});

Route::get('/education-details', function () {
    return view('pages.education-details');
})->name('education.details');

Route::get('/refresh-csrf', function () {
    return response()->json(['token' => csrf_token()]);
});
Route::get('/{page?}', function ($page = 'index') {
    $availablePages = ['index', 'about-us', 'contact-us', 'education'];

    if (!in_array($page, $availablePages)) {
        abort(404);
    }

    $data = [];

    if ($page === 'education') {
        $data['books'] = array_slice(config('education'), 0, 8);
        $data['learn_videos'] = array_slice(config('learn'), 0, 3);
    }

    return view("pages.$page", $data);
});
//chatbot
Route::get('/chatbot/questions', [ChatbotController::class, 'getQuestions']);
Route::post('/chatbot/answer', [ChatbotController::class, 'storeAnswer']);
Route::post('/chatbot/authenticate', [ChatbotController::class, 'authenticateUser'])->name('chatbot.authenticate');
Route::post('/chatbot/logout', [ChatbotController::class, 'logout'])->name('chatbot.logout');
// Route::post('/welcome/store', [WelcomeController::class, 'store'])->name('welcome.store');
Route::get('/chatbot/history', [ChatbotController::class, 'history']);
