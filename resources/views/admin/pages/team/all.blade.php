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

        <div class="mt-4 mb-4">
            <a href="/admin-panel-management/member/add" class="btn btn-secondary">اضافة موظف جديد</a>
        </div>

        <div class="table-responsive bg-white">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">رقم الموظف</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center">صورة الموظف</th>
                        <th class="text-center">المسمى الوظيفي</th>
                        <th class="text-center">لمحة عن الموظف</th>
                        <th class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($members))
                        @foreach ($members as $member)
                            <tr style="pointer-events: none">
                                <td class="text-center">{{ $member->id }}</td>
                                <td class="text-center">{{ $member->name }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="avatar me-3">
                                            <img src="{{ $research->image ? asset('storage/images/' . $research->image) : asset('resources/new-logo-buhothy.png') }}"
                                                alt="Avatar" width="64" height="64"
                                                style="border-radius: 20px">
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $member->position }}</td>
                                <td class="text-center">{!! substr($member->about, 0, 15) !!}...</td>
                                <td class="text-center">
                                    <a href="/admin-panel-management/member/{{ $member->id }}/details"
                                        class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                    <a href="/admin-panel-management/member/{{ $member->id }}/edit"
                                        class="btn btn-success" style="pointer-events: fill">تعديل</a>
                                    <form method="POST" action="{{ route('delete-member', ['id' => $member->id]) }}"
                                        class="btn btn-danger" style="pointer-events: fill">
                                        @method('DELETE')
                                        @csrf
                                        <x-dropdown-link :href="route('delete-member', ['id' => $member->id])"
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
            @if (!count($members))
                <div class="m-3" style="pointer-events: none">
                    <div class="text-center">
                        <h5>لا يوجد موظفين</h5>
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
