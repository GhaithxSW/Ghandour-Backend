<x-admin.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

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

        <div class="mt-4 mb-4">
            <a href="/dashboard/user/add" class="btn btn-secondary">اضافة مستخدم جديد</a>
        </div>

        <div class="table-responsive bg-white">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">رقم المستخدم</th>
                    <th class="text-center">اسم المستخدم</th>
                    <th class="text-center">البريد الالكتروني</th>
                    <th class="text-center">اسم الطفل</th>
                    <th class="text-center">عمر الطفل</th>
                    <th class="text-center">خيارات</th>
                </tr>
                </thead>
                <tbody>
                @if (count($users))
                    @foreach ($users as $user)
                        <tr style="pointer-events: none">
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->child_name }}</td>
                            <td class="text-center">{{ $user->child_age }}</td>
                            <td class="text-center">
                                <a href="/dashboard/user/{{ $user->id }}/details"
                                   class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                <a href="/dashboard/user/{{ $user->id }}/edit"
                                   class="btn btn-success" style="pointer-events: fill">تعديل</a>
                                <form method="POST" action="{{ route('delete-user', ['userId' => $user->id]) }}"
                                      class="btn btn-danger" style="pointer-events: fill">
                                    @method('DELETE')
                                    @csrf
                                    <x-dropdown-link :href="route('delete-user', ['userId' => $user->id])"
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
            @if (!count($users))
                <div class="m-3" style="pointer-events: none">
                    <div class="text-center">
                        <h5>لا يوجد مستخدمين</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-slot:footerFiles>
        <script src="{{ asset('plugins-rtl/table/datatable/datatables.js') }}"></script>
    </x-slot>

</x-admin.base-layout>
