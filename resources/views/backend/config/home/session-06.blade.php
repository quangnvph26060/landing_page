@extends('backend.layouts.master')

@section('title', $title)

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input type="text" placeholder="Tiêu đề" name="title" value="{{ old('title', $session->title) }}"
                                    class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-lg-6 mb-3">
                                <label for="short_description" class="form-label">Nội dung ngắn</label>
                                <input type="text" placeholder="Tiêu đề" name="short_description"
                                    value="{{ old('short_description', $session->short_description) }}" class="form-control">
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <div id="content-container">
                                    @if (count(old('contents', $session->contents)) > 0)
                                        @foreach (old('contents', $session->contents) as $key => $item)
                                            <div class="content-item row mb-3">
                                                <div class="col-lg-11">
                                                    <input type="text" class="form-control" data-id="{{ $key }}"
                                                        name="contents[]" placeholder="Nội dung"
                                                        value="{{ $item }}" />
                                                </div>
                                                <div class="col-lg-1">
                                                    @if ($loop->first)
                                                        <button type="button"
                                                            class="btn btn-primary add-content">+</button>
                                                    @else
                                                        <button type="button"
                                                            class="btn btn-danger remove-content">-</button>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="content-item row mb-3">
                                            <div class="col-lg-11">
                                                <input type="text" class="form-control" data-id="0" name="contents[]"
                                                    placeholder="Nội dung" value="{{ old('contents.0') }}" />
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="button" class="btn btn-primary add-content">+</button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group my-3">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            let currentIndex = {{ count(old('contents', $session->contents)) }};

            $('.add-content').on('click', function() {
                const contentItem = `
                    <div class="content-item row mb-3">
                        <div class="col-lg-11">
                            <input type="text" data-id="${currentIndex}" class="form-control" name="contents[]"
                                placeholder="Nội dung" value="" />
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-danger remove-content">-</button>
                        </div>
                    </div>`;

                $('#content-container').append(contentItem);
                currentIndex++;
            });

            $('#content-container').on('click', '.remove-content', function() {
                const contentItem = $(this).closest('.content-item');
                contentItem.remove();
            });

        });
    </script>
@endpush
