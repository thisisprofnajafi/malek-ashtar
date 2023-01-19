<!-- main-header -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="index.html"><img src="{{ asset('modules/admin/assets/img/brand/logo.png') }}" class="logo-1" alt="لوگو"></a>
                <a href="index.html"><img src="{{ asset('modules/admin/assets/img/brand/logo-white.png') }}" class="dark-logo-1" alt="لوگو"></a>
                <a href="index.html"><img src="{{ asset('modules/admin/assets/img/brand/favicon.png') }}" class="logo-2" alt="لوگو"></a>
                <a href="index.html"><img src="{{ asset('modules/admin/assets/img/brand/favicon.png') }}" class="dark-logo-2" alt="لوگو"></a>
            </div>
            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>

            <div class="main-header-center my-auto">
                <a href="{{ route('home') }}" class="text-decoration-underline">نمایش وبگاه</a>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="dropdown  nav-itemd-none d-md-flex">
                        <a href="#" class="d-flex  nav-item country-flag1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="avatar country-Flag me-0 align-self-center bg-transparent"><img src="{{ asset('modules/admin/assets/img/flags/Flag-of-Iran-01.png') }}" alt="img"></span>
                            <div class="my-auto">
                                <strong class="me-2 ms-2 my-auto">فارسی</strong>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                            <a href="#" class="dropdown-item d-flex ">
                                <span class="avatar  m-e-c-3 align-self-center bg-transparent"><img src="{{ asset('modules/admin/assets/img/flags/us_flag.jpg') }}" alt="img"></span>
                                <div class="d-flex">
                                    <span class="mt-2">انگلیسی</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="جستجو کردن">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        @if((auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewComment::class)->whereNull('read_at')->count() != 0))
                            <span class=" pulse-danger"></span>
                        @endif
                    </a>

                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">پیام ها</h6>
                                <span class="badge rounded-pill bg-warning ms-auto my-auto float-end">علامت گذاری همه</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">شما {{ auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewComment::class)->whereNull('read_at')->count() }} پیام خوانده نشده دارید</p>
                        </div>
                        <div class="main-message-list chat-scroll">
                            @foreach(auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewComment::class)->whereNull('read_at')->get() as $notification)
                                <a href="{{ route('admin.notification.read-all', 'comment') }}" class="p-3 d-flex border-bottom">
                                    <div class="drop-img cover-image" data-bs-image-src="{{ auth()->user()->profile_photo_url }}">
                                        <span class="avatar-status bg-teal"></span>
                                    </div>
                                    <div class="wd-90p">
                                        <div class="d-flex">
                                            <h5 class="mb-1 name">
                                                <small>{{ auth()->user()->fullname ?? auth()->user()->name ?? '-' }}</small>
                                            </h5>
                                        </div>
                                        <p class="mb-0 desc">{{ $notification['data']['comment'] }}</p>
                                        <p class="time mb-0 text-left float-right mr-2 mt-2">{{ jalaliDate($notification['data']['user']['created_at'], 'Y M d H:i') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>
                </div>

                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                        @if((auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewContact::class)->whereNull('read_at')->count() != 0))
                            <span class=" pulse"></span>
                        @endif
                    </a>

                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">تماس ها</h6>
                                <span class="badge rounded-pill bg-warning ms-auto my-auto float-end">علامت گذاری همه</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">شما {{ auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewContact::class)->whereNull('read_at')->count() }} پیام خوانده نشده دارید</p>
                        </div>
                        <div class="main-notification-list Notification-scroll">

                            @foreach(auth()->user()->notifications()->where('type', \Modules\ContactUs\Notifications\NewContact::class)->whereNull('read_at')->get() as $contactNotification)
                                <a href="{{ route('admin.notification.read-all', 'contact-us') }}" class="p-3 d-flex border-bottom">
                                        <i class="la la-envelope-open"></i>
                                    <div class="ms-3">
                                        <div class="notification-subtext">{{ $contactNotification['data']['name'] }}</div>
                                        <h5 class="notification-label mb-1">{{ $contactNotification['data']['subject'] }}</h5>
                                        <div class="notification-subtext">{{ jalaliDate($contactNotification->created_at, '', true) }}</div>
                                    </div>
                                    <div class="mr-auto">
                                        <i class="las la-angle-left text-left text-muted"></i>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                        <div class="dropdown-footer">
                            <a href="#">مشاهده همه</a>
                        </div>
                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>

                {{-- header profile --}}
                {{-- Authenticated --}}
                @auth
                    <div class="dropdown main-profile-menu nav nav-item nav-link">
                        <a class="profile-user avatar bg-info rounded-circle text-white">
                            @if(auth()->user()->profile_photo_path)
                                <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}">
                            @else
                                <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->fullname ?? auth()->user()->name }}">

{{--                                <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}">--}}
                            @endif
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-header-profile bg-primary p-3">
                                <div class="d-flex wd-100p">
                                    <div class="profile-user avatar bg-info rounded-circle text-white">
                                        @if(auth()->user()->profile_photo_path)
                                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}">
                                        @else
                                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->fullname ?? auth()->user()->name }}">

{{--                                            <img alt="{{ auth()->user()->fullname ?? auth()->user()->name }}" src="{{ (auth()->user()->profile_photo_url) }}">--}}
                                        @endif
                                    </div>
                                    <div class="ms-3 my-auto">
                                        <h6>{{ auth()->user()->fullname ?? auth()->user()->name ?? 'وارد نشده اید' }}</h6>
                                        <span>مدیریت</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bx bx-user-circle"></i>مشخصات</a>
                            {{--                            <a class="dropdown-item" href="#"><i class="bx bx-cog"></i> ویرایش نمایه</a>--}}
                            {{--                            <a class="dropdown-item" href="#"><i class="bx bxs-inbox"></i>صندوق ورودی</a>--}}
                            {{--                            <a class="dropdown-item" href="#"><i class="bx bx-envelope"></i>پیام ها</a>--}}
                            {{--                            <a class="dropdown-item" href="#"><i class="bx bx-slider-alt"></i> تنظیمات حساب</a>--}}
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item"><i class="bx bx-log-out"></i> خروج از سیستم</button>
                            </form>
                        </div>
                    </div>
                @endauth

                {{-- Unauthenticated GUEST --}}
                @guest
                    <div class="dropdown main-profile-menu nav nav-item nav-link">
                        <a class="profile-user avatar bg-info rounded-circle text-white">
                            <small>م</small>
                        </a>
                        <div class="dropdown-menu">
                            <div class="main-header-profile bg-primary p-3">
                                <div class="d-flex wd-100p">
                                    <a class="profile-user avatar bg-info rounded-circle text-white"><small>م</small></a>
                                    <div class="ms-3 my-auto">
                                        <h6>وارد نشده اید</h6><span>مدیریت</span>
                                    </div>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ route('login') }}"><i class="bx bx-log-out"></i>وارد شوید</a>
                        </div>
                    </div>
                @endguest

            </div>
        </div>
    </div>
</div><!-- /main-header -->