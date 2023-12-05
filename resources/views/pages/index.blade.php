<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        @vite(['resources/scss/light/assets/components/modal.scss'])
        @vite(['resources/scss/dark/assets/components/modal.scss'])
        @vite(['public/plugins/filepond/filepond.min.css'])
        @vite(['public/plugins/filepond/FilePondPluginImagePreview.min.css'])
        @vite(['public/plugins/tagify/tagify.css'])
        @vite(['resources/scss/light/assets/forms/switches.scss'])
        @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/light/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/scss/light/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/scss/dark/assets/forms/switches.scss'])
        @vite(['resources/scss/dark/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/dark/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/scss/dark/plugins/filepond/custom-filepond.scss'])
        @vite(['resources/scss/light/assets/apps/ecommerce-create.scss'])
        @vite(['resources/scss/dark/assets/apps/ecommerce-create.scss'])
        @vite(['public/plugins/leaflet/leaflet.css'])
        @vite(['resources/scss/light/assets/pages/contact_us.scss'])
        @vite(['resources/scss/dark/assets/pages/contact_us.scss'])

        {{-- <link href="../src/assets/css/light/scrollspyNav.css" rel="stylesheet" type="text/css" />
        <link href="../src/assets/css/dark/scrollspyNav.css" rel="stylesheet" type="text/css" /> --}}
        @vite(['resources\rtl\scss\light\assets\scrollspyNav.scss'])
        @vite(['resources\rtl\scss\light\assets\scrollspyNav.scss'])

        {{-- <link href="../src/assets/css/light/components/timeline.css" rel="stylesheet" type="text/css" />
        <link href="../src/assets/css/dark/components/timeline.css" rel="stylesheet" type="text/css" /> --}}
        @vite(['resources\rtl\scss\light\assets\components\timeline.scss'])
        @vite(['resources\rtl\scss\dark\assets\components\timeline.scss'])

        <style>
            .toggle-code-snippet {
                margin-bottom: 0px;
            }

            body.dark .toggle-code-snippet {
                margin-bottom: 0px;
            }
        </style>

        <style>
            @media screen and (max-width: 990px) {
                .font-bg {
                    font-size: 26px;
                }
            }

            @media screen and (max-width: 600px) {
                .font-bg {
                    font-size: 18px;
                }

                .font-bg-btn {
                    font-size: 15px;
                }
            }

            @media screen and (max-width: 300px) {
                .font-bg {
                    font-size: 16px;
                }

                .font-bg-btn {
                    font-size: 14px;
                }
            }
        </style>

    </x-slot>


    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">
            <div>
                <div class="featured-image">
                    <div class="featured-image-overlay"></div>
                    <div class="post-header">
                        <div class="post-title">
                            <h1 class="mb-0 font-bg">{{ __('trans.main_content') }}</h1>
                        </div>
                        @auth
                            <div class="post-meta-info d-flex justify-content-between">
                                <a href="/request-research" class="btn btn-warning m-auto w-auto mb-5"
                                    style="font-size: 18px; border-radius: 20px">
                                    <span class="font-bg-btn">{{ __('trans.request_btn') }}</span>
                                </a>
                            </div>
                        @else
                            <div class="post-meta-info d-flex justify-content-between">
                                <button class="btn btn-warning m-auto w-auto mb-5"
                                    style="font-size: 18px; border-radius: 20px" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    <span class="font-bg-btn">{{ __('trans.request_btn') }}</span>
                                </button>
                                <div class="modal fade inputForm-modal" id="loginModal" tabindex="-1" role="dialog"
                                    aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">{{ __('trans.login_to') }}
                                                    <b>{{ __('trans.bhoothat') }}</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"><svg aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6" y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18" y2="18">
                                                        </line>
                                                    </svg></button>
                                            </div>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-mail" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <rect x="3" y="5" width="18" height="14"
                                                                        rx="2">
                                                                    </rect>
                                                                    <polyline points="3 7 12 13 21 7"></polyline>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="email" class="form-control" type="email"
                                                            name="email" :value="old('email')" autocomplete="email"
                                                            placeholder="Enter your email address" required autofocus /> --}}
                                                            <input id="email" class="form-control" type="email"
                                                                name="email" value="{{ old('email') }}"
                                                                autocomplete="email"
                                                                placeholder="{{ __('trans.email_placeholder') }}" required
                                                                autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-lock" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <rect x="5" y="11" width="14" height="10"
                                                                        rx="2"></rect>
                                                                    <circle cx="12" cy="16" r="1"></circle>
                                                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="password" class="form-control"
                                                            type="password" name="password"
                                                            placeholder="Enter your password" autocomplete="password"
                                                            required autofocus /> --}}
                                                            <input id="password" class="form-control" type="password"
                                                                name="password"
                                                                placeholder="{{ __('trans.password_placeholder') }}"
                                                                autocomplete="password" required autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="remember_me" name="remember">
                                                            <label class="form-check-label mb-0" for="form-check-primary">
                                                                {{ __('trans.remember_me') }}
                                                            </label>
                                                        </div>
                                                        <a
                                                            href="javascript:void(0);">{{ __('trans.forget_password?') }}</a>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="btn btn-light-success mt-2 mb-2 btn-no-effect"
                                                        data-bs-dismiss="#loginModal" data-bs-toggle="modal"
                                                        data-bs-target="#registerModal">{{ __('trans.sign_up') }}</div>
                                                    <button type="submit"
                                                        class="btn btn-primary mt-2 mb-2 btn-no-effect">{{ __('trans.login') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade inputForm-modal" id="registerModal" tabindex="-1" role="dialog"
                                    aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">{{ __('trans.register_to') }}
                                                    <b>{{ __('trans.bhoothat') }}</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"><svg aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-x">
                                                        <line x1="18" y1="6" x2="6"
                                                            y2="18">
                                                        </line>
                                                        <line x1="6" y1="6" x2="18"
                                                            y2="18">
                                                        </line>
                                                    </svg>
                                                </button>
                                            </div>
                                            <form class="mt-0" method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-user"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="name" class="form-control"
                                                            type="text" name="name" :value="old('name')"
                                                            autocomplete="name" placeholder="Enter your name" required
                                                            autofocus /> --}}
                                                            <input id="name" class="form-control" type="text"
                                                                name="name" value="{{ old('name') }}"
                                                                autocomplete="name"
                                                                placeholder="{{ __('trans.name_placeholder') }}" required
                                                                autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-mail"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <rect x="3" y="5" width="18" height="14"
                                                                        rx="2"></rect>
                                                                    <polyline points="3 7 12 13 21 7"></polyline>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="email" class="form-control"
                                                            type="email" name="email" :value="old('email')"
                                                            autocomplete="email"
                                                            placeholder="Enter your email address" required
                                                            autofocus /> --}}
                                                            <input id="email" class="form-control" type="email"
                                                                name="email" value="{{ old('email') }}"
                                                                autocomplete="email"
                                                                placeholder="{{ __('trans.email_placeholder') }}" required
                                                                autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-lock"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <rect x="5" y="11" width="14" height="10"
                                                                        rx="2"></rect>
                                                                    <circle cx="12" cy="16" r="1"></circle>
                                                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="password" class="form-control"
                                                            type="password" name="password"
                                                            placeholder="Enter your password"
                                                            autocomplete="new-password" required autofocus /> --}}
                                                            <input id="password" class="form-control" type="password"
                                                                name="password"
                                                                placeholder="{{ __('trans.password_placeholder') }}"
                                                                autocomplete="new-password" required autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-lock"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                    </path>
                                                                    <rect x="5" y="11" width="14" height="10"
                                                                        rx="2"></rect>
                                                                    <circle cx="12" cy="16" r="1"></circle>
                                                                    <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                                                </svg>
                                                            </span>
                                                            {{-- <x-text-input id="password_confirmation" class="form-control"
                                                            type="password" name="password_confirmation"
                                                            autocomplete="new-password"
                                                            placeholder="Confirm your password" required autofocus /> --}}
                                                            <input id="password_confirmation" class="form-control"
                                                                type="password" name="password_confirmation"
                                                                autocomplete="new-password"
                                                                placeholder="{{ __('trans.confirm_password_placeholder') }}"
                                                                required autofocus />
                                                            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="form-check form-check-primary form-check-inline">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="" id="form-check-primary">
                                                            <label class="form-check-label mb-0" for="form-check-primary">
                                                                {{ __('trans.agree') }} <a href="javascript:void(0);"
                                                                    class="text-primary">{{ __('trans.terms_conditions') }}</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="btn btn-light-success mt-2 mb-2 btn-no-effect"
                                                        data-bs-dismiss="#registerModal" data-bs-toggle="modal"
                                                        data-bs-target="#loginModal">{{ __('trans.sign_in') }}</div>
                                                    <button type="submit"
                                                        class="btn btn-primary mt-2 mb-2 btn-no-effect">{{ __('trans.register') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mr-4 ml-4">
        <div class="row">
            <h4 class="text-center mt-4 mb-4"><b>{{ __('trans.samples') }}</b></h4>

            @foreach ($researches as $research)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md- 4 col-sm-6 mb-4">
                    <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                        <img src="{{ $research->image ? Vite::asset('public/storage/' . $research->image) : Vite::asset('public/no-image.png') }}""
                            class="card-img-top" alt="..." style="height: 210px">
                        {{-- <div class="card-body px-0 pb-0 text-center"> --}}
                        <h5 class="card-title mb-3 mt-3 font-bg text-center">{{ $research->title }}</h5>
                        {{-- <button class="btn btn-secondary font-bg-btn">{{ __('trans.read') }}</button> --}}
                        <a href="" class="btn btn-secondary font-bg-btn">{{ __('trans.read') }}</a>
                        {{-- <a href="{{ route('download', ['file' => $fileName]) }}">Download PDF</a> --}}
                        {{-- <a href="{{ route('download', ['file' => 'test.pdf']) }}">Download PDF</a> --}}
                        {{-- </div> --}}
                    </a>
                </div>
            @endforeach

        </div>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins/editors/quill/quill.js'])
        @vite(['public/plugins/filepond/filepond.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginFileValidateType.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginImageExifOrientation.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginImagePreview.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginImageCrop.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginImageResize.min.js'])
        @vite(['public/plugins/filepond/FilePondPluginImageTransform.min.js'])
        @vite(['public/plugins/filepond/filepondPluginFileValidateSize.min.js'])
        @vite(['public/plugins/tagify/tagify.min.js'])
        @vite(['resources/assets/js/apps/ecommerce-create.js'])
        @vite(['public/plugins/leaflet/leaflet.js'])
        @vite(['public/plugins/leaflet/us-states.js'])
        @vite(['public/plugins/leaflet/eu-countries.js'])
    </x-slot>

</x-base-layout>
