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

            <div class="row g-3 card" style="padding: 20px">

                <div class="col">
                    <label for="research_topic" class="form-label">عنوان البحث</label>
                    <div class="form-control">{{ $order->research_topic }}</div>
                </div>

                <div class="col">
                    <label for="teacher_name" class="form-label">اسم المعلم/ة</label>
                    <div class="form-control">{{ $order->teacher_name }}</div>
                </div>

                <div class="col">
                    <label for="user_name" class="form-label">اسم الطالب/ة</label>
                    <div class="form-control">{{ $order->user->name }}</div>
                </div>

                <div class="col">
                    <label for="ueser_educationLevel" class="form-label">المرحلة الدراسية</label>
                    <div class="form-control">{{ $order->educationLevel->name_ar }}</div>
                </div>

                <div class="col">
                    <a href="/admin-panel-management/orders" class="btn btn-secondary m-1">رجوع</a>
                </div>
            </div>
        </div>


    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
