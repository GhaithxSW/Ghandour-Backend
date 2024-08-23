<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">

        <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/tagify/tagify.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/leaflet/leaflet.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/contact_us.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/contact_us.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/timeline.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/timeline.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/splide/splide.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-splide.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-splide.min.css') }}">

        <style>
            .research-responsive {
                margin-top: 40px;
                margin-left: 20px;
                margin-right: 20px;
            }

            .post-content-responsive-new {
                padding: 50px;
            }

            @media (max-width: 400px) {
                .research-responsive {
                    margin-top: 10px;
                    margin-bottom: 10px;
                    margin-left: 10px;
                    margin-right: 10px;
                }

                .hide-div {
                    display: none;
                }

                .post-content-responsive-new {
                    padding: 5px;
                }
            }
        </style>

    </x-slot>

    <div class="research-responsive">
        <div class="row layout-top-spacing">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
                <div class="single-post-content" style="border-radius: 20px">
                    <div class="featured-image"
                        style="background: black url('{{ $research->image ? asset('storage/images/' . $research->image) : asset('resources/new-logo-buhothy.png') }}') no-repeat center; border-radius: 20px">
                        <div class="featured-image-overlay"></div>
                        <div class="post-header">
                            <div class="post-title">
                                <h1 class="mb-0">{{ $research->title }}</h1>
                            </div>
                            <div class="post-meta-info d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ $research->image ? asset('storage/images/' . $research->image) : asset('resources/new-logo-buhothy.png') }}"
                                        alt="...">
                                    <div class="media-body hide-div mr-2">
                                        {{-- <h5>Kelly Young</h5> --}}
                                        {{-- <p>{{ $research->created_at->format('d M Y') }}</p> --}}
                                    </div>
                                </div>
                                <div class="align-self-center hide-div">
                                    <p style="color: white">{{ $research->created_at->format('d M Y') }}</p>
                                    {{-- <button class="btn btn-success btn-icon btn-share btn-rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-share-2">
                                            <circle cx="18" cy="5" r="3"></circle>
                                            <circle cx="6" cy="12" r="3"></circle>
                                            <circle cx="18" cy="19" r="3"></circle>
                                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                                        </svg>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="post-content"> --}}
                    <div class="post-content-responsive-new">
                        <p>{!! $research->content !!}</p>
                        <a href="/" class="btn btn-secondary mt-3">{{ __('trans.back') }}</a>
                        <a href="/download-pdf/{{ $research->pdf_file }}" class="btn btn-success mt-3">{{ __('trans.downloadPdf') }}</a>
                        <a href="/download-word/{{ $research->docx_file }}" class="btn btn-success mt-3">{{ __('trans.downloadDocx') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:footerFiles></x-slot>

</x-rtl.base-layout>
