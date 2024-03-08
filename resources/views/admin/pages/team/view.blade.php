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
                /* margin-top: 50px;     */
                margin-bottom: 30px;
            }
        </style>

    </x-slot>

    <div class="dashboard">

        <div class="container" style="padding: 5%">

            <div class="row g-3 card" style="padding: 20px">

                <div class="col">
                    <label for="name" class="form-label">الاسم</label>
                    <div class="form-control">{{ $member->name }}</div>
                </div>

                <div class="col">
                    <label for="photo" class="form-label">صورة الموظف</label>
                    <div class="text-center mb-4">
                        <img src="{{ $research->image ? asset('storage/images/' . $research->image) : asset('resources/new-logo-buhothy.png') }}"
                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                    </div>
                </div>

                <div class="col">
                    <label for="position" class="form-label">المسمى الوظيفي</label>
                    <div class="form-control" style="pointer-events: none">{{ $member->position }}</div>
                </div>

                <div class="col">
                    <label for="about" class="form-label">لمحة عن الموظف</label>
                    <textarea class="form-control" style="pointer-events: none">{{ $member->about }}</textarea>
                </div>

                <div class="col">
                    <a href="/admin-panel-management/members" class="btn btn-secondary m-1">رجوع</a>
                </div>
            </div>
        </div>


    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
