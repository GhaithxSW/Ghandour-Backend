@php
    $isBoxed = layoutConfig()['boxed'];
    $isAltMenu = layoutConfig()['alt-menu'];
    $isRTL = layoutConfig()['rtl'];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $pageTitle }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('resources/new-logo-buhothy.png') }}" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css" />

    <link rel="stylesheet" href="{{ asset('plugins-rtl/bootstrap/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/loader.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/loader.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/carousel.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/carousel.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/blog-create.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/blog-create.css') }}">
    {{-- <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}"> --}}
    <link rel="stylesheet" href="{{ mix('rtl/css/light/switches.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/switches.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-tagify.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-tagify.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-filepond.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-filepond.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/tabs.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/tabs.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-pagination.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-pagination.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/scrollspyNav.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/scrollspyNav.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins-rtl/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins-rtl/tagify/tagify.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/structure.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/structure.css') }}">
    <link rel="stylesheet" href="{{ mix('css/light/plugins.min.css') }}">

    <script src="{{ asset('resources/rtl/layouts/vertical-light-menu/loader.js') }}"></script>

    <style>
        /* .scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar::-webkit-scrollbar {
            width: 0;
        } */

        .scrollbar::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-color: transparent;
            border-radius: 10px;
        }

        .scrollbar::-webkit-scrollbar {
            width: 8px;
            /* background-color: #F5F5F5; */
            background-color: transparent;
        }

        .scrollbar::-webkit-scrollbar-thumb {
            border-radius: 10px;
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
            background-image: -webkit-gradient(linear, left bottom, left top, from(#30cfd0), to(#330867));
            background-image: -webkit-linear-gradient(bottom, #30cfd0 0%, #330867 100%);
            background-image: linear-gradient(to top, #30cfd0 0%, #330867 100%);
        }

        .scrollbar {
            scrollbar-color: #330867 #F5F5F5;
        }

        .fixed-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: transparent;
            padding: 25px;
        }

        @media screen and (max-width: 400px) {
            .fixed-bottom-text {
                display: none;
            }
        }
    </style>


    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('css/light/main.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dark/main.css') }}">

    {{-- @if (
        !Request::routeIs('404') &&
            !Request::routeIs('maintenance') &&
            !Request::routeIs('signin') &&
            !Request::routeIs('signup') &&
            !Request::routeIs('lockscreen') &&
            !Request::routeIs('password-reset') &&
            !Request::routeIs('2Step') &&
            !Request::routeIs('login'))
        @if ($scrollspy == 1)
            <link rel="stylesheet" href="{{ mix('rtl/css/light/scrollspyNav.css') }}">
            <link rel="stylesheet" href="{{ mix('rtl/css/dark/scrollspyNav.css') }}">
        @endif
        <link rel="stylesheet" href="{{ asset('plugins-rtl/waves/waves.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/highlight/styles/monokai-sublime.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/structure.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/structure.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom.css') }}">
    @endif --}}

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{ $headerFiles }}
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body class="layout-boxed scrollbar">

    <!-- BEGIN LOADER -->
    <x-rtl.layout-loader />
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <x-rtl.navbar.style-vertical-menu classes="" />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <!--  BEGIN LOADER  -->
        <x-rtl.layout-overlay />
        <!--  END LOADER  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="contaienr">
                <div class="contaienr">
                    {{ $slot }}
                </div>
            </div>

            <div class="fixed-bottom">
                <a href="https://wa.me/+963947208628" target="_blank" class="btn btn-success"
                    style="border-radius: 50px">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-whatsapp"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                        <path
                            d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                    </svg>
                    <span class="fixed-bottom-text">{{ __('trans.help') }}</span>
                </a>
            </div>

            <!--  BEGIN FOOTER  -->
            <x-rtl.layout-footer />
            <!--  END FOOTER  -->

        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!--  END MAIN CONTAINER  -->

    <!-- jQuery CDN -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap CDN -->
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js">
    </script>
    <!-- Bootstrap-Iconpicker Bundle -->
    <script type="text/javascript" src="dist/js/bootstrap-iconpicker.bundle.min.js"></script>

    @if ($scrollspy == 1)
        <script src="{{ asset('resources/rtl/assets/js/scrollspyNav.js') }}"></script>
    @endif

    <script src="{{ asset('resources/rtl/layouts/vertical-light-menu/app.js') }}"></script>
    <script src="{{ asset('plugins-rtl/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/mousetrap/mousetrap.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/waves/waves.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script src="{{ asset('resources/rtl/assets/js/apps/blog-create.js') }}"></script>
    <script src="{{ asset('plugins-rtl/tagify/tagify.min.js') }}"></script>
    <script src="{{ asset('plugins-rtl/editors/quill/quill.js') }}"></script>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{ $footerFiles }}

</body>

</html>
