@extends('admin.admin_master')
@section('title', 'Profile | ShoppingAPP - Admin')
@section('page_content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card flex-row align-items-center p-2">
                        <img class="card-img-top img-fluid rounded-circle img-thumbnail avatar-lg" src='{{ asset("storage/img/admin/profile/$user->profile_image") }}' alt="{{$user->profile_image}}" style="object-fit: cover;">
                        <div class="card-body">
                            <p class="display-6" style="font-size: 2em;">{{ $user->name }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-outline-success">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card p-2">
                        <div class="card-body">
                            <div class="row ">
                                <p class="pb-4 display-6 fw-bold" style="font-size: 1.5em;">Information Detail</p>
                                <div class="col-6">
                                    <h4 class="card-title">Name</h4>
                                    <p class="card-title-desc">{{ $user->name }}</p>

                                    <h4 class="card-title">Username</h4>
                                    <p class="card-title-desc">{{ $user->username }}</p>
                                </div>
                                <div class="col-6">
                                    <h4 class="card-title">Email</h4>
                                    <p class="card-title-desc">{{ $user->email }} </p>

                                    <a href="{{ route('password.request') }}" class="btn btn-danger waves-effect">Change Password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert section -->
    @if(session()->has('success'))
        @section('import_custom_script')
            <script src="{{ asset('backend/assets/js/notification.js') }}"></script>
            <script>
                success('{{ session()->get('success') }}');
            </script>
        @endsection
    @endif

@endsection
