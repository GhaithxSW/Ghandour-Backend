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

            <form method="POST" action="/dashboard/updateProfile" class="row g-3 card"
                  style="padding: 20px" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col">
                    <label for="name" class="form-label">اسم المستخدم</label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل اسم المستخدم"
                           value="{{ $user->name }}">
                    @error('name')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <input type="text" name="email" class="form-control" placeholder="ادخل البريد الالكتروني"
                           value="{{ $user->email }}">
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

                @if(auth()->check() && auth()->user()->role->name === 'USER')
                    <div class="col">
                        <label for="child_name" class="form-label">اسم الطفل</label>
                        <input type="text" name="child_name" class="form-control"
                               placeholder="ادخل اسم الطفل" value="{{ $user->child_name }}">
                        @error('child_name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="child_age" class="form-label">عمر الطفل</label>
                        <input type="text" name="child_age" class="form-control"
                               placeholder="ادخل عمر الطفل" value="{{ $user->child_age }}">
                        @error('child_age')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <div class="col">
                    <a href="/dashboard/home" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">تحديث</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
