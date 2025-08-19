<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-xxl d-flex align-items-stretch justify-content-between">
        <!--begin::Brand-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 w-lg-225px me-5">
            <!--begin::Aside mobile toggle-->
            <div class="btn btn-icon btn-active-icon-primary ms-n2 me-2 d-flex d-lg-none" id="kt_aside_toggle">
                <i class="ki-duotone ki-abstract-14 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--end::Aside mobile toggle-->
            <!--begin::Logo-->
            <a href="{{ route('profile') }}">
                <img alt="Logo" src="{{ asset('tmi/logo.png') }}"
                    class="d-none d-lg-inline h-35px theme-light-show" />
                <img alt="Logo" src="{{ asset('tmi/logo.png') }}"
                    class="d-none d-lg-inline h-30px theme-dark-show" />
                <img alt="Logo" src="{{ asset('tmi/logo.png') }}" class="d-lg-none h-25px" />
            </a>
            <!--end::Logo-->
        </div>
        <!--end::Brand-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::User-->
                <div class="d-flex align-items-center ms-lg-5" id="kt_header_user_menu_toggle">
                    <!--begin::User info-->
                    <div class="btn btn-active-light d-flex align-items-center bg-hover-light py-2 px-2 px-md-3"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Name-->
                        <div class="d-none d-md-flex flex-column align-items-end justify-content-center me-2">
                            <span class="text-muted fs-7 fw-semibold lh-1 mb-2">Selamat datang di PT. Team Metal
                                Karir</span>
                            <span class="text-dark fs-base fw-bold lh-1">{{ auth()->user()->name }}</span>
                        </div>
                        @php
                            $photo = asset('storage/' . $kandidat->foto);
                        @endphp
                        <div class="symbol symbol-30px symbol-md-40px">
                            <img src="{{ $photo ?? asset('assets/media/avatars/blank.png') }}" alt="image" />
                        </div>
                        <!--begin::Symbol-->

                        <!--end::Symbol-->
                    </div>
                    <!--end::User info-->
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ $photo ?? asset('assets/media/avatars/blank.png') }}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                        {{-- <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span> --}}
                                    </div>
                                    <a href="#"
                                        class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->
                        <div class="menu-item px-5 my-1">
                            <a href="" class="menu-link px-5"><i class="fa-solid fa-lock me-3"></i> Ganti
                                Password</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket me-3"></i> Keluar
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                </div>
                <!--end::User -->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
