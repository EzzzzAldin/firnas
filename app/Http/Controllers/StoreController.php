<?php


namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Services;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('pages.store.index', compact('services'));
    }

    public function category($id)
    {
        $service = Services::with('products')->findOrFail($id);
      
        return view('pages.store.category', compact('service'));
    }

    public function service($id)
    {
        $product = Product::find($id);

        return view('pages.store.service', compact('product'));
    }
}
