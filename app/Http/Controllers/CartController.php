<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $carts = Cart::with('product')->where('vendor_id', Auth::user()->id)->get();

        // $total_bill_amount = 0;

        // foreach ($carts as $cart) {
        //     $total_bill_amount += ($cart->product->price * $cart->quantity);
        // }

        // return view('carts.index', compact('carts','total_bill_amount'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();
        if ($cart) {
            $cart->delete();
        }

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Cart::create($data);
        return redirect()->route('checkout.confirmation');
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $data = $request->all();

        $cart->update($data);
        return redirect()->back()->with('success', 'cart updated');
    }
}
