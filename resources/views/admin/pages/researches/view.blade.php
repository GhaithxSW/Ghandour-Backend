<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])

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
                        <img src="{{ $research->image ? Vite::asset('public/storage/' . $research->image) : Vite::asset('public/no-image.png') }}"
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
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
