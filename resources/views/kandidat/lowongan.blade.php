@extends('user.layouts.app')
@section('css')

@endsection
@section('content')
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Aside-->
    <div class="flex-column flex-lg-row-auto w-100 w-lg-350px w-xxl-325px mb-8 mb-lg-0 me-lg-9 me-5">
        <!--begin::Form-->
        <form action="#">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin:Search-->
                    <div class="position-relative">
                        <i
                            class="ki-duotone ki-magnifier fs-3 text-gray-500 position-absolute top-50 translate-middle ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" class="form-control form-control-solid ps-10" name="search" value=""
                            placeholder="Search" />
                    </div>
                    <!--end:Search-->
                    <!--begin::Border-->
                    <div class="separator separator-dashed my-8"></div>
                    <!--begin::Input group-->
                    <div class="mb-10">
                        <label class="fs-6 form-label fw-bold text-dark mb-5">Pengalaman</label>
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid mb-5">
                            <input class="form-check-input" type="checkbox" id="kt_search_category_1" />
                            <label class="form-check-label flex-grow-1 fw-semibold text-gray-700 fs-6"
                                for="kt_search_category_1">Fresh Graduated</label>
                            <span class="text-gray-400 fw-bold">28</span>
                        </div>
                        <!--end::Checkbox-->
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid mb-5">
                            <input class="form-check-input" type="checkbox" id="kt_search_category_2"
                                checked="checked" />
                            <label class="form-check-label flex-grow-1 fw-semibold text-gray-700 fs-6"
                                for="kt_search_category_2">1-</label>
                            <span class="text-gray-400 fw-bold">307</span>
                        </div>
                        <!--end::Checkbox-->
                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" id="kt_search_category_3" />
                            <label class="form-check-label flex-grow-1 fw-semibold text-gray-700 fs-6"
                                for="kt_search_category_3">Furnuture</label>
                            <span class="text-gray-400 fw-bold">54</span>
                        </div>
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Input group-->
                    {{-- <!--begin::Action-->
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-active-light-primary btn-color-gray-400 me-3">Discard</a>
                        <a href="#" class="btn btn-primary">Search</a>
                    </div>
                    <!--end::Action--> --}}
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Aside-->
    <!--begin::Layout-->
    <div class="flex-lg-row-fluid">
        <div class="row g-6 g-xl-7">
            <div class="col-md-6 col-xl-12 col-xxl-6">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body d-flex flex-center flex-column pt-12 p-9">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <img src="assets/media//avatars/300-2.jpg" alt="image" />
                            <div
                                class="bg-success position-absolute border border-4 border-body h-15px w-15px rounded-circle translate-middle start-100 top-100 ms-n3 mt-n3">
                            </div>
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">Karina Clark</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="fw-semibold text-gray-400 mb-6">Art Director at Novica Co.</div>
                        <!--end::Position-->
                        <!--begin::Info-->
                        <div class="d-flex flex-center flex-wrap">
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                <div class="fs-6 fw-bold text-gray-700">$14,560</div>
                                <div class="fw-semibold text-gray-400">Earnings</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                <div class="fs-6 fw-bold text-gray-700">23</div>
                                <div class="fw-semibold text-gray-400">Tasks</div>
                            </div>
                            <!--end::Stats-->
                            <!--begin::Stats-->
                            <div class="border border-gray-300 border-dashed rounded min-w-80px py-3 px-4 mx-2 mb-3">
                                <div class="fs-6 fw-bold text-gray-700">$236,400</div>
                                <div class="fw-semibold text-gray-400">Sales</div>
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Layout-->
</div>
@endsection
@push('scripts')

@endpush
