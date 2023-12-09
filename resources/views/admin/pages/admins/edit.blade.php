<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])

        <style>
            .dashboard {
                margin-right: 255px;
                margin-left: 15px;
                /* margin-top: 50px; */
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

            <form method="POST" action="/admin-panel-management/admin/{{ $admin->id }}/update" class="row g-3 card"
                style="padding: 20px" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col">
                    <label for="username" class="form-label">اسم المستخدم</label>
                    <input type="text" name="username" class="form-control" placeholder="ادخل اسم المستخدم">
                    @error('username')
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
                    <a href="/admin-panel-management/admins" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">تحديث</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
