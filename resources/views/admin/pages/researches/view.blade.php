<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

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
                    <label for="title" class="form-label">عنوان البحث</label>
                    <div class="form-control">{{ $research->title }}</div>
                </div>

                <div class="col">
                    <label for="image" class="form-label">صورة البحث</label>
                    <div class="text-center mb-4">
                        <img src="{{ $research->image ? asset('storage/images/' . $research->image) : asset('resources/new-logo-buhothy.png') }}"
                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                    </div>
                </div>

                <div class="col">
                    <label for="content" class="form-label mb-2">محتوى البحث</label>
                    <div class="card" style="padding: 20px">{!! $research->content !!}</div>
                </div>

                <div class="col">
                    <a href="/admin-panel-management/researches" class="btn btn-secondary m-1">رجوع</a>
                </div>
            </div>
        </div>

    </div>

    <x-slot:footerFiles>
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
