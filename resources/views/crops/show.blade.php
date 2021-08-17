@extends('layouts.app')


@section('content')


    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Success</strong> {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>!</strong> {{ session('error') }}
            </div>
        @endif


        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{ asset('storage/' . $product->photo) }}" alt="" class="img-thumbnail">
            </div>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text"><i class="fa fa-inr" aria-hidden="true"></i>
                            {{ $product->price . '/' . $product->unit }}</p>
                        <p class="card-text">Farmer: {{ $product->farmer->name }}</p>

                        <form action="{{ route('carts.store') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-primary">Add to cart</button>
                        </form>

                        <a href="#details" class="btn btn-link">View details</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4 p-4 bg-white">
            <div class="col-12">
                <h1 id="details">Product Description</h1>
                <p>
                    {{ $product->description }}
                </p>
                <p>Provided by: {{ $product->farmer->name }}</p>
            </div>
        </div>
    </div>




@endsection
