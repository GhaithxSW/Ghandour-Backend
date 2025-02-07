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

    @if(auth()->check())
        <div></div>
    @else
        <div class="auth-container d-flex">
            <div class="container mx-auto align-self-center">
                <div class="row">
                    <div
                        class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h2>إنشاء حساب جديد</h2>
                                    </div>
                                    <form method="POST" action="/dashboard/register">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">اسم المستخدم</label>
                                                <input type="text" name="name"
                                                       class="form-control add-billing-address-input"
                                                       placeholder="قم بادخال اسم المستخدم">
                                                @error('name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">البريد الالكتروني</label>
                                                <input type="text" name="email"
                                                       class="form-control add-billing-address-input"
                                                       placeholder="قم بادخال البريد الالكتروني">
                                                @error('email')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">كلمة المرور</label>
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="قم بادخال كلمة المرور">
                                                @error('password')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">اسم الطفل</label>
                                                <input type="password" class="form-control" name="childName"
                                                       placeholder="قم بادخال اسم الطفل">
                                                @error('childName')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label">عمر الطفل</label>
                                                <input type="password" class="form-control" name="childAge"
                                                       placeholder="قم بادخال عمر الطفل">
                                                @error('childAge')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <button type="submit" class="btn btn-secondary w-100"
                                                        style="text-transform:uppercase">
                                                    تسجيل
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">لديك حساب مسبقا؟ <a href="/dashboard/sign-in"
                                                                                class="text-warning">
                                                    تسجيل الدخول</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles></x-slot>

    {{-- </x-slot> --}}
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-admin.base-layout>
