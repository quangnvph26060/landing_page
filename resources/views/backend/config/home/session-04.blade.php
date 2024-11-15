@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
            </div>

            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="title">Tiêu đề</label>
                    <input type="text" placeholder="Tiêu đề" name="title" value="{{ old('title', $session->title) }}"
                        class="form-control">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="title">Ảnh</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nội dung</h3>
            </div>

            <div class="card-body">
                <div class="form-group mb-3">
                    <div id="content-container" class="mb-3">
                        @if (!empty($session->contents))
                            @foreach ($session->contents as $index => $content)
                                <div class="content-item position-relative mb-3">
                                    <textarea name="contents[]" id="contents-{{ $index }}" cols="30" rows="10">{{ $content }}</textarea>
                                    <div class="position-absolute top-0 end-0">
                                        <button type="button" class="btn btn-danger remove-content">-</button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="content-item mb-3">
                                <textarea name="contents[]" id="contents-0" cols="30" rows="10"></textarea>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-success add-content">+</button>

                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lợi ích sản phẩm</h3>
            </div>

            <div class="card-body">
                <div class="form-group mb-3">
                    <div id="product_benefits-container" class="mb-3">
                        @if (!empty($session->product_benefits))
                            @foreach ($session->product_benefits as $index => $benefit)
                                <div class="product_benefits-item position-relative mb-3">
                                    <textarea name="product_benefits[]" id="product_benefits-{{ $index }}" cols="30" rows="10">{{ $benefit }}</textarea>
                                    <div class="position-absolute top-0 end-0">
                                        <button type="button" class="btn btn-danger remove-product_benefits">-</button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="product_benefits-item mb-3">
                                <textarea name="product_benefits[]" id="product_benefits-0" cols="30" rows="10"></textarea>
                            </div>
                        @endif
                    </div>
                    <button type="button" class="btn btn-success add-product_benefits">+</button>

                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
    <script>
        // Khởi tạo CKEditor cho textarea đầu tiên ở cả hai khu vực
        ckeditor('contents-0', 80);
        ckeditor('product_benefits-0', 80);

        let contents = document.querySelectorAll('textarea[name="contents[]"]');
        let benefits = document.querySelectorAll('textarea[name="product_benefits[]"]');

        contents.forEach(element => {
            ckeditor(element, 80);
        })

        benefits.forEach(element => {
            ckeditor(element, 80);
        })


        $(document).ready(function() {
            let contentIndex = $('#content-container .content-item').length; // Số lượng hiện có
            let benefitsIndex = $('#product_benefits-container .product_benefits-item').length;

            // Thêm mới một content
            $('.add-content').on('click', function() {
                const newTextareaId = `contents-${contentIndex}`;
                const contentItem = `
        <div class="content-item position-relative mb-3">
            <textarea name="contents[]" id="${newTextareaId}" cols="30" rows="10"></textarea>
            <div class="position-absolute top-0 end-0">
                <button type="button" class="btn btn-danger remove-content">-</button>
            </div>
        </div>`;
                $('#content-container').append(contentItem);
                ckeditor(newTextareaId, 80);
                contentIndex++;
            });

            // Thêm mới một sản phẩm lợi ích
            $('.add-product_benefits').on('click', function() {
                const newTextareaId = `product_benefits-${benefitsIndex}`;
                const benefitsItem = `
        <div class="product_benefits-item position-relative mb-3">
            <textarea name="product_benefits[]" id="${newTextareaId}" cols="30" rows="10"></textarea>
            <div class="position-absolute top-0 end-0">
                <button type="button" class="btn btn-danger remove-product_benefits">-</button>
            </div>
        </div>`;
                $('#product_benefits-container').append(benefitsItem);
                ckeditor(newTextareaId, 80);
                benefitsIndex++;
            });

            // Xóa content khi nhấn nút "-"
            $(document).on('click', '.remove-content', function() {
                $(this).closest('.content-item').remove();
            });

            // Xóa product benefit khi nhấn nút "-"
            $(document).on('click', '.remove-product_benefits', function() {
                $(this).closest('.product_benefits-item').remove();
            });
        });
    </script>
@endpush
