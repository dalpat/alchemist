@extends('layouts.farmer')


@section('content')

    <div class="container">
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <a href="{{ route('farmer.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="200">Updated on</th>
                            <th>Title</th>
                            <th>Price/Unit</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td scope="row">{{ $product->updated_at }}</td>
                                <td>{{ $product->title }}</td>
                                <td><i class="fa fa-inr" aria-hidden="true"></i> {{ $product->price . '/' . $product->unit }}</td>
                                <td><span class="badge badge-info h4">{{ $product->status }}</span></td>
                                <td>
                                    <a href="{{ route('farmer.products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('farmer.products.destroy', $product->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
