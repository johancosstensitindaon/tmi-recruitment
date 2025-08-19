<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-header d-flex flex-stack d-none d-lg-flex pt-8 pb-2" id="kt_app_sidebar_header">
        <!--begin::Logo-->
        <a href="{{ route('admin.dashboard') }}" class="app-sidebar-logo">
            <img alt="Logo" src="{{ asset('tmi/logo.png') }}"
                class="h-40px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
            <img alt="Logo" src="{{ asset('tmi/logo.png') }}" class="h-20px h-lg-25px theme-dark-show" />
        </a>
        <!--end::Logo-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-sm btn-icon bg-light btn-color-gray-700 btn-active-color-primary d-none d-lg-flex rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-outline ki-text-align-right rotate-180 fs-1"></i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--begin::Navs-->
    <div class="app-sidebar-navs flex-column-fluid py-6" id="kt_app_sidebar_navs">
        <div id="kt_app_sidebar_navs_wrappers" class="app-sidebar-wrapper hover-scroll-y my-2" data-kt-scroll="true"
            data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_header" data-kt-scroll-wrappers="#kt_app_sidebar_navs"
            data-kt-scroll-offset="5px">

            <div id="kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false"
                class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary">

                <!-- Menu Heading -->
                <div class="menu-item mb-2">
                    <div class="menu-heading text-uppercase fs-7 fw-bold">Menu</div>
                    <div class="app-sidebar-separator separator"></div>
                </div>

                <!-- Dashboard -->
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <span class="menu-icon">
                            <i class="ki-outline ki-element-11 fs-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <!-- Lowongan -->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ request()->routeIs(['admin.lowongan', 'admin.departments', 'admin.kategori']) ? 'here show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-briefcase fs-2"></i>
                        </span>
                        <span class="menu-title">Lowongan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a
                                class="menu-link {{ request()->routeIs('admin.lowongan') ? 'active' : '' }}"
                                href="{{ route('admin.lowongan') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">List
                                    Lowongan</span></a></div>
                        <div class="menu-item"><a
                                class="menu-link {{ request()->routeIs('admin.kategori') ? 'active' : '' }}"
                                href="{{ route('admin.kategori') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Kategori</span></a>
                        </div>
                        <div class="menu-item"><a
                                class="menu-link {{ request()->routeIs('admin.departments') ? 'active' : '' }}"
                                href="{{ route('admin.departments') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Department</span></a></div>
                        {{-- <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Pendidikan</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Pengalaman</span></a></div> --}}
                    </div>
                </div>

                <!-- Kandidat -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-user fs-2"></i>
                        </span>
                        <span class="menu-title">Kandidat</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Daftar
                                    Kandidat</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">CV
                                    Kandidat</span></a></div>
                    </div>
                </div>

                <!-- Proses Rekrutmen -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-clipboard fs-2"></i>
                        </span>
                        <span class="menu-title">Proses Rekrutmen</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Lamaran
                                    Masuk</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Screening</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Penjadwalan
                                    Interview</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Keputusan
                                    Akhir</span></a></div>
                    </div>
                </div>

                <!-- Tes Online -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-outline ki-pencil fs-2"></i>
                        </span>
                        <span class="menu-title">Tes Online</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Bank
                                    Soal</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Hasil
                                    Tes</span></a></div>
                    </div>
                </div>

                <!-- Laporan -->
                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon"><i class="ki-outline ki-chart fs-2"></i></span>
                        <span class="menu-title">Laporan</span>
                    </a>
                </div>

                <!-- Pengaturan -->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon"><i class="ki-outline ki-setting-2 fs-2"></i></span>
                        <span class="menu-title">Pengaturan</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Informasi
                                    Perusahaan</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">User & Role
                                    Akses</span></a></div>
                        <div class="menu-item"><a class="menu-link" href="#"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span class="menu-title">Email
                                    Template</span></a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end::Navs-->
</div>
<!--end::Sidebar-->
