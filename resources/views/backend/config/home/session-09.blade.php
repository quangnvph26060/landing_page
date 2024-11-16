@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">{{ $title }}</h4>
                    <div class="btn-group"> <button class="btn btn-primary btn-added" type="button">Thêm</button></div>
                </div>

                <div class="card-body">

                    <table id="alternative-pagination "
                        class="table nowrap dt-responsive align-middle table-hover table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">SR No.</th>
                                <th>Link video</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($session as $item)
                                <tr>
                                    <td class="fw-medium text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <img width="120" src="https://img.youtube.com/vi/{{ getYouTubeVideoId($item->link) }}/hqdefault.jpg"
                                        alt="Video {{ $item->id }}" />
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" data-resource="{{ $item }}"
                                                class="btn btn-primary btn-sm btn-edit" title="Edit">
                                                <i class="ri-pencil-fill"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                data-id="{{ $item->id }}" title="Delete">
                                                <i class="ri-delete-bin-5-fill"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="modal-form" method="post" action="" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="link" class="form-label">Video</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Nội dung</label>
                            <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                        </div>
                        <button type="submit" id="modal-submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush


@push('scripts')
    <script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            ckeditor('content');
            $('.btn-added').on('click', function() {
                $('#exampleModal').modal('show');
                $('#modal-form')[0].reset();

                $('#modal-form').data('id', '');

                CKEDITOR.instances['content'].setData('');
                $('#modal-submit').html('Lưu');
            })

            $('tbody').on('click', '.btn-edit', function() {

                const resource = $(this).data('resource');

                $('#exampleModal').modal('show');
                $('#link').val(resource.link);
                CKEDITOR.instances['content'].setData(resource.content);
                $('#modal-form').data('id', resource.id);
                $('#modal-submit').html('Cập nhật');
            })

            $('#modal-form').on('submit', function(e) {
                e.preventDefault();
                CKEDITOR.instances['content'].updateElement();
                var form = $(this);

                var id = form.data('id');


                var formData = new FormData(form[0]);

                if (id) {
                    formData.append('id', id);
                }

                $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {

                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: response.message,
                            });
                        }
                    }
                })
            })

            $('tbody').on('click', '.btn-delete', function() {
                const id = $(this).data('id');

                Swal.fire({
                    title: 'Xoá?',
                    text: "Sẽ không thể khôi phục được lại nữa!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa!',
                    cancelButtonText: 'Hủy',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            data: {
                                id: id,
                                type: 'delete'
                            },
                            success: function(response) {

                                if (response.status) {
                                    location.reload();
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi',
                                        text: response.message,
                                    });
                                }
                            }
                        })
                    }
                })
            })
        })
    </script>
@endpush
