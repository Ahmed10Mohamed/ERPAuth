<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ url('Dashboard/') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('admin/img/adminlogo.png') }}" alt="">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bold">ERP </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
                        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">



                    <!-- profile -->
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Dashboard</span>
                    </li>


                    <!--admins -->

                    <li class="menu-item @if ($class == 'admins') open @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <div data-i18n="Admins">Admins</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if ($class == 'admins') active @endif">
                                <a href="{{ route('admins.index') }}" class="menu-link">
                                    <div data-i18n="List">List</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--End admins -->
                                          <!-- Role permation -->
                    <li class="menu-item @if ($class == 'role' || $class == 'permation') open @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Roles & Permission">Roles & Permission</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item @if ($class == 'role') active @endif">
                                <a href="{{ route('Role.index') }}" class="menu-link">
                                    <div data-i18n="Roles">Roles</div>
                                </a>
                            </li>
                            <li class="menu-item @if ($class == 'permation') active @endif">
                                <a href="{{ route('Pemission.index') }}" class="menu-link">
                                    <div data-i18n="Pemissions">Pemissions</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                      <!--End Role permation -->
                     


                    <!--start setting -->
                    <li class="menu-item @if ($class == 'account_setting' || $class == 'password' || $class == 'general_setting') open @endif">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons ti ti-settings"></i>
                            <div data-i18n="Setting">Setting</div>
                        </a>
                        <ul class="menu-sub">

                           
                            <li class="menu-item @if ($class == 'account_setting') active @endif">
                                <a href="{{ url('Dashboard/profile') }}" class="menu-link">
                                    <div data-i18n="Profile">Profile</div>
                                </a>
                            </li>
                            <li class="menu-item @if ($class == 'password') active @endif">
                                <a href="{{ url('Dashboard/Profile-Password') }}" class="menu-link">
                                    <div data-i18n="Password">Password</div>
                                </a>
                            </li>




                        </ul>
                    </li>
                    <!--End setting -->

                </ul>
            </aside>
            <!-- / Menu -->
