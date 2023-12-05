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

        @if (session('success'))
            <div class="alert alert-success text-center" style="font-size: 20px; margin-bottom: 50px; margin-top: 50px">
                تم حذف المستخدم بنجاح
            </div>
        @endif

        <div class="mt-4 mb-4">
            <a href="/admin-panel-management/user/add" class="btn btn-secondary">اضافة مستخدم جديد</a>
        </div>

        <div class="table-responsive bg-white">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم المستخدم</th>
                        <th class="text-center">البريد الالكتروني</th>
                        <th class="text-center">كلمة المرور</th>
                        <th class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr style="pointer-events: none">
                            <td class="text-center">{{ $user->id }}</td>
                            <td class="text-center">{{ $user->name }}</td>
                            <td class="text-center">{{ $user->email }}</td>
                            <td class="text-center">{{ $user->password }}</td>
                            <td class="text-center">
                                <a href="/admin-panel-management/user/{{ $user->id }}/details"
                                    class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                <a href="/admin-panel-management/user/{{ $user->id }}/edit" class="btn btn-success"
                                    style="pointer-events: fill">تعديل</a>
                                <form method="POST" action="{{ route('delete-user', ['id' => $user->id]) }}"
                                    class="btn btn-danger" style="pointer-events: fill">
                                    @method('DELETE')
                                    @csrf
                                    <x-dropdown-link :href="route('delete-user', ['id' => $user->id])"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                        style="color: white">
                                        حذف
                                    </x-dropdown-link>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <x-slot:footerFiles>
        @vite(['public/plugins-rtl/table/datatable/datatables.js'])
    </x-slot>

</x-admin.base-layout>
