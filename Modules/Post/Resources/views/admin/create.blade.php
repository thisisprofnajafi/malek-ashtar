@extends('admin::layouts.master')
@section('title')
    ساخت خبر | داشبورد مدیریت
@endsection
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('modules/admin/assets/plugins/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post') }}">مجله و خبرنامه</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.post') }}">اخبار</a></li>
            <li class="breadcrumb-item">ساخت خبر</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">اخبار</h4>
                        <p class="tx-12 tx-gray-500 mb-2">ساخت خبر.
                            <a href="{{ route('admin.post') }}" id="m-l-c-05"><i class="fe fe-chevrons-right  "></i>بازگشت به لیست اخبار</a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <form action="{{ route('admin.post.store') }}" id="form" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-8">
                        {{-- validation errors alert --}}
                        @if ($errors->any())
                            <div class="alert alert-solid-danger mg-b-0 rounded mb-2" role="alert">
                                <button aria-label="بستن" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">×</span></button>

                                @foreach($errors->all() as $error)
                                    <div><span class="alert-inner--icon"><i class="fe fe-info"></i></span> {{ $error }}
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        <div class="card box-shadow-0">
                            <div class="card-header"></div>
                            <div class="card-body pt-0">
                                <div>

                                    <div class="form-group">
                                        <label>نویسنده:
                                            @if(auth()->user()->profile_photo_path)
                                                <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}" class="avatar avatar-xl brround">
                                            @else
                                                <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}" class="avatar avatar-xl brround">
                                            @endif
                                            {{ auth()->user()->fullname ?? auth()->user()->name ?? 'وارد نشده اید' }}</label>
                                    </div>

                                    {{-- category id --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('category_id') tx-danger @enderror">دسته بندی
                                            <span class="tx-danger">*</span></label>
                                        <div class="SumoSelect sumo_somename" tabindex="0" role="button" aria-expanded="false">
                                            <select name="category_id" id="category_id" class="form-control SlectBox SumoUnder @error('category_id') border-danger @enderror" tabindex="-1">
                                                <option value="">-</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <small class="tx-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                    {{-- title --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label @error('title') tx-danger @enderror">عنوان خبر:
                                            <span class="tx-danger">*</span></label>
                                        <input type="text" name="title" class="form-control @error('title') border-danger @enderror" value="{{ old('title') }}">
                                        @error('title') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- slug(url) --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">اسلاگ (نمایش در url):</label>
                                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}">
                                        <small class="tx-gray-600">اگر خالی رها کنید، بصورت خودکار از روی عنوان تولید خواهد شد.</small>
                                    </div>

                                    {{-- label --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">برچسب</label>
                                        <div class="SumoSelect" tabindex="0" role="button" aria-expanded="true">
                                            <select class="testselect2 SumoUnder" tabindex="-1" name="label">
                                                <option value="">بدون برچسب</option>
                                                <option value="0">پیشنهاد سردبیر</option>
                                                <option value="1">مطالب داغ</option>
                                                <option value="2">ورزش جهان</option>
                                                <option value="3">ویدیو</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- tags --}}
                                    <div class="form-group mb-4">
                                        <label class="form-label">تگ:</label>
                                        <input type="hidden" class="form-control form-control-sm @error('tags') border border-danger @enderror" name="tags" id="tags" value="{{ old('tags') }}">
                                        <select id="select_tags" class="select2 form-control form-control-sm @error('tags') border border-danger @enderror" multiple></select>
                                        <small class="tx-gray-600">تگ های خود را وارد کنید و با زدن دکمه<span class="badge badge-light border shadow-base">Enter</span> تگ را ایجاد کنید</small>
                                    </div>

                                    {{-- summary --}}
                                    <div class="form-group mb-4">
                                        <label for="summary" class="@error('summary') tx-danger @enderror">خلاصه
                                            <span class="tx-danger">*</span></label>
                                        <textarea class="form-control @error('summary') border-danger @enderror" name="summary" rows="3" style="height: 7rem; resize: none">{{ old('summary') }}</textarea>
                                        @error('summary') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- body --}}
                                    <div class="form-group mb-4">
                                        <label for="body" class="@error('body') tx-danger @enderror">متن
                                            <span class="tx-danger">*</span></label>
                                        <textarea type="text" class="form-control form-control-sm @error('body') border border-danger @enderror" name="body" id="editor">{{ old('body') }}</textarea>
                                        @error('body') <small class="tx-danger">{{ $message }}</small> @enderror
                                    </div>

                                    {{-- published_at --}}
                                    <div class="form-group mb-4">
                                        <label for="published_at">زمان انتشار</label>
                                        <div class="input-group col-md-4">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                            <input type="text" id="published_at_view" class="form-control form-control-sm @error('published_at') border border-danger @enderror">
                                            @error('published_at')
                                            <small class="tx-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4">
                        {{-- image --}}
                        <div class="form-group mb-4">
                            <input type="file" name="image" class="dropify" data-height="200">
                            <div class="dropify-preview" style="display: none;">
                                <span class="dropify-render"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner"><p class="dropify-filename">
                                            <span class="dropify-filename-inner"></span></p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- submit --}}
                <button type="submit" class="btn btn-primary mb-3"><i class="fe fe-save"></i> ذخیره و بازگشت
                </button>

                {{-- cancel --}}
                <a href="{{ route('admin.post') }}" class="btn btn-secondary mb-3"><i class="fe fe-slash"></i> لغو</a>
            </form>
        </div>
        <!-- /row -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('modules/admin/assets/plugins/ckeditor5-build-classic/ckeditor.js') }}"></script>
    <script src="{{ asset('modules/admin/assets/plugins/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('modules/admin/assets/plugins/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    {{-- ckeditor5 --}}
    <script>
        ClassicEditor.create(document.querySelector('#editor'), {
            language: {
                // The UI will be English.
                ui: 'en',
                // But the content will be edited in persian.
                content: 'fa'
            }
        }).then(editor => {
            window.editor = editor;
        }).catch(err => {
            console.error(err.stack);
        });
    </script>


    {{-- datepicker --}}
    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true
                },
            })
        });
    </script>


    {{-- select2 select tags --}}
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            console.log(tags_input, select_tags, default_tags, default_data)

            if (tags_input.val() !== null && tags_input.val().length > 0)
                default_data = default_tags.split(',');

            select_tags.select2({
                tags: true,
                data: default_data,
                theme: "classic",
                dir: "rtl"
            });
            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function () {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>
@endsection