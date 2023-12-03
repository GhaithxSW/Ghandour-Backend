<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])

        {{-- @vite(['public\plugins-rtl\table\datatable\custom_miscellaneous.js'])
        @vite(['public\plugins-rtl\table\datatable\datatables.css'])
        @vite(['public\plugins-rtl\table\datatable\datatables.js'])
        @vite(['public\plugins-rtl\table\datatable\dt-custom-setting.js'])
        @vite(['public\plugins-rtl\table\datatable\button-ext\buttons.html5.min.js'])
        @vite(['public\plugins-rtl\table\datatable\button-ext\buttons.print.min.js'])
        @vite(['public\plugins-rtl\table\datatable\button-ext\dataTables.buttons.min.js'])
        @vite(['public\plugins-rtl\table\datatable\button-ext\jszip.min.js'])

        @vite(['resources\rtl\scss\light\plugins\table\datatable\custom_dt_custom.scss'])
        @vite(['resources\rtl\scss\light\plugins\table\datatable\custom_dt_miscellaneous.scss'])
        @vite(['resources\rtl\scss\light\plugins\table\datatable\dt-global_style.scss']) --}}
    </x-slot>

    <div class="table-responsive m-4 bg-white">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">اسم المستخدم</th>
                    <th class="text-center">رقم الهاتف</th>
                    <th class="text-center">البريد الالكتروني</th>
                    <th class="text-center">اسم المعلم</th>
                    <th class="text-center">المستوى الدراسي</th>
                    <th class="text-center">ملاحظات</th>
                    <th class="text-center">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($researchRequests as $researchRequest)
                    <tr>
                        <td class="text-center">{{ $researchRequest->id }}</td>
                        <td class="text-center">{{ $researchRequest->user->name }}</td>
                        <td class="text-center">{{ $researchRequest->phone }}</td>
                        <td class="text-center">{{ $researchRequest->user->email }}</td>
                        <td class="text-center">{{ $researchRequest->teacher_name }}</td>
                        <td class="text-center">{{ $researchRequest->educationLevel->name_ar }}</td>
                        <td class="text-center">{{ $researchRequest->notes }}</td>
                        <td class="text-center">
                            <a class="btn btn-success">ارسال رد</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-rtl.base-layout>
