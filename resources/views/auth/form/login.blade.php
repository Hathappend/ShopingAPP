@extends('auth.auth_master')
@section('title', 'Login | ShoppingApp - Admin')
@section('content')

    <div class="card">
        <div class="card-body">

            <div class="text-center mt-4">
                <div class="mb-3">
                    <a href="index.html" class="auth-logo">
                        <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                        <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                    </a>
                </div>
            </div>

            <h4 class="text-muted text-center font-size-18"><b>Sign In</b></h4>

            <div class="p-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Username or Email Address -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="usernameOrEmail" name="usernameOrEmail" type="text" placeholder="Username" value="{{ old('usernameOrEmail') }}" autofocus autocomplete="username">
                            <span>{{ $errors->first('usernameOrEmail') ?? '' }}</span>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <input class="form-control" id="password" name="password" type="password" placeholder="Password" autocomplete="current-password">
                            <span>{{ $errors->first('password') ?? '' }}</span>
                        </div>
                    </div>

                    <div class="form-group mb-3 row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                <label class="form-label ms-1" for="customCheck1">Remember me</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center row mt-3 pt-1">
                        <div class="col-12">
                            <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group mb-0 row mt-2">
                        <div class="col-sm-7 mt-3">
                            <a href="{{ route('password.request') }}" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                        </div>
                        <div class="col-sm-5 mt-3">
                            <a href="{{ route('register') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Create an account</a>
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

