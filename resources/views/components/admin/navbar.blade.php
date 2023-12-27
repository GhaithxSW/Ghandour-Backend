<style>
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
</style>

<div class="header-container" style="box-shadow: 0 2px 4px 6px rgba(0, 0, 0, 0.1)">
    <header class="header navbar navbar-expand-sm expand-header">
        <a href="javascript:void(0);" class="sidebarCollapse m-2" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>
        <ul class="navbar-item theme-brand flex-row text-center">
            <li class="nav-item theme-logo theme-logo-new">
                <a href="/admin-panel-management/dashboard">
                    <img src="{{ asset('resources/new-logo-buhothy.png') }}" class="navbar-logo" alt="LOGO"
                        style="height: 50px">
                </a>
            </li>
            <li class="nav-item theme-text them-text-new">
                <a href="/admin-panel-management/dashboard" class="nav-link" style="font-size: 20px"> <b>بحوثي</b> </a>
            </li>
        </ul>
        <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">
            @auth('admin')
                <li class="nav-item theme-toggle-item theme-auth-new">
                    <a href="#">{{ auth('admin')->user()->username }}</a>
                </li>
                <li class="nav-item theme-toggle-item theme-auth-new">
                    <form method="POST" action="/admin-panel-management/logout">
                        @csrf
                        <x-dropdown-link href="/admin-panel-management/logout"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            تسجيل خروج
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout-2"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                            <path d="M3 12h13l-3 -3"></path>
                            <path d="M13 15l3 -3"></path>
                        </svg>
                    </a>
                </li>
            @endauth
        </ul>
    </header>
</div>
