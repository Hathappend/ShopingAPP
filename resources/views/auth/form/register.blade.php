@extends('auth.auth_master')
@section('title', 'Register | ShoppingApp')
@section('content')

    <div class="card">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="/dashboard" class="auth-logo">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                        <img src="{{ asset('assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

            <div class="p-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" autofocus autocomplete="name">
                            <span>{{ $errors->first('name') }}</span>
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="username" type="text" placeholder="Username" name="username" value="{{ old('username') }}" autocomplete="username">
                            <span>{{ $errors->first('username') }}</span>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email">
                            <span>{{ $errors->first('email') }}</span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" autocomplete="new-password">
                            <span>{{ $errors->first('password') }}</span>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" placeholder="Password Confirmation" autocomplete="new-password">
                            <span>{{ $errors->first('password_confirmation') }}</span>
                        </div>
                    </div>

                    <div class="form-group text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group mt-2 mb-0 row">
                        <div class="col-12 mt-3 text-center">
                            <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
        <!-- end cardbody -->
    </div>
    <!-- end card -->

@endsection
