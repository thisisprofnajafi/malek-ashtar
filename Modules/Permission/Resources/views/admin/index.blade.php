@extends('admin::layouts.master')
@section('title')
    دسترسی ها | داشبورد مدیریت
@endsection
@section('content')
    <!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">مدیریت</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.permission') }}">احراز هویت</a></li>
            <li class="breadcrumb-item">دسترسی ها</li>
        </ol>
    </nav>
    <!-- breadcrumb -->

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="pb-0 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex gap-2">
                        <h4 class="card-title mg-b-0">دسترسی ها</h4>
                        <p class="tx-12 tx-gray-500 mb-2">نمایش {{ $permissions->currentPage() }} از {{ $permissions->lastPage() }} صفحه از همه {{ $permissionsCount }} مورد .
                            <a href="{{ route('admin.permission') }}" id="m-l-c-05">تازه سازی </a>
                        </p>
                    </div>
                </div>
                <a href="{{ route('admin.permission.create') }}" class="btn p-2 btn-primary disabled"><i class="fe fe-plus"></i> ساخت دسترسی ها</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive d-inline">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">

{{--                                    --}}{{-- filters --}}
{{--                                    <div class="filters d-flex justify-content-between align-items-center tx-12">--}}
{{--                                        --}}{{-- filter items --}}
{{--                                        <div class="filter-items  d-flex justify-content-start align-items-center gap-1">--}}
{{--                                            <div><i class="fe fe-filter"></i></div>--}}

{{--                                            --}}{{-- filter 1 --}}
{{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?status'))) border bg-primary-transparent @endif">وضعیت<i class="fe fe-chevron-down"></i></a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">--}}
{{--                                                <input type="text" placeholder="جستجو" id="myInput" class="border m-1 rounded" onkeyup="filterFunction()" style="outline: none">--}}
{{--                                                <a href="{{ route('admin.permission','status=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=1'))) bg-primary-transparent @endif">فعال</a>--}}
{{--                                                <a href="{{ route('admin.permission','status=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?status=0'))) bg-primary-transparent @endif">غیر فعال</a>--}}
{{--                                            </div>--}}

{{--                                            --}}{{-- filter 2 --}}
{{--                                            <a href="#" data-bs-toggle="dropdown" class="btn-link text-black-50 rounded p-1 @if((str_contains(request()->getUri(), '?parent_id'))) border bg-primary-transparent @endif">پدر، فرزند<i class="fe fe-chevron-down"></i></a>--}}
{{--                                            <div class="dropdown-menu dropdown-menu-filter rounded shadow tx-12" id="myDropdown">--}}
{{--                                                <a href="{{ route('admin.permission','parent_id=0') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=0'))) bg-primary-transparent @endif">دسته های پدر</a>--}}
{{--                                                <a href="{{ route('admin.permission','parent_id=1') }}" class="dropdown-item @if((str_contains(request()->getUri(), '?parent_id=1'))) bg-primary-transparent @endif">زیر دسته ها</a>--}}
{{--                                            </div>--}}

{{--                                            --}}{{-- filter clearing --}}
{{--                                            @if(str_contains(request()->getUri(), '?') && str_contains(request()->getUri(), '='))--}}
{{--                                                <a href="{{ route('admin.permission') }}" class="btn-link text-black-50">پاکسازی<i class="la la-eraser"></i></a>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        --}}{{-- filter guid --}}
{{--                                    </div>--}}

                                    <table class="table text-md-nowrap dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="wd-15p border-bottom-0 sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="نام کوچک: activate to sort column descending" style="width: 101.667px;">نام</th>
                                            <th class="wd-10p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="حقوق: activate to sort column ascending" style="width: 54.4375px;">نام گارد</th>
                                            <th class="wd-25p border-bottom-0 sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="پست الکترونیک: activate to sort column ascending" style="width: 196.135px;">عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($permissions as $permission)
                                            <tr>
                                                <td>{{ $permission->name }}</td>
                                                <td>{{ $permission->guard_name ?? '-' }}</td>
                                                <td class="d-flex justify-content-start">
                                                    <a href="{{ route('admin.permission.edit', $permission) }}" class="btn-sm" style="color: #737f9e;pointer-events: none;"><i class="fe fe-edit"></i> ویرایش</a>
                                                    <form action="{{ route('admin.permission.destroy', $permission) }}" method="post">
                                                        @csrf @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-link delete disabled">
                                                            <i class="fe fe-trash-2"></i> پاک کردن
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>

                                    <div class="col-12 mt-4 text-left">
                                        {{ $permissions->links('vendor.pagination.bootstrap-5', ['elements' => $permissions]) }}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/div-->

    </div>
    <!-- /row -->

@endsection

@section('script')
    @include('sweetalert::toast')
    @include('sweetalert::confirmation', ['className' => 'delete'])

    <script>
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
@endsection
