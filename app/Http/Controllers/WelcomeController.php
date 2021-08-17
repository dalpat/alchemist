<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\News;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::where('status','VERIFIED')->take(4)->latest()->get();
        $recent_news = News::where('status','PUBLISH')->take(4)->latest()->get();

        return view('welcome',compact('products','recent_news'));
    }
}
