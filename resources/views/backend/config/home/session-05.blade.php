@extends('backend.layouts.master')

@section('title', $title)

@section('content')


    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title">{{ $title }}</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="ri-add-fill"></i> Thêm
            </button>

        </div>

        <div class="card-body">
            <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered"
                style="width:100%">
                <thead>
                    <tr>
                        <th width="5%">SR No.</th>
                        <th>Ảnh </th>
                        <th>Tên loại bệnh</th>
                        <th>Biểu hiện</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($session as $item)
                        <tr>
                            <td class="fw-medium text-center">{{ $loop->iteration }}</td>
                            <td> <img width="50" src="{{ showImage($item->image) }}" alt=""></td>
                            <td>{{ $item->title }}</td>
                            <td>
                                {{ $item->contents }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" data-resource="{{ $item }}"
                                        class="btn btn-primary btn-sm btn-edit" data-image="{{ showImage($item->image) }}"
                                        title="Edit">
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data" id="modal-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm loại bệnh</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <img src="{{ showImage($config->logo) }}" id="show_image" alt="" width="100%"
                                class="mt-3">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Tên loại bệnh</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="contents" class="form-label">Biểu hiện</label>
                            <input type="text" name="contents" class="form-control" id="contents" required>
                            <small class="form-text text-danger">Vui lòng nhập các biểu hiện cách nhau bằng dấu phẩy
                                ("|").</small>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" id="modal-submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endpush


@push('scripts')
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
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var modal = $(this);


                modal.find('#modal-form')[0].reset();
                modal.find('#show_image').attr('src', '');
                modal.find('.modal-title').text('Thêm loại bệnh');
                modal.find('#modal-submit').text('Lưu');


                if (button.data('resource')) {
                    var resource = JSON.parse(button.data('resource'));


                    // modal.find('#modal-form').attr('action', '' + resource
                    // .id);
                    modal.find('#title').val(resource.title);
                    modal.find('#contents').val(resource.contents);
                    modal.find('#show_image').attr('src', button.data(
                        'image'));
                    modal.find('.modal-title').text('Chỉnh sửa loại bệnh');
                    modal.find('#modal-submit').text('Cập nhật');
                }
            });

            $('#modal-form').on('submit', function(e) {
                e.preventDefault(); // Ngăn chặn gửi form mặc định

                var form = $(this);
                var formData = new FormData(form[0]);


                $.ajax({
                    url: form.attr(
                        'action'),
                    type: form.attr('method'),
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành công',
                                text: 'Loại bệnh đã được cập nhật!',
                            });
                            $('#exampleModal').modal('hide');
                            location.reload();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Lỗi',
                                text: response.message || 'Có lỗi xảy ra!',
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Lỗi',
                            text: 'Có lỗi trong quá trình xử lý!',
                        });
                    }
                });
            });


            $(document).on('click', '.btn-edit', function() {
                var resource = $(this).data('resource');

                $('#exampleModal').modal('show');
                $('#modal-form').attr('action', '{{ route('admin.configuration.update', ':id') }}'.replace(
                    ':id', resource.id));
                $('#title').val(resource.title);
                $('#contents').val(resource.contents);
                $('#show_image').attr('src', $(this).data('image'));
                $('.modal-title').text('Chỉnh sửa loại bệnh');
                $('#modal-submit').text('Cập nhật');
            });

            $(document).on('click', '.btn-delete', function() {
                var resourceId = $(this).data('id');

                if (confirm('Are you sure you want to delete this resource?')) {

                    $.ajax({
                        url: '{{ route('admin.configuration.destroy', ':id') }}'
                            .replace(':id',
                            resourceId),
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status) {
                                Swal.fire(
                                    'Deleted!',
                                    'The resource has been deleted.',
                                    'success'
                                );
                                location.reload();
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                })
                            }
                        }
                    })
                }
            });

        });
    </script>
@endpush
