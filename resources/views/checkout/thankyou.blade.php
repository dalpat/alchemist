@extends('layouts.app')


@section('content')


    <div class="container">
        <div class="row">
            <div class="col">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>





@endsection
