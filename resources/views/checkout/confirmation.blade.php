@extends('layouts.app')


@section('content')


    <div class="container">
        @if (session('success'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('checkout.placeorder') }}" method="post">
            <div class="row">
                @csrf
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">Provide address for delivery</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    aria-describedby="helpId" placeholder="">
                                @error('first_name')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    aria-describedby="helpId" placeholder="">
                                @error('first_name')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelpId" placeholder="">
                                @error('email')
                                    <small id="emailHelpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" class="form-control" name="mobile" id="mobile"
                                    aria-describedby="helpId" placeholder="10 digit only">
                                @error('mobile')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="landmark">Landmark</label>
                                <input type="text" class="form-control" name="landmark" id="landmark"
                                    aria-describedby="helpId" placeholder="Landmark">
                                @error('landmark')
                                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                                @error('address')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pincode">pincode</label>
                                <input type="number" class="form-control" name="pincode" id="pincode"
                                    aria-describedby="helpId" placeholder="">
                                @error('address')
                                    <small id="helpId" class="form-text text-muted">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Place Order</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">Order Details</div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $cart->product->title }}</h4>
                            <p class="card-text"><i class="fa fa-inr" aria-hidden="true"></i> {{ $cart->product->price }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>




@endsection
