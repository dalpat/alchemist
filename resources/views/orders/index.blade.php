@extends('layouts.app')


@section('content')

    <div class="container">
        <h2 class="card-header">Things that you've bought</h2>
        <div class="row">
            <div class="col-12">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Order Number</th>
                            <th>Bought from</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->created_at->diffForHumans() }}</td>
                                <td>{{ $order->order_number }}
                                    <button class="btn">
                                        Items <span class="badge badge-info">{{ count($order->items) }}</span>
                                </button></td>
                                <td>{{ $order->seller->name }}</td>
                                <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="row" colspan="3">No orders yet</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
