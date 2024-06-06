@extends('auth.auth_master')
@section('title', 'Forgot Password | ShoppingApp - Admin')
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

            <h4 class="text-muted text-center font-size-18"><b>Forgot Password</b></h4>

            <div class="p-3">

                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    @if(session('status') == 'verification-link-sent')
                        <br><br>
                        A new verification link has been sent to the email address you provided during registration.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif
                </div>

                <div class="row justify-content-between">
                    <div class="col-9">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="form-group pb-2 text-center row mt-3">
                                <div class="col-10">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Resend Verification Email</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <div class="form-group pb-2 text-center row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-outline-danger waves-effect waves-light" type="submit">Log Out</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
        <!-- end cardbody -->
    </div>
    <!-- end card -->

@endsection
