<div class="sidebar-wrapper sidebar-theme" style="margin-top: 65px; z-index: 1">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu mt-4">
                <a href="/dashboard/home" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard"
                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                             fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 4h6v8h-6z"/>
                            <path d="M4 16h6v4h-6z"/>
                            <path d="M14 12h6v8h-6z"/>
                            <path d="M14 4h6v4h-6z"/>
                        </svg>
                        <span>لوحة التحكم</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="/dashboard/profile" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24"
                             height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12a4 4 0 1 0 -4 -4a4 4 0 0 0 4 4z"/>
                            <path d="M5 18c0 -3 3 -5 7 -5s7 2 7 5"/>
                        </svg>
                        <span>الملف الشخصي</span>
                    </div>
                </a>
            </li>

            <li class="menu menu-heading">
                <div class="heading">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>
            </li>

            @if(auth()->check() && auth()->user()->role->name === 'USER')
                <li class="menu">
                    <a href="{{ route('dashboard.supported-games') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tools"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M13 3l3 3l-4 4l-3 -3z"/>
                                <path d="M7 13l-3 3l4 4l3 -3z"/>
                                <path d="M13 7l4 4"/>
                                <path d="M7 13l-4 4"/>
                            </svg>
                            <span>تعزيز المهارات</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('dashboard.learned-games') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24"
                                 height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M3 4h18v16h-18z"/>
                                <path d="M3 8h18"/>
                                <path d="M3 12h18"/>
                                <path d="M3 16h18"/>
                            </svg>
                            <span>المهارات المتعلمة</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="{{ route('dashboard.progress') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                 fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10"/>
                            </svg>
                            <span>التقدم</span>
                        </div>
                    </a>
                </li>
            @endif

            @if(auth()->check() && (auth()->user()->role->name === 'ADMIN' || auth()->user()->role->name === 'SUPER_ADMIN'))
                <li class="menu menu-heading">
                    <div class="heading">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round" class="feather feather-minus">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span>الاعدادات</span></div>
                </li>

                <li class="menu">
                    <a href="#users" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                 width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                 stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"/>
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"/>
                            </svg>
                            <span>المستخدمين</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="dropdown-menu submenu list-unstyled dropdown-menu-end" id="users"
                        data-bs-parent="#accordionExample">
                        <li class="">
                            <a href="/dashboard/user/add"> اضافة </a>
                        </li>
                        <li class="">
                            <a href="/dashboard/users"> عرض الجميع </a>
                        </li>
                    </ul>
                </li>

                @if(auth()->check() && auth()->user()->role->name === 'SUPER_ADMIN')
                    <li class="menu">
                        <a href="#admins" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-plus"
                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"/>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                    <path d="M16 19h6"/>
                                    <path d="M19 16v6"/>
                                </svg>
                                <span>الأدمن</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-unstyled dropdown-menu-end" id="admins"
                            data-bs-parent="#accordionExample">
                            <li class="">
                                <a href="/dashboard/admin/add"> اضافة </a>
                            </li>
                            <li class="">
                                <a href="/dashboard/admins"> عرض الجميع </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif

        </ul>
    </nav>
</div>
