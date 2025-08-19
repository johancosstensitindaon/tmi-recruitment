<!--begin::Aside-->
<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '225px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_toggle" data-kt-sticky="true" data-kt-sticky-name="aside-sticky"
    data-kt-sticky-offset="{default: false, lg: '1px'}" data-kt-sticky-width="{lg: '225px'}" data-kt-sticky-left="auto"
    data-kt-sticky-top="94px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
    <!--begin::Aside nav-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5 w-100 ps-4 ps-lg-0 pe-4 me-1" id="kt_aside_menu_wrapper"
        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_header" data-kt-scroll-wrappers="#kt_aside" data-kt-scroll-offset="5px">
        <!--begin::Menu-->
        <div class="card border-0 card-flush py-6">
            <div class="card-body text-center pt-0 mt-5">
                <!--begin::Image input-->
                <!--begin::Image input placeholder-->
                @if (isset($kandidat->foto) && $kandidat->foto != '')
                @php
                $photo = asset('storage/' . $kandidat->foto);
                @endphp
                <style>
                    .image-input-wrapper {
                        background-image: url('{{ $photo }}');
                    }
                </style>
                @else
                <style>
                    .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image.svg');
                    }

                    [data-bs-theme="dark"] .image-input-placeholder {
                        background-image: url('assets/media/svg/files/blank-image-dark.svg');
                    }
                </style>
                @endif
                <!--end::Image input placeholder-->
                <div class="image-input image-input-outline image-input-placeholder image-input-empty image-input-empty"
                    data-kt-image-input="true">
                    <div class="image-input-wrapper symbol symbol-circle w-150px h-150px"
                        style="background-image: url('{{ $photo ?? asset('assets/media/svg/files/blank-image.svg') }}')">
                    </div>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <div class="menu menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-5 menu-rounded w-100"
            id="#kt_aside_menu" data-kt-menu="true">

            <!--begin::Heading-->
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <span class="menu-section text-muted text-uppercase fs-7 fw-bold">Menu</span>
                </div>
            </div>
            <!--end::Heading-->
            <!--begin::Menu item-->
            <div class="menu-item pb-6">
                <a href="{{ route('profile') }}" class="menu-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                    <span class="menu-title">Profile Saya</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item pb-6">
                <a href="{{ route('lamaran') }}" class="menu-link {{ request()->routeIs('lamaran') ? 'active' : '' }}">
                    <span class="menu-title">Lamaran Saya</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item pb-6">
                <a href="{{ route('lowongan') }}" class="menu-link {{ request()->routeIs('lowongan') ? 'active' : '' }}">
                    <span class="menu-title">Lowongan</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item pb-6">
                <a href="../../demo5/dist/apps/devs/ask.html" class="menu-link">
                    <span class="menu-title">Ask Question</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside nav-->
</div>
<!--end::Aside-->
