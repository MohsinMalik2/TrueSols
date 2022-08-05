<!-- BEGIN: Main Menu-->
<div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto">
                        <a class="navbar-brand" href="../../../html/ltr/horizontal-menu-template/index.html">
                            <img src="{{asset('assets/img/logo-color.png')}}" alt="" style="width:150px;">
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                            <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="@yield('dashboard_select') nav-item" data-menu="">
                        <a class="nav-link d-flex align-items-center" href="{{route('admin.home')}}">
                            <i data-feather="home"></i> <span data-i18n="Dashboards">Dashboards</span>
                        </a>
                    </li>
                    <li class="@yield('portfolio_select') nav-item" data-menu="">
                        <a class="nav-link d-flex align-items-center" href="{{route('admin.portfolio')}}">
                            <i data-feather="grid"></i> <span data-i18n="Portfolio">Portfolio</span>
                        </a>
                    </li>
                    <li class="@yield('blogs_select') nav-item" data-menu="">
                        <a class="nav-link d-flex align-items-center" href="{{route('admin.blog')}}">
                            <i data-feather="clipboard"></i><span data-i18n="Blogs">Blogs</span>
                        </a>
                    </li>
                    <li class="@yield('settings_select') nav-item" data-menu="">
                        <a class="nav-link d-flex align-items-center" href="{{route('admin.settings')}}">
                            <i data-feather="settings"></i> <span data-i18n="Settings">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->