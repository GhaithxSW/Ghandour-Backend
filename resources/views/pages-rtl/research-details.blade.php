<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        {{-- @vite(['public/resources/scss/light/assets/components/modal.scss'])
        @vite(['public/resources/scss/dark/assets/components/modal.scss']) --}}
        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">

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
                        style="background: black url('{{ asset('storage/' . $research->image) }}') no-repeat center; border-radius: 20px">
                        <div class="featured-image-overlay"></div>
                        <div class="post-header">
                            <div class="post-title">
                                <h1 class="mb-0">{{ $research->title }}</h1>
                            </div>
                            <div class="post-meta-info d-flex justify-content-between">
                                <div class="media">
                                    <img src="{{ $research->image ? asset('storage/' . $research->image) : asset('no-image.png') }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:footerFiles></x-slot>

</x-rtl.base-layout>
