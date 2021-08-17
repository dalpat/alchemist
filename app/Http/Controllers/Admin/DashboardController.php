<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $users = User::where('id','!=',Auth::user()->id)->get();
        return view('admin.dashboard.index', compact('products','users'));
    }
}
