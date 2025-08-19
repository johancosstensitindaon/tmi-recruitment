<div class="mb-0" id="home">
    <!--begin::Wrapper-->
    <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
        style="
            background-image: url(assets/media/svg/illustrations/landing.svg);
          ">
        <!--begin::Header-->
        <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
            data-kt-sticky-offset="{default: '200px', lg: '300px'}">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Wrapper-->
                <div class="d-flex align-items-center justify-content-between">
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-equal">
                        <!--begin::Mobile menu toggle-->
                        <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                            id="kt_landing_menu_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2hx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </button>
                        <!--end::Mobile menu toggle-->
                        <!--begin::Logo image-->
                        <a href="{{ route('landing') }}">
                            <img alt="Logo" src="{{ asset('tmi/logo.svg') }}"
                                class="logo-default h-35px h-lg-40px" />
                            <img alt="Logo" src="{{ asset('tmi/logo.svg') }}"
                                class="logo-sticky h-30px h-lg-35px" />
                        </a>
                        <!--end::Logo image-->
                    </div>
                    <!--end::Logo-->
                    <!--begin::Menu wrapper-->
                    <div class="d-lg-block" id="kt_header_nav_wrapper">
                        <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                            data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                            data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                            data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                            <!--begin::Menu-->
                            <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                id="kt_landing_menu">
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Daftar Lowongan</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Cara Melamar</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Kontak</a>
                                    <!--end::Menu link-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                {{-- <div class="menu-item">
                                    <!--begin::Menu link-->
                                    <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Pricing</a>
                                    <!--end::Menu link-->
                                </div> --}}
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Menu wrapper-->
                    <!--begin::Toolbar-->
                    <div class="flex-equal text-end ms-1">
                        <a href="{{ route('login') }}" class="btnLogin learn-more">
                            <span class="circle" aria-hidden="true">
                                <span class="icon arrow"></span>
                            </span>
                            <span class="button-text">Masuk / Daftar</span>
                        </a>

                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->
        <!--begin::Landing hero-->
        <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
            <!--begin::Heading-->
            <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                <!--begin::Title-->
                <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
                    Build An Outstanding Solutions <br />with
                    <span
                        style="
                    background: linear-gradient(
                      to right,
                      #12ce5d 0%,
                      #ffd80c 100%
                    );
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                  ">
                        <span id="kt_landing_hero_text">The Best Theme Ever</span>
                    </span>
                </h1>
                <!--end::Title-->
                <!--begin::Action-->
                <a href="../../demo2/dist/index.html" class="btn btn-primary">Try Metronic</a>
                <!--end::Action-->
            </div>
            <!--end::Heading-->
            <!--begin::Clients-->
            <div class="d-flex flex-center flex-wrap position-relative px-5">
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Fujifilm">
                    <img src="assets/media/svg/brand-logos/fujifilm.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Vodafone">
                    <img src="assets/media/svg/brand-logos/vodafone.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="KPMG International">
                    <img src="assets/media/svg/brand-logos/kpmg.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Nasa">
                    <img src="assets/media/svg/brand-logos/nasa.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Aspnetzero">
                    <img src="assets/media/svg/brand-logos/aspnetzero.svg" class="mh-30px mh-lg-40px"
                        alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="AON - Empower Results">
                    <img src="assets/media/svg/brand-logos/aon.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Hewlett-Packard">
                    <img src="assets/media/svg/brand-logos/hp-3.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
                <!--begin::Client-->
                <div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="Truman">
                    <img src="assets/media/svg/brand-logos/truman.svg" class="mh-30px mh-lg-40px" alt="" />
                </div>
                <!--end::Client-->
            </div>
            <!--end::Clients-->
        </div>
        <!--end::Landing hero-->
    </div>
    <!--end::Wrapper-->
</div>
