@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">{{ $title }}</h4>
                </div><!-- end card header -->

                <div class="card-body">

                    <div class="dropzone">
                        <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                        </div>
                        <div class="dz-message needsclick">
                            <div class="mb-3">
                                <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                            </div>

                            <h4>Drop files here or click to upload.</h4>
                        </div>
                    </div>

                </div>
                <!-- end card body -->
            </div>

            <div id="dropzone-preview" class="row">
                @foreach ($session as $item)
                    <div class="col-12 col-sm-6 col-md-3 mt-2" id="dropzone-preview-list-{{ $item->id }}">
                        <div class="image-preview-container position-relative">
                            <img class="img-fluid rounded" src="{{ showImage($item->image) }}" alt="Image">

                            <p class="fs-13 text-muted my-2">{{ getSize($item->image) }}</p>

                            <button data-id="{{ $item->id }}" type="button"
                                class="btn btn-danger btn-sm delete position-absolute top-0 end-0 m-2"
                                id="sa-image">X</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <div id="preview-template" style="display: none;">
                <div class="col-12 col-sm-6 col-md-3 mt-2">
                    <div class="image-preview-container position-relative">
                        <img data-dz-thumbnail class="img-fluid rounded" src="" alt="Image">
                        <button type="button" data-dz-remove
                            class="btn btn-sm btn-danger delete position-absolute top-0 end-0 m-2">X</button>
                        <p class="fs-13 text-muted my-2" data-dz-size></p>
                    </div>
                </div>
            </div>



        </div>
    </div>



@endsection

@push('styles')
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/dropzone/dropzone.css') }}" type="text/css" />

    {{-- <link rel="stylesheet" href="{{ asset('backend/assets/libs/filepond/filepond.min.css') }}" type="text/css" /> --}}
    {{-- <link rel="stylesheet"
        href="{{ asset('backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}"> --}}

    <style>
        #dropzone-preview {
            margin-top: 15px;
        }

        .image-preview-container {
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #f8f9fa;
        }

        .delete {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .delete:hover {
            background-color: red;
        }

        .image-preview-container img {
            width: 100%;
            max-width: 100%;
            height: auto;
            display: block;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/dropzone/dropzone-min.js') }}"></script>

    {{-- <script src="{{ asset('backend/assets/libs/filepond/filepond.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"> --}}
    </script>
    {{-- <script
        src="{{ asset('backend/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script> --}}
    {{-- <script
        src="{{ asset('backend/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script> --}}
    {{-- <script src="{{ asset('backend/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}">
    </script> --}}


    <script>
        $(document).ready(function() {
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                deleteImage(id);
            });

            window.deleteImage = function(id) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('admin.configuration.image.destroy', ':id') }}".replace(':id',
                        id),
                    success: function(response) {
                        console.log(response);
                        $('#dropzone-preview-list-' + id).remove();

                        toastDelete();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                        toastError();
                    }
                });
            }

            var dropzone = new Dropzone(".dropzone", {
                url: "{{ route('admin.configuration.postSession', 7) }}",
                method: "post",
                acceptedFiles: "image/*",
                previewTemplate: document.querySelector('#preview-template').innerHTML,
                previewsContainer: "#dropzone-preview",
                maxFilesize: 5, // in MB
                paramName: "file",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content')
                },
                success: function(file, response) {
                    // Loại bỏ các phần tử cũ với class dz-complete, dz-image-preview, dz-processing nếu có
                    $(".dz-complete, .dz-image-preview, .dz-processing").remove();

                    var newPreview = document.createElement('div');
                    newPreview.setAttribute('id', 'dropzone-preview-list-' + response.id);
                    newPreview.classList.add('col-12', 'col-sm-6', 'col-md-3', 'mt-2');
                    newPreview.innerHTML = `
                        <div class="image-preview-container position-relative">
                            <img class="img-fluid rounded" src="` + response.image + `" alt="Image">
                            <button type="button" data-id="` + response.id + `" class="btn btn-sm btn-danger delete position-absolute top-0 end-0 m-2">X</button>
                            <p class="fs-13 text-muted my-2">${response.size}</p>
                        </div>
                    `;

                    // Prepend the new preview to the top of the list
                    document.querySelector('#dropzone-preview').prepend(newPreview);
                }


            });

            // Success Toast after deleting an image
            function toastDelete() {
                Swal.fire({
                    icon: 'success',
                    text: 'Xóa ảnh thành công.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }

            // Optional: Error Toast if the delete fails
            function toastError() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
            }
        });
    </script>
@endpush
