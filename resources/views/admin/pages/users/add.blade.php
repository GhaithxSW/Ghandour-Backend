<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <link rel="stylesheet" href="{{ asset('plugins-rtl/table/datatable/datatables.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dt-global_style.css') }}">

        <style>
            .dashboard {
                margin-right: 255px;
                margin-left: 15px;
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

            <form method="POST" action="/dashboard/user/store" class="row g-3 card" style="padding: 20px"
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
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="email" name="email" class="form-control text-right"
                           placeholder="ادخل البريد الالكتروني">
                    @error('email')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="child_name" class="form-label">اسم الطفل</label>
                    <input type="text" name="child_name" class="form-control" placeholder="ادخل اسم الطفل">
                    @error('child_name')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="child_age" class="form-label">عمر الطفل</label>
                    <input type="text" name="child_age" class="form-control"
                           placeholder="ادخل عمر الطفل">
                    @error('child_age')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <a href="/dashboard/users" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">اضافة</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
