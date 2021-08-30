@extends('layouts.app')


@section('content')

    <div class="container">
        <h2 class="card-header">Things that you've sold</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-light table-striped table-light">
                    <thead>
                        <tr>
                            <th>Created on</th>
                            <th>Order Number</th>
                            <th>Sold to</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sales as $sale)
                            <tr>
                                <td scope="row">{{ $sale->created_at }}</td>
                                <td>{{ $sale->order_number }}</td>
                                <td>{{ $sale->buyer->name }}</td>

                                <td><a href="{{ route('sales.show', $sale->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row" colspan="3">No sales yet</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
