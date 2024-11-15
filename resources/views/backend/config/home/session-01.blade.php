@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>
        </div>

        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="banners" class="form-label">Banners</label>

                    <img class="img-fluid img-thumbnail w-100" id="show_banners" style="cursor: pointer"
                        src="{{ showImage($session->banners, 'banner-defaut.jpg') }}" alt=""
                        onclick="document.getElementById('banners').click();">
                    <input type="file" name="banners" id="banners" class="form-control d-none" accept="image/*"
                        onchange="previewImage(event, 'show_banners')">

                        @error('banners')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
