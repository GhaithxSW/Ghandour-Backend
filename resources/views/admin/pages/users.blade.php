<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])
    </x-slot>

    <div class="table-responsive m-4 bg-white">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">اسم المستخدم</th>
                    <th class="text-center">رقم الهاتف</th>
                    <th class="text-center">البريد الالكتروني</th>
                    <th class="text-center">خيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->requestedResearch->phone }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">
                            <a class="btn btn-success">حذف</a>
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
