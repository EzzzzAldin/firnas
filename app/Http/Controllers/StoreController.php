<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('pages.store.index');
    }

    public function category($id)
    {
        return view('pages.store.category', compact('id'));
    }

    public function service($id)
    {
        return view('pages.store.service', compact('id'));
    }
}
