<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

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
                    تم تعديل البحث بنجاح
                </div>
            @endif

            <form method="POST" action="/admin-panel-management/research/{{ $research->id }}/update"
                class="row g-3 card" style="padding: 20px" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="col">
                    <label for="title" class="form-label">عنوان البحث</label>
                    <input type="text" name="title" class="form-control" value="{{ $research->title }}"
                        placeholder="ادخل عنوان البحث">
                    @error('title')
                        <p class="m-2 text-red-600" style="color: red">عنوان البحث مطلوب</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="image" class="form-label">صورة البحث</label>
                    <div class="text-center mb-4">
                        <img src="{{ $research->image ? asset('storage/images/' . $research->image) : asset('no-image.png') }}"
                            class="card-img-top" alt="..." style="width: 250px; height: 250px;">
                    </div>
                    <input type="file" name="image" class="form-control" value="{{ $research->image }}"
                        placeholder="ادخل صورة البحث">
                    @error('image')
                        <p class="m-2 text-red-600" style="color: red">صورة البحث مطلوبة</p>
                    @enderror
                </div>

                <div class="col">
                    <div class="col-sm-12">
                        <label for="content" class="form-label">محتوى البحث</label>
                        <textarea type="text" name="content" class="form-control text-right" id="description">{{ $research->content }}</textarea>
                    </div>
                    @error('content')
                        <p class="mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <label for="pdf_file" class="form-label">pdf رفع ملف</label>
                    <input type="file" name="pdf_file" class="form-control" placeholder="رفع ملف">
                    @error('pdf_file')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="col">
                    <label for="docx_file" class="form-label">word رفع ملف</label>
                    <input type="file" name="docx_file" class="form-control" placeholder="رفع ملف">
                    @error('docx_file')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col">
                    <a href="/admin-panel-management/researches" class="btn btn-secondary m-1">رجوع</a>
                    <button type="submit" class="btn btn-success m-1">تعديل</button>
                </div>
            </form>
        </div>

    </div>

    <x-slot:footerFiles>
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
