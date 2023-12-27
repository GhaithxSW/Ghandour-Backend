<style>
    .hidden-div {
        display: none;
    }

    @media (max-width: 991px) {
        .theme-logo-new {
            display: none;
        }

        .theme-auth-new {
            display: none;
        }

        .them-text-new {
            display: none;
        }

        .theme-lang-new {
            display: none;
        }

        .theme-mode-new {
            display: none;
        }
    }

    @media (max-width: 990px) {
        .theme-logo-mobile {
            display: block;
        }

        .hidden-div {
            display: block;
        }

        .theme-mode-mobile {
            display: block;
        }
    }
</style>

{{-- Start Modal --}}

<div class="modal fade" id="navModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div>

                    {{-- @auth
                        <div class="btn btn-dark nav-item theme-toggle-item hidden-div mb-2" style="pointer-events: none">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="btn btn-dark nav-item theme-toggle-item hidden-div mb-2">
                            <form method="POST" action="/logout">
                                @csrf
                                <x-dropdown-link href="/logout" style="color: white"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('trans.logout') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2">
                                        </path>
                                        <path d="M15 12h-12l3 -3"></path>
                                        <path d="M6 15l-3 -3"></path>
                                    </svg>
                                </x-dropdown-link>
                            </form>
                        </div>
                    @else
                        <div class="btn btn-dark nav-item theme-toggle-item hidden-div mb-2" data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            {{ __('trans.login') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login-2"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2">
                                </path>
                                <path d="M3 12h13l-3 -3"></path>
                                <path d="M13 15l3 -3"></path>
                            </svg>
                        </div>
                    @endauth --}}

                    <div class="btn btn-dark nav-item dropdown language-dropdown hidden-div" style="z-index: 1">
                        <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                            {{ __('trans.language') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                                <path d="M3.6 9h16.8" />
                                <path d="M3.6 15h16.8" />
                                <path d="M11.5 3a17 17 0 0 0 0 18" />
                                <path d="M12.5 3a17 17 0 0 1 0 18" />
                            </svg>
                        </a>
                        <div class="dropdown-menu position-absolute row" aria-labelledby="language-dropdown">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <div class="text-center">
                                        {{ $properties['native'] }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn btn-dark" data-bs-dismiss="modal" style="font-size: 12px"><i class="flaticon-cancel-12"></i>
                    {{ __('trans.close') }}</button>
            </div>
        </div>
    </div>
</div>

{{-- End Modal --}}

<div class="header-container" style="box-shadow: 0 2px 4px 6px rgba(0, 0, 0, 0.1);">
    <header class="header navbar navbar-expand-sm expand-header">

        <div>
            <a href="javascript:void(0);" class="sidebarCollapse m-2" data-placement="bottom" data-bs-toggle="modal"
                data-bs-target="#navModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </a>
        </div>

        <ul class="navbar-item theme-brand flex-row text-center">
            <li class="nav-item theme-logo theme-logo-new">
                <a href="/">
                    <img src="{{ asset('resources/new-logo-buhothy.png') }}" class="navbar-logo" alt="LOGO"
                        style="height: 50px">
                </a>
            </li>
            <li class="nav-item theme-text them-text-new">
                <a href="/" class="nav-link" style="font-size: 20px"> <b>{{ __('trans.bhoothat') }}</b> </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">

            {{-- @auth
                <li class="nav-item theme-toggle-item theme-auth-new">
                    <a href="#">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item theme-toggle-item theme-auth-new">
                    <form method="POST" action="/logout">
                        @csrf
                        <x-dropdown-link href="/logout"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('trans.logout') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2">
                                </path>
                                <path d="M15 12h-12l3 -3"></path>
                                <path d="M6 15l-3 -3"></path>
                            </svg>
                        </x-dropdown-link>
                    </form>
                </li>
            @else
                <li class="nav-item theme-toggle-item theme-auth-new">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        {{ __('trans.login') }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                            <path d="M3 12h13l-3 -3"></path>
                            <path d="M13 15l3 -3"></path>
                        </svg>
                    </a>
                </li>
            @endauth --}}



            <li class="nav-item theme-logo theme-logo-mobile hidden-div">
                <a href="/">
                    <img src="{{ asset('resources/new-logo-buhothy.png') }}" class="navbar-logo" alt="LOGO"
                        style="height: 35px">
                </a>
            </li>

            <li class="nav-item dropdown language-dropdown theme-lang-new">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="language-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img src="{{ Vite::asset('public/src/assets/img/1x1/uae.png') }}" class="flag-width" alt="flag"> --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                        <path d="M3.6 9h16.8" />
                        <path d="M3.6 15h16.8" />
                        <path d="M11.5 3a17 17 0 0 0 0 18" />
                        <path d="M12.5 3a17 17 0 0 1 0 18" />
                    </svg>
                </a>
                <div class="dropdown-menu position-absolute row" aria-labelledby="language-dropdown">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <div class="text-center">
                                {{ $properties['native'] }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </li>

            <li class="nav-item theme-toggle-item theme-mode-mobile">
                <a href="javascript:void(0);" class="nav-link theme-toggle">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor"
                        class="bi bi-moon-stars-fill dark-mode" viewBox="0 0 16 16">
                        <path
                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                        <path
                            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-sun light-mode">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                </a>
            </li>

        </ul>
    </header>
</div>
