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


        {{-- products block --}}
        <div class="row my-3 bg-light p-3 rounded">
            <div class="col-12">
                <div class="clearfix">
                    <div class="float-left">
                        Recently verified
                    </div>
                    <div class="float-right">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-12 col-md-3">
                <div class="card h-100">
                    <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded" src="{{ asset('storage/'.$product->photo) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->title }}</h4>
                        <p class="card-text">Price: <i class="fa fa-inr" aria-hidden="true"></i> {{ $product->price }} / {{ $product->unit }}</p>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('products.show', $product->id) }}">View</a>

                        <form action="{{ route('carts.store') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-primary">Add to cart</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- end of products block --}}

        {{-- news block --}}
        <div class="row my-3 bg-light p-3 rounded">
            <div class="col-12">
                <div class="clearfix">
                    <div class="float-left">
                        Recent news
                    </div>
                    <div class="float-right">
                        <a href="{{ route('news.index') }}" class="btn btn-outline-primary">View All</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($recent_news as $news)
            <div class="col-12 col-md-3">
                <div class="card h-100">
                    <img class="card-img-top w-100 img-fluid img-thumbnail p-4 border-0 rounded" src="{{ asset('storage/'.$news->thumbnail) }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title">{{ $news->title }}</h4>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('news.show', $news->id) }}">View</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- end of news block --}}
    </div>
@endsection
