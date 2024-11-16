<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('admin.dashboard') }}">
                        <i class="ri-dashboard-fill"></i><span data-key="t-dashboards">Tổng quan</span>
                    </a>
                </li>

                <!-- end Dashboard Menu -->

                <!-- start Configuration -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-settings-line"></i><span data-key="t-apps">Cấu hình</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('admin.configuration.index')}}" class="nav-link"
                                    data-key="t-website">Cấu Hình Chung</a>
                            </li>
                            <li class="nav-item">
                                <a href="#sidebarSignIn" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSignIn" data-key="t-signin"> Cấu Hình Trang Chủ
                                </a>
                                <div class="collapse menu-dropdown" id="sidebarSignIn">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 1)}}" class="nav-link" data-key="t-signin"> Session 1
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 2)}}" class="nav-link" data-key="t-signin"> Session 2
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 3)}}" class="nav-link" data-key="t-signin"> Session 3
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 4)}}" class="nav-link" data-key="t-signin"> Session 4
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 5)}}" class="nav-link" data-key="t-signin"> Session 5
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 6)}}" class="nav-link" data-key="t-signin"> Session 6
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 7)}}" class="nav-link" data-key="t-signin"> Session 7
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 8)}}" class="nav-link" data-key="t-signin"> Session 8
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 9)}}" class="nav-link" data-key="t-signin"> Session 9
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('admin.configuration.session', 10)}}" class="nav-link" data-key="t-signin"> Session 10
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('admin.contact.index')}}" class="nav-link"
                                    data-key="t-website">Thông tin liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- end Configuration -->
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
