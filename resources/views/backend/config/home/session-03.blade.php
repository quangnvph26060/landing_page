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
                    <label for="content" class="form-label">Công dụng</label>
                    <div id="content-container">
                        @if (count(old('contents', $session->contents)) > 0)
                            @foreach (old('contents', $session->contents) as $key => $item)
                                <div class="content-item row mb-3">
                                    <div class="col-lg-11">
                                        <input type="text" class="form-control" name="contents[]" placeholder="Nội dung"
                                            value="{{ $item }}" />
                                    </div>
                                    <div class="col-lg-1">
                                        @if ($loop->first)
                                            <button type="button" class="btn btn-primary add-content">+</button>
                                        @else
                                            <button type="button" class="btn btn-danger remove-content">-</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="content-item row mb-3">
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" name="contents[]" placeholder="Nội dung"
                                        value="{{ old('contents.0') }}" />
                                </div>
                                <div class="col-lg-1">
                                    <button type="button" class="btn btn-primary add-content">+</button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-4">
                        <label for="image" class="form-label">Ảnh</label>
                        <input type="file" class="form-control border {{$session->image ? 'border-primary' : 'border-danger'}}" name="image" />
                    </div>

                    <div class="form-group mb-3 col-lg-8">
                        <label for="ingredients" class="form-label">Thành phần</label>

                        <input class="form-control" id="choices-text-unique-values" data-choices
                            data-choices-text-unique-true type="text" name="ingredients"
                            value="{{ old('ingredients', $session->ingredients) }}" />
                        @error('ingredients')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            let currentIndex = {{ count(old('contents', $session->contents)) }};

            $('.add-content').on('click', function() {
                const contentItem = `
                    <div class="content-item row mb-3">
                        <div class="col-lg-11">
                            <input type="text"  class="form-control" name="contents[]"
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
