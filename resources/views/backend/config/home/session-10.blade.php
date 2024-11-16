@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $title }}</h4>
                </div>

                <div class="card-body">


                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" placeholder="Tiêu đề" name="title"
                                    value="{{ old('title', $session->title) }}" class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="content" class="form-label">Nội dung ngắn</label>
                                <input type="text" placeholder="Nội dung ngắn" name="content"
                                    value="{{ old('content', $session->content) }}" class="form-control">
                                @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 col-6">
                                <label for="image" class="form-label">Ảnh</label>
                                <img class="img-fluid img-thumbnail w-75" id="show_image" style="cursor: pointer"
                                    src="{{ showImage($session->image, 'image_default.jpg') }}" alt=""
                                    onclick="document.getElementById('image').click();">
                                    <br>
                                <input type="file" name="image" id="image" class="form-control d-none"
                                    accept="image/*" onchange="previewImage(event, 'show_image')">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>

                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>



@endsection

@push('styles')
@endpush


@push('scripts')
    </script>
@endpush
