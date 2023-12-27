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

            <div class="row g-3 card" style="padding: 20px">

                <div class="row mb-4">
                    <div class="col">
                        <label for="research_topic" class="form-label">رقم الطلب</label>
                        <div class="form-control">{{ $order->id }}</div>
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">اسم الطالب/ة الأول</label>
                        <div class="form-control">{{ $order->user->first_name }}</div>
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">اسم العائلة</label>
                        <div class="form-control">{{ $order->user->last_name }}</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="user_name" class="form-label">الدولة</label>
                        <div class="form-control">{{ $order->user->country }}</div>
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">رقم الهاتف</label>
                        <div class="form-control">{{ $order->user->phone }}</div>
                    </div>
                    <div class="col">
                        <label for="user_name" class="form-label">البريد الإلكتروني</label>
                        <div class="form-control">{{ $order->user->email }}</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">المستوى الدراسي</label>
                        <div class="form-control">{{ $order->education_level }}</div>
                    </div>
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">الدراسة</label>
                        <div class="form-control">{{ $order->grade }}</div>
                    </div>
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">اسم المدرسة / الجامعة</label>
                        <div class="form-control">{{ $order->school_university }}</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="teacher_name" class="form-label">اسم المعلم/ة</label>
                        <div class="form-control">{{ $order->teacher_name }}</div>
                    </div>
                    <div class="col">
                        <label for="research_topic" class="form-label">عنوان حلقة البحث</label>
                        <div class="form-control">{{ $order->research_topic }}</div>
                    </div>
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">عدد صفحات حلقة البحث</label>
                        <div class="form-control">{{ $order->research_papers_count }}</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">لغة حلقة البحث</label>
                        <div class="form-control">{{ $order->research_lang }}</div>
                    </div>
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">تاريخ تسليم حلقة البحث</label>
                        <div class="form-control">{{ $order->delivery_date }}</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="ueser_educationLevel" class="form-label">ملاحظات / معلومات اخرى</label>
                        <textarea class="form-control" style="pointer-events: none">{{ $order->notes }}</textarea>
                    </div>
                </div>

                <div class="col">
                    <a href="/admin-panel-management/orders" class="btn btn-secondary m-1">رجوع</a>
                </div>
            </div>
        </div>


    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
