<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])

        <style>
            .dashboard {
                margin-right: 255px;
                margin-left: 15px;
                margin-top: 30px;
                margin-bottom: 30px;
            }
        </style>

    </x-slot>

    <div class="dashboard">

        <div class="container" style="padding: 5%">

            @if (session('success'))
                <div class="alert alert-success text-center" style="font-size: 20px; margin-bottom: 50px">
                    {{ session('success') }}
                </div>
            @endif

            {{-- @if ($errors->any())
                <div style="color: red;">
                    <strong>Validation errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form method="POST" action="/admin-panel-management/user/store" class="row g-3 card" style="padding: 20px"
                enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <label for="name" class="form-label">اسم المستخدم</label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المستخدم">
                    @error('name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <input type="text" name="phone" class="form-control" placeholder="ادخل رقم الهاتف">
                    @error('phone')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control text-right"
                        placeholder="ادخل البريد الالكتروني">
                    @error('email')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" name="password" class="form-control" placeholder="ادخل كلمة المرور">
                    @error('password')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="password_confirmation" class="form-label">كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="تأكيد كلمة المرور">
                    @error('password_confirmation')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-success m-1">اضافة</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
