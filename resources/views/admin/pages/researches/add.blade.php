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

            <form method="POST" action="/admin-panel-management/research/store" class="row g-3 card" style="padding: 20px"
                enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <label for="title" class="form-label">عنوان البحث</label>
                    <input type="text" name="title" class="form-control" placeholder="ادخل عنوان البحث">
                    @error('title')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="image" class="form-label">صورة البحث</label>
                    <input type="file" name="image" class="form-control" placeholder="ادخل صورة البحث">
                    @error('image')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="content" class="form-label">محتوى البحث</label>
                    <textarea type="text" name="content" class="form-control" placeholder="ادخل محتوى البحث"></textarea>
                    @error('content')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <a href="/admin-panel-management/researches" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">اضافة</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
