<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['public/resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss']) --}}

        <link rel="stylesheet" href="{{ asset('plugins-rtl/table/datatable/datatables.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dt-global_style.css') }}">

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

            <div class="row g-3 card" style="padding: 20px">
                <div class="col">
                    <label for="name" class="form-label">اسم المستخدم</label>
                    <div class="form-control">{{ $user->first_name }} {{ $user->last_name }}</div>
                </div>
                <div class="col">
                    <label for="phone" class="form-label">رقم الهاتف</label>
                    <div class="form-control">{{ $user->phone }}</div>
                </div>
                <div class="col">
                    <label for="email" class="form-label">البريد الالكتروني</label>
                    <div class="form-control">{{ $user->email }}</div>
                </div>
                <div class="col">
                    <label for="email" class="form-label">الدولة</label>
                    <div class="form-control">{{ $user->country }}</div>
                </div>
                <div class="col">
                    <a href="/admin-panel-management/users" class="btn btn-secondary m-1">رجوع</a>
                </div>
            </div>

        </div>

        <x-slot:footerFiles>
            {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
            <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
        </x-slot>

</x-admin.base-layout>
