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
                margin-top: 50px;
                margin-bottom: 30px;
            }
        </style>

    </x-slot>

    <div class="dashboard">

        @if (session('success'))
            <div class="alert alert-success text-center" style="font-size: 20px; margin-bottom: 50px; margin-top: 50px">
                {{ session('success') }}
            </div>
        @endif

        {{-- <div class="mt-4 mb-4">
            <a href="/admin-panel-management/order/add" class="btn btn-secondary">اضافة بحث جديد</a>
        </div> --}}

        <div class="table-responsive bg-white">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">رقم الطلب</th>
                        <th class="text-center">اسم الطالب/ة</th>
                        <th class="text-center">عنوان البحث</th>
                        <th class="text-center">اسم المعلم/ة</th>
                        <th class="text-center">المستوى الدراسي</th>
                        <th class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($orders))
                        @foreach ($orders as $order)
                            <tr style="pointer-events: none">
                                <td class="text-center">{{ $order->id }}</td>
                                <td class="text-center">{{ $order->user->first_name }} {{ $order->user->last_name }}
                                <td class="text-center">{{ $order->research_topic }}</td>
                                <td class="text-center">{{ $order->teacher_name }}</td>
                                </td>
                                <td class="text-center">{{ $order->education_level }}</td>
                                <td class="text-center">
                                    <a href="/admin-panel-management/order/{{ $order->id }}/details"
                                        class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                    {{-- <a href="/admin-panel-management/order/{{ $order->id }}/edit" class="btn btn-success"
                                    style="pointer-events: fill">تعديل</a> --}}
                                    <form method="POST" action="{{ route('delete-order', ['id' => $order->id]) }}"
                                        class="btn btn-danger" style="pointer-events: fill">
                                        @method('DELETE')
                                        @csrf
                                        <x-dropdown-link :href="route('delete-order', ['id' => $order->id])"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                            style="color: white">
                                            حذف
                                        </x-dropdown-link>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            @if (!count($orders))
                <div class="m-3" style="pointer-events: none">
                    <div class="text-center">
                        <h5>لا يوجد طلبات</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-slot:footerFiles>
        {{-- @vite(['public/plugins-rtl/table/datatable/datatables.js']) --}}
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
