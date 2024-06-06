@extends('auth.auth_master')
@section('title', 'Forgot Password | ShoppingApp - Admin')
@section('content')

    <div class="card">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="/dashboard" class="auth-logo">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Forgot Password</b></h4>

            <div class="p-3">

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        Forgot your password? No problem. Just let us know your <strong> email address </strong> and we will email you a password reset link that will allow you to choose a new one.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <!-- Email Address -->
                    <div class="form-group mb-3">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                            <span>{{ $errors->first('email') }}</span>
                        </div>
                    </div>

                    <div class="form-group pb-2 text-center row mt-3">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Send Email</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end cardbody -->
    </div>
    <!-- end card -->

@endsection
