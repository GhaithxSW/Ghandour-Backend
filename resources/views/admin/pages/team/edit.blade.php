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
                    تم تعديل الموظف بنجاح
                </div>
            @endif

            <form method="POST" action="/admin-panel-management/member/{{ $member->id }}/update" class="row g-3 card"
                style="padding: 20px" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" name="name" class="form-control" value="{{ $member->name }}"
                        placeholder="ادخل الاسم">
                    @error('name')
                        <p class="m-2 text-red-600" style="color: red">الاسم مطلوب</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="photo" class="form-label">صورة الموظف</label>
                    <div class="text-center mb-4">
                        <img src="{{ $member->photo ? asset('storage/images/' . $member->photo) : asset('no-image.png') }}"
                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                    </div>
                    <input type="file" name="photo" class="form-control" value="{{ $member->photo }}"
                        placeholder="ادخل صورة الموظف">
                    @error('photo')
                        <p class="m-2 text-red-600" style="color: red">صورة الموظف مطلوبة</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="position" class="form-label">المسمى الوظيفي</label>
                    <input type="text" name="position" class="form-control" value="{{ $member->position }}"
                        placeholder="ادخل المسمى الوظيفي">
                    @error('position')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="about" class="form-label">لمحة عن الموظف</label>
                    <textarea type="text" name="about" class="form-control text-right">{{ $member->about }}</textarea>
                    @error('about')
                        <p class="mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <a href="/admin-panel-management/members" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">تعديل</button>
                </div>
            </form>
        </div>


    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>

    </x-slot>

</x-admin.base-layout>
