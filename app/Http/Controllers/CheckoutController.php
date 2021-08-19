<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
        $cart = Auth::user()->cart;
        return view('checkout.confirmation', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function placeorder(Request $request)
    {

        $request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required'],
            'mobile'=>['required'],
            'landmark'=>['required'],
            'pincode'=>['required'],
            'address'=>['required'],
        ]);

        $cart =  Cart::where('vendor_id', Auth::user()->id)->first();

        $data['buyer_id'] = Auth::user()->id;
        $data['seller_id'] = $cart->product->user->id;
        $data['order_number'] = Str::upper(uniqid());
        $order = Order::create($data);

        $itemData = $cart->product;

        $itemData['order_number'] = $order->order_number;
        $itemData['product_id'] = $cart->product->id;
        $itemData['product_title'] = $cart->product->title;
        $itemData['product_price'] = $cart->product->price;
        $itemData['order_id'] = $order->id;
        $itemData['payment_status'] = 'PENDING';
        $itemData['delivery_status'] = 'PENDING';
        $itemData['order_number'] = $order->order_number;

        $orderItem = OrderItem::create($itemData);

        $addressData = $request->all();
        $addressData['order_id'] = $order->id;
        $addressData['order_number'] = $order->order_number;

        $orderAddress = OrderAddress::create($addressData);

        return redirect()->route('checkout.thankyou')->withSuccess('Order Placed successfully. Your order number is '.$order->order_number);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
