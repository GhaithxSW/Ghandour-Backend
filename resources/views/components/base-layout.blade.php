@php
    $isBoxed = layoutConfig()['boxed'];
    $isAltMenu = layoutConfig()['alt-menu'];
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ $pageTitle }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('resources/images/logo-new.png') }}" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
    <!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css" />

    {{-- @vite(['public/plugins/bootstrap/bootstrap.min.css']) --}}
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">

    {{-- @vite(['public/resources/scss/layouts/vertical-light-menu/light/loader.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/loader.css') }}">

    {{-- @vite(['public/resources/scss/layouts/vertical-light-menu/dark/loader.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/loader.css') }}">


    {{-- @vite(['public/resources/scss/light/assets/components/carousel.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/carousel.css') }}">


    {{-- @vite(['public/resources/scss/dark/assets/components/carousel.sacss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/carousel.css') }}">


    {{-- @vite(['public/resources/scss/light/assets/apps/blog-create.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/blog-create.css') }}">


    {{-- @vite(['public/resources/scss/dark/assets/apps/blog-create.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/blog-create.css') }}">




    {{-- @vite(['public/resources/scss/light/assets/apps/blog-post.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">



    {{-- @vite(['public/resources/scss/dark/assets/apps/blog-post.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}">


    {{-- @vite(['public/resources/scss/light/assets/forms/switches.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/switches.css') }}">




    {{-- @vite(['public/resources/scss/dark/assets/forms/switches.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/switches.css') }}">



    {{-- @vite(['public/resources/scss/light/plugins/tagify/custom-tagify.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/custom-tagify.css') }}">



    {{-- @vite(['public/resources/scss/dark/plugins/tagify/custom-tagify.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/custom-tagify.css') }}">



    {{-- @vite(['public/resources/scss/light/plugins/filepond/custom-filepond.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/custom-filepond.css') }}">




    {{-- @vite(['public/resources/scss/dark/plugins/filepond/custom-filepond.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/custom-filepond.css') }}">



    {{-- @vite(['public/resources/scss/light/assets/components/tabs.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/tabs.css') }}">



    {{-- @vite(['public/resources/scss/dark/assets/components/tabs.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/tabs.css') }}">



    {{-- @vite(['public/resources/scss/light/assets/elements/custom-pagination.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/custom-pagination.css') }}">




    {{-- @vite(['public/resources/scss/dark/assets/elements/custom-pagination.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/custom-pagination.css') }}">



    {{-- @vite(['public/resources/scss/light/assets/scrollspyNav.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/scrollspyNav.css') }}">





    {{-- @vite(['public/resources/scss/dark/assets/scrollspyNav.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/scrollspyNav.css') }}">




    {{-- @vite(['public/resources/scss/light/plugins/editors/quill/quill.snow.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/quill.snow.css') }}">





    {{-- @vite(['public/resources/scss/dark/plugins/editors/quill/quill.snow.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/quill.snow.css') }}">


    {{-- @vite(['public/plugins/animate/animate.css']) --}}
    <link rel="stylesheet" href="{{ asset('plugins/animate/animate.css') }}">

    {{-- @vite(['public/plugins/tagify/tagify.css']) --}}
    <link rel="stylesheet" href="{{ asset('plugins/tagify/tagify.css') }}">


    {{-- @vite(['public/plugins/filepond/filepond.min.css']) --}}
    <link rel="stylesheet" href="{{ asset('plugins/filepond/filepond.min.css') }}">



    {{-- @vite(['public/plugins/filepond/FilePondPluginImagePreview.min.css']) --}}
    <link rel="stylesheet" href="{{ asset('plugins/filepond/FilePondPluginImagePreview.min.css') }}">




    {{-- @vite(['public/resources/scss/layouts/vertical-light-menu/light/structure.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/structure.css') }}">



    {{-- @vite(['public/resources/scss/layouts/vertical-light-menu/dark/structure.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/dark/structure.css') }}">



    {{-- @vite(['public/resources/layouts/vertical-light-menu/loader.js']) --}}
    {{-- <link rel="stylesheet" href="{{ asset('resources/layouts/vertical-light-menu/loader.js') }}"> --}}
    <script src="{{ asset('resources/layouts/vertical-light-menu/loader.js') }}"></script>


    {{-- @vite(['public/resources/scss/light/plugins/plugins.min.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/plugins.min.css') }}">

    {{-- @notifyCss --}}

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

    {{-- @vite(['public/resources/layouts/vertical-light-menu/loader.js']) --}}
    <link rel="stylesheet" href="{{ asset('resources/layouts/vertical-light-menu/loader.js') }}">

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">



    {{-- @vite(['public/resources/scss/light/assets/main.scss', 'public/resources/scss/dark/assets/main.scss']) --}}
    <link rel="stylesheet" href="{{ mix('css/light/main.css') }}">
    <link rel="stylesheet" href="{{ mix('css/dark/main.css') }}">



    @if (
        !Request::routeIs('404') &&
            !Request::routeIs('maintenance') &&
            !Request::routeIs('signin') &&
            !Request::routeIs('signup') &&
            !Request::routeIs('lockscreen') &&
            !Request::routeIs('password-reset') &&
            !Request::routeIs('2Step') &&
            !Request::routeIs('login'))
        @if ($scrollspy == 1)
            {{-- @vite(['public/resources/scss/light/assets/scrollspyNav.scss', 'public/resources/scss/dark/assets/scrollspyNav.scss']) --}}
            <link rel="stylesheet" href="{{ mix('css/light/scrollspyNav.css') }}">
            <link rel="stylesheet" href="{{ mix('css/dark/scrollspyNav.css') }}">
        @endif
        {{-- @vite(['public/plugins/waves/waves.min.css']) --}}
        <link rel="stylesheet" href="{{ asset('plugins/waves/waves.min.css') }}">
        {{-- @vite(['public/plugins/highlight/styles/monokai-sublime.css']) --}}
        <link rel="stylesheet" href="{{ asset('plugins/highlight/styles/monokai-sublime.css') }}">
        {{-- @vite(['public/resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss']) --}}
        <link rel="stylesheet" href="{{ mix('css/light/perfect-scrollbar.css') }}">

    @endif

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {{ $headerFiles }}
    <!-- END GLOBAL MANDATORY STYLES -->
</head>

<body class="layout-boxed scrollbar">

    <!-- BEGIN LOADER -->
    <x-layout-loader />
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <x-navbar.style-vertical-menu classes="" />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <!--  BEGIN LOADER  -->
        <x-layout-overlay />
        <!--  END LOADER  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="contaienr">
                <div class="contaienr">
                    {{ $slot }}
                </div>
            </div>

            <!--  BEGIN FOOTER  -->
            <x-layout-footer />
            <!--  END FOOTER  -->

        </div>
        <!--  END CONTENT AREA  -->

    </div>

    <!-- jQuery CDN -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap CDN -->
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js">
    </script>
    <!-- Bootstrap-Iconpicker Bundle -->
    <script type="text/javascript" src="dist/js/bootstrap-iconpicker.bundle.min.js"></script>

    @if ($scrollspy == 1)
        {{-- @vite(['public/resources/assets/js/scrollspyNav.js']) --}}
        <script src="{{ asset('resources/assets/js/scrollspyNav.js') }}"></script>
    @endif

    {{-- @vite(['public/resources/layouts/vertical-light-menu/app.js']) --}}
    <script src="{{ asset('resources/layouts/vertical-light-menu/app.js') }}"></script>

    {{-- @vite(['public/plugins/bootstrap/bootstrap.bundle.min.js']) --}}
    <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>


    {{-- @vite(['public/plugins/perfect-scrollbar/perfect-scrollbar.min.js']) --}}
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>



    {{-- @vite(['public/plugins/mousetrap/mousetrap.min.js']) --}}
    <script src="{{ asset('plugins/mousetrap/mousetrap.min.js') }}"></script>


    {{-- @vite(['public/plugins/waves/waves.min.js']) --}}
    <script src="{{ asset('plugins/waves/waves.min.js') }}"></script>



    {{-- @vite(['public/plugins/filepond/filepond.min.js']) --}}
    <script src="{{ asset('plugins/filepond/filepond.min.js') }}"></script>




    {{-- @vite(['public/plugins/filepond/FilePondPluginFileValidateType.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginFileValidateType.min.js') }}"></script>




    {{-- @vite(['public/plugins/filepond/FilePondPluginImageExifOrientation.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>



    {{-- @vite(['public/plugins/filepond/FilePondPluginImagePreview.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginImagePreview.min.js') }}"></script>


    {{-- @vite(['public/plugins/filepond/FilePondPluginImageCrop.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginImageCrop.min.js') }}"></script>



    {{-- @vite(['public/plugins/filepond/FilePondPluginImageResize.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginImageResize.min.js') }}"></script>




    {{-- @vite(['public/plugins/filepond/FilePondPluginImageTransform.min.js']) --}}
    <script src="{{ asset('plugins/filepond/FilePondPluginImageTransform.min.js') }}"></script>




    {{-- @vite(['public/plugins/filepond/filepondPluginFileValidateSize.min.js']) --}}
    <script src="{{ asset('plugins/filepond/filepondPluginFileValidateSize.min.js') }}"></script>




    {{-- @vite(['public/resources/assets/js/apps/blog-create.js']) --}}
    <script src="{{ asset('resources/assets/js/apps/blog-create.js') }}"></script>






    {{-- @vite(['public/plugins/tagify/tagify.min.js']) --}}
    <script src="{{ asset('plugins/tagify/tagify.min.js') }}"></script>





    {{-- @vite(['public/plugins/highlight/highlight.pack.js']) --}}
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>




    {{-- @vite(['public/plugins/editors/quill/quill.js']) --}}
    <script src="{{ asset('plugins/editors/quill/quill.js') }}"></script>





    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    {{-- @vite(['public/resources/assets/js/scrollspyNav.js']) --}}

    {{-- <x-notify::notify />
    @notifyJs --}}

    {{ $footerFiles }}

</body>

</html>
