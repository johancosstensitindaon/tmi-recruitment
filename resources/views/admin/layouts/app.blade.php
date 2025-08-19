<!DOCTYPE html>
<html lang="en">

<head>
    <base href="" />
    <title>{{ $title }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('tmi/minilogo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('adminassets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminassets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('adminassets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('adminassets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div id="globalLoader"
        style="display:none;position:fixed;z-index:9999;width:100%;height:100%;background:rgba(255,255,255,0.7);top:0;left:0;text-align:center;padding-top:300px;">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('admin.layouts.header')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('admin.layouts.sidebar')
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            @yield('content')
                        </div>
                    </div>
                    @include('admin.layouts.footer')
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('adminassets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('adminassets/js/custom/widgets.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showLoader() {
            $('#globalLoader').fadeIn(100);
        }

        function hideLoader() {
            $('#globalLoader').fadeOut(100);
        }
        $(window).on('load', function() {
            hideLoader();
        });
    </script>
    <script>
        function showSwalLoader(title = 'Mohon Tunggu...', text = 'Sedang memproses data.') {
            Swal.fire({
                title: title,
                text: text,
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            });
        }

        function hideSwalLoader() {
            Swal.close();
        }
    </script>
    @stack('script')
</body>

</html>
