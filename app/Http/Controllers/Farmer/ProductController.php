<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farmer.products.index')->with([
            'products' => Product::where('user_id', Auth::user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmer.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if($request->hasFile('photo')){
            $ext = $request->file('photo')->getClientOriginalExtension();
            $name = uniqid().".".$ext;

            $path = $request->file('photo')->storeAs('images/products',$name,'public');
            $data['photo'] = $path;
        }

        Product::create($data);
        return redirect()->route('farmer.products.index')->with('success','Product added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('farmer.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('farmer.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        if($request->hasFile('photo')){
            $ext = $request->file('photo')->getClientOriginalExtension();
            $name = uniqid().".".$ext;

            $path = $request->file('photo')->storeAs('images/products',$name,'public');
            $data['photo'] = $path;
        }

        $product->update($data);
        return redirect()->route('farmer.products.index')->with('success','Product updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('farmer.products.index')->withSuccess('Product removed');
    }
}
