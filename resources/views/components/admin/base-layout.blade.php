@php
    $isBoxed = layoutConfig()['boxed'];
    $isAltMenu = layoutConfig()['alt-menu'];
    $isRTL = layoutConfig()['rtl'];
@endphp
<!DOCTYPE html>
<html lang="ar">

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
    <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}">
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
    <link rel="stylesheet" href="{{ asset('plugins-rtl/ilepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins-rtl/ilepond/FilePondPluginImagePreview.min.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/light/structure.css') }}">
    <link rel="stylesheet" href="{{ mix('rtl/css/dark/structure.css') }}">

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
    </style>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/light/main.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dark/main.css') }}">

    {{-- @if (!Request::routeIs('404') && !Request::routeIs('maintenance') && !Request::routeIs('signin') && !Request::routeIs('signup') && !Request::routeIs('lockscreen') && !Request::routeIs('password-reset') && !Request::routeIs('2Step') && !Request::routeIs('login'))
        @if ($scrollspy == 1)
            @vite(['public/resources/rtl/scss/light/assets/scrollspyNav.scss', 'public/resources/rtl/scss/dark/assets/scrollspyNav.scss'])
        @endif
        @vite(['plugins-rtl/waves/waves.min.css'])
        @vite(['plugins-rtl/highlight/styles/monokai-sublime.css'])
        @vite(['public/resources/rtl/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss', 'public/resources/rtl/scss/layouts/vertical-light-menu/light/structure.scss', 'public/resources/rtl/scss/layouts/vertical-light-menu/dark/structure.scss', 'public/resources/rtl/scss/light/assets/custom.scss', 'public/resources/rtl/scss/dark/assets/custom.scss'])

    @endif --}}

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{ $headerFiles }}
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body class="layout-boxed scrollbar">

    <!-- BEGIN LOADER -->
    <x-admin.loader />
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @auth('admin')
        <x-admin.navbar />
    @endauth
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <!--  BEGIN LOADER  -->
        <x-admin.overlay />
        <!--  END LOADER  -->

        <!--  BEGIN SIDEBAR  -->
        @auth('admin')
            <x-admin.sidebar />
        @endauth
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        @auth('admin')
            <div id="content" class="main-content">
                <div class="contaienr">
                    <div class="contaienr">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @else
            <div id="content" class="main-content" style="margin-right: 0">
                <div class="contaienr">
                    <div class="contaienr">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        @endauth

        <!--  BEGIN FOOTER  -->
        <x-admin.footer />
        <!--  END FOOTER  -->

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

    {{-- @if ($scrollspy == 1)
        @vite(['public/resources/rtl/assets/js/scrollspyNav.js'])
    @endif --}}

    <script src="{{ asset('plugins-rtl/global/vendors.min.js') }}"></script>
    <script src="{{ asset('resources/rtl/assets/js/custom.js') }}"></script>
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
