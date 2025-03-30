@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h4>Welcome, {{ Auth::user()->name }}!</h4>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>

                    <hr>

                    <div class="d-grid gap-2">
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        <a href="{{ route('password.change') }}" class="btn btn-secondary">Change Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
