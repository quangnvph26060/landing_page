@extends('backend.layouts.master')

@section('title', $title)

@section('content')

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $title }}</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="title" class="form-label">Tên website </label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Tên website"
                                        value="{{ old('title', $config->title) }}" />
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 ">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Số điện thoại</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" placeholder="Số điện thoại"
                                        value="{{ old('phone', $config->phone) }}" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="website" class="form-label">Link website</label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website"
                                        placeholder="Link website" value="{{ old('website', $config->website) }}" />
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label for="address" class="form-label">Địa chỉ</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                        placeholder="Địa chỉ" value="{{ old('address', $config->address) }}" />
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label for="fanpage" class="form-label">Link Facebook</label>
                                    <input type="text" class="form-control @error('fanpage') is-invalid @enderror" id="fanpage" name="fanpage"
                                        placeholder="Link fanpage" value="{{ old('fanpage', $config->fanpage) }}" />
                                    @error('fanpage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cấu hình seo</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="title_seo" class="form-label">Tiêu đề</label>
                                    <input type="text" class="form-control @error('title_seo') is-invalid @enderror" id="title_seo" name="title_seo"
                                        placeholder="Tiêu đề" value="{{ old('title_seo', $config->title_seo) }}" />
                                    @error('title_seo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="keywords_seo" class="form-label">Keywords</label>
                                    <input class="form-control" id="choices-text-unique-values" data-choices
                                        data-choices-text-unique-true type="text" name="keywords_seo"
                                        value="{{ old('keywords_seo', $config->keywords_seo) }}" />
                                    @error('keywords_seo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="description_seo" class="form-label">Mô tả</label>
                                    <textarea class="form-control" id="description_seo" name="description_seo" placeholder="Mô tả" rows="5">{{ old('description_seo', $config->description_seo) }}</textarea>
                                    @error('description_seo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cấu hình scripts</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="script" class="form-label">Scripts</label>
                                    <textarea class="form-control" id="script" name="script" placeholder="Scripts" rows="5">{{ old('script', $config->script) }}</textarea>
                                    @error('script')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cấu hình footer</h4>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="title_footer" class="form-label">Tiêu đề</label>
                                    <input type="text" placeholder="Tiêu đề" class="form-control @error('title_footer') is-invalid @enderror" id="title_footer"
                                        name="title_footer" value="{{ old('title_footer', $config->title_footer) }}">
                                    @error('title_footer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label for="title_footer" class="form-label">Nội dung</label>
                                    <textarea name="content_footer" placeholder="Nội dung" class="form-control" id="content_footer" cols="30"
                                        rows="10">{{ old('content_footer', $config->content_footer) }}</textarea>
                                    @error('content_footer')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cấu hình logo</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="form-control" id="logo" name="logo" />
                            @error('logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="{{ showImage($config->logo) }}" alt="" width="100%" class="mt-3">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Cấu hình icon</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="form-control" id="favicon" name="favicon" />
                            @error('favicon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <img src="{{ showImage($config->favicon) }}" alt="" width="100%" class="mt-3">
                        </div>
                    </div>
                </div>


                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>

    <script>
        ckeditor('content_footer', 150);
    </script>
@endpush
