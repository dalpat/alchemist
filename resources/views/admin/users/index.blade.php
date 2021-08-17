@extends('layouts.admin')


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

        <div class="row my-3">
            <div class="col-12">
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="200">Updated on</th>
                            <th>User</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $user->updated_at }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ count($user->products) }}
                                </td>
                                <td>
                                    <span class="badge badge-info h4">{{ $user->status }}</span>
                                    @if ($user->status != 'VERIFIED')
                                        <form action="{{ route('admin.users.update', $user->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="VERIFIED">
                                            <button type="submit" class="badge badge-success border-0"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        </form>
                                    @endif

                                </td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm roudned">View</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection
