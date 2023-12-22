<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.css']) --}}
        {{-- @vite(['public/resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss']) --}}
        {{-- @vite(['public/resources/rtl/scss/light/assets/apps/ecommerce-create.scss']) --}}
        {{-- @vite(['public/plugins-rtl/filepond/filepond.min.css']) --}}


        <link rel="stylesheet" href="{{ asset('plugins-rtl/table/datatable/datatables.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dt-global_style.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">

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

            <form method="POST" action="/admin-panel-management/member/store" class="row g-3 card" style="padding: 20px"
                enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" class="form-control" placeholder="ادخل الاسم">
                    @error('name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="photo" class="form-label">صورة الموظف</label>
                    <input type="file" name="photo" class="form-control" placeholder="ادخل صورة الموظف">
                    @error('photo')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="col">
                    <label for="photo" class="form-label">صورة الموظف</label>
                    <div class="multiple-file-upload">
                        <input type="file" name="photo" class="filepond file-upload-multiple" multiple
                            data-allow-reorder="true" data-max-file-size="3MB" data-max-files="5">
                    </div>
                    @error('photo')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="col">
                    <label for="position" class="form-label">المسمى الوظيفي</label>
                    <input type="text" name="position" class="form-control" placeholder="ادخل المسمى الوظيفي">
                    @error('position')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="about" class="form-label">لمحة عن الموظف</label>
                    <textarea type="text" name="about" class="form-control text-right"></textarea>
                    @error('about')
                        <p class="mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <a href="/admin-panel-management/members" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">اضافة</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        {{-- @vite(['public/resources/rtl/assets/js/apps/ecommerce-create.js'])
        @vite(['public/plugins-rtl/filepond/filepond.min.js']) --}}

        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
        <script src="{{ asset('resources/rtl/assets/js/apps/ecommerce-create.js') }}"></script>
        <script src="{{ asset('plugins-rtl/filepond/filepond.min.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
