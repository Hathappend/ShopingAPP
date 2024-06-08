@extends('admin.admin_master')
@section('title', 'Edit Profile | ShoppingAPP - Admin')
@section('page_content')
    <section id="edit">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="card">

                            @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="mdi mdi-block-helper me-2"></i>
                                    {{ session()->get('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="card-body">
                                <h4 class="card-title">Edit Profile</h4>
                                <p class="card-title-desc">In this section, you have the flexibility to update various details such as name, profile picture, contact information, and privacy settings. This ensures that profiles remain accurate and up-to-date, reflecting any changes in personal live</p>

                                <form class="custom-validation" action="{{ route('admin.profile.postEdit') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control @error('full_name') parsley-error @enderror" required="" value="{{ $user->name }}" placeholder="Enter your full name" data-parsley-id="5" aria-describedby="parsley-id-5"><ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false"><li class="parsley-required">@error('full_name') {{ $message }}@enderror</li></ul>
                                    </div>

                                    <div class="mb-3">
                                        <label>Username</label>
                                        <div>
                                            <input type="text" name="username" class="form-control @error('username') parsley-error @enderror" required="" value="{{ $user->username }}" placeholder="Enter your new username" data-parsley-id="11" aria-describedby="parsley-id-11"><ul class="parsley-errors-list filled" id="parsley-id-11" aria-hidden="false"><li class="parsley-required">@error('username') {{ $message }}@enderror</li></ul>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>E-Mail</label>
                                        <div>
                                            <input type="email" name="email" class="form-control @error('email') parsley-error @enderror" required="" value="{{ $user->email }}" parsley-type="email" placeholder="Enter a valid e-mail" data-parsley-id="11" aria-describedby="parsley-id-11"><ul class="parsley-errors-list filled" id="parsley-id-11" aria-hidden="false"><li class="parsley-required">@error('email') {{ $message }}@enderror</li></ul>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Profile Photo</label>
                                        <div class="input-group">
                                            <input type="file" name="profile_image" class="form-control"  value="{{ $user->profile_image }}" id="image">
                                        </div>

                                        @error('profile_image')
                                            <span class="text-danger p-2 ">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <img id="showImage" src='{{ asset("storage/img/admin/profile/{$user->profile_image}") }}' class="rounded img-thumbnail" alt="Card Image Cap">
                                    </div>
                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Submit
                                            </button>
                                            <a href="{{ route('admin.profile') }}" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div><!-- end row -->
            </div>
        </div>
    </section>

    @section('import_custom_script')
        <script src="{{ asset('backend/assets/js/script.js') }}"></script>
        <script>

            showImageByUserInput()

        </script>
    @endsection

@endsection
