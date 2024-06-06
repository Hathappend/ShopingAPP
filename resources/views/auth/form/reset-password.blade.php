@extends('auth.auth_master')
@section('title', 'Reset Password | ShoppingApp - Admin')
@section('content')

    <div class="card">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="index.html" class="auth-logo">
                        <img src="{{ asset('assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                        <img src="{{ asset('assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Reset Password</b></h4>

            <div class="p-3">
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" autofocus autocomplete="username">
                            <span>{{ $errors->first('email') ?? '' }}</span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" autocomplete="new-password">
                            <span>{{ $errors->first('password') ?? '' }}</span>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Password Confirmation" autocomplete="new-password">
                            <span>{{ $errors->first('password_confirmation') ?? '' }}</span>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">RESET PASSWORD</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- end -->
        </div>
        <!-- end cardbody -->
    </div>
    <!-- end card -->

@endsection

