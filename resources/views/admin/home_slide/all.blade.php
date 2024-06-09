@extends('admin.admin_master')
@section('title', 'Home Slider | ShoppingAPP - Admin')
@section('page_content')

    <section id="home_slider">
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
                                <h4 class="card-title">Home Slide</h4>
                                <p class="card-title-desc">In this section, you have the flexibility to update various details of Home Slider such as title, short title, video, and slider image.</p>

                                <form class="custom-validation" action="{{ route('admin.update.slider') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $homeslide->id ?? ''}}">

                                    <div class="mb-3">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control @error('title') parsley-error @enderror" required="" value="{{ $homeslide->title ?? '' }}" placeholder="Enter your home slide title" data-parsley-id="5" aria-describedby="parsley-id-5"><ul class="parsley-errors-list filled" id="parsley-id-5" aria-hidden="false"><li class="parsley-required">@error('title') {{ $message }} @enderror</li></ul>
                                    </div>

                                    <div class="mb-3">
                                        <label>Short Title</label>
                                        <div>
                                            <input type="text" name="short_title" class="form-control @error('short_title') parsley-error @enderror" required="" value="{{ $homeslide->short_title ?? ''}}" placeholder="Enter your home slide short title" data-parsley-id="11" aria-describedby="parsley-id-11"><ul class="parsley-errors-list filled" id="parsley-id-11" aria-hidden="false"><li class="parsley-required">@error('short_title') {{ $message }}@enderror</li></ul>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Video URL</label>
                                        <div>
                                            <input type="text" name="video_url" class="form-control @error('video_url') parsley-error @enderror" required="" value="{{ $homeslide->video_url ?? '' }}" placeholder="Enter your home slide video URL" data-parsley-id="11" aria-describedby="parsley-id-11"><ul class="parsley-errors-list filled" id="parsley-id-11" aria-hidden="false"><li class="parsley-required">@error('video_url') {{ $message }}@enderror</li></ul>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Slider Image</label>
                                        <div class="input-group">
                                            <input type="file" name="home_slide" class="form-control"  value="{{ $homeslide->home_slide ?? ''}}" id="image">
                                        </div>

                                        @error('home_slide')
                                        <span class="text-danger p-2 ">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                    <div class="mb-3">
                                        <img id="showImage" src='{{ !empty($homeslide->home_slide) ? asset("storage/img/admin/home_slide/{$homeslide->home_slide}") : asset("storage/img/no-image-available.jpeg") }}' class="rounded img-thumbnail" alt="Card Image Cap">
                                    </div>
                                    <div class="mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Submit
                                            </button>
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
        @if(session()->has('success'))

            <script src="{{ asset('backend/assets/js/notification.js') }}"></script>
            <script>
                success('{{ session()->get('success') }}');
            </script>
        @endif

        <script src="{{ asset('backend/assets/js/script.js') }}"></script>
        <script>
            showImageByUserInput()
        </script>
    @endsection

@endsection
