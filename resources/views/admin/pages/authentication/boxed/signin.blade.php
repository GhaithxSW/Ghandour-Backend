<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{ $title }}
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/rtl/scss/light/assets/authentication/auth-boxed.scss'])
        @vite(['resources/rtl/scss/dark/assets/authentication/auth-boxed.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    @auth
        <div></div>
    @else
        <div class="auth-container d-flex m-4">
            <div class="container mx-auto align-self-center">
                <div class="row">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                        <div class="card mt-3 mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h2>تسجيل دخول</h2>
                                    </div>
                                    <form method="POST" action="/admin-panel-management/login">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">اسم المستخدم</label>
                                                <input type="text" class="form-control text-right" name="username"
                                                    placeholder="قم بادخال اسم المستخدم">
                                                @error('username')
                                                    <p class="text-red-500 text-xs m-1" style="color: red">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label class="form-label">كلمة المرور</label>
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="قم بادخال كلمة المرور">
                                                @error('password')
                                                    <p class="text-red-500 text-xs m-1" style="color: red">{{ $message }}
                                                    </p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="mb-3">
                                                <div class="form-check form-check-primary form-check-inline">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        id="form-check-default">
                                                    <label class="form-check-label" for="form-check-default">
                                                        تذكرني
                                                    </label>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-secondary w-100"
                                                    style="text-transform:uppercase">
                                                    تسجيل دخول
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">ليس لديك حساب؟
                                                <a href="/admin-panel-management/sign-up" class="text-warning">
                                                    التسجيل
                                                </a>
                                            </p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth



    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles></x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-admin.base-layout>
