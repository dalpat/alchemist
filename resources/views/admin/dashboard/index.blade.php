@extends('layouts.admin')


@section('content')

<h1 class="h3 mb-4 text-gray-800">Admin Dashboard</h1>

<div class="card-deck">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-text">{{ count($users) }}</p>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">Products</h4>
            <p class="card-text">{{ count($products) }}</p>
        </div>
    </div>
</div>



@endsection
