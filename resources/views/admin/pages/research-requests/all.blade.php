<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.css'])
        @vite(['resources/rtl/scss/light/plugins/table/datatable/dt-global_style.scss'])

        <style>
            .dashboard {
                margin-right: 255px;
                margin-left: 15px;
                margin-top: 30px;
                margin-bottom: 30px;
            }
        </style>

    </x-slot>

    <div class="dashboard">

        {{-- <div class="mt-4 mb-4">
            <a href="#" class="btn btn-secondary">اضافة طلب بحث جديد</a>
        </div> --}}

        <div class="table-responsive bg-white">
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
                    {{-- @if (count(requests)) --}}
                    @foreach ($requests as $request)
                        <tr style="pointer-events: none">
                            <td class="text-center">{{ $request->id }}</td>
                            <td class="text-center">{{ $request->user->name }}</td>
                            <td class="text-center">{{ $request->phone }}</td>
                            <td class="text-center">{{ $request->user->email }}</td>
                            <td class="text-center">{{ $request->teacher_name }}</td>
                            <td class="text-center">{{ $request->educationLevel->name_ar }}</td>
                            <td class="text-center">{{ $request->notes }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                <form method="POST" action="{{ route('logout') }}" class="btn btn-success"
                                    style="pointer-events: fill">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        style="color: white">
                                        قبول
                                    </x-dropdown-link>
                                </form>
                                <form method="POST" action="{{ route('logout') }}" class="btn btn-danger"
                                    style="pointer-events: fill">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        style="color: white">
                                        رفض
                                    </x-dropdown-link>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    {{-- @else
                        <div class="mb-4 text-center">
                            <h4>لا يوجد طلبات</h4>
                        </div>
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
