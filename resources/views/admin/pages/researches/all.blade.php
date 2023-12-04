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
                تم حذف البحث بنجاح
            </div>
        @endif

        <div class="mt-4 mb-4">
            <a href="/admin-panel-management/research/add" class="btn btn-secondary">اضافة بحث جديد</a>
        </div>

        <div class="table-responsive bg-white">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">عنوان البحث</th>
                        <th class="text-center">صورة البحث</th>
                        <th class="text-center">محتوى البحث</th>
                        <th class="text-center">خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($researches as $research)
                        <tr style="pointer-events: none">
                            <td class="text-center">{{ $research->id }}</td>
                            <td class="text-center">{{ $research->title }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-left align-items-center">
                                    <div class="avatar me-3">
                                        <img src="{{ $research->image ? Vite::asset('public/storage/' . $research->image) : Vite::asset('public/no-image.png') }}"
                                            alt="Avatar" width="64" height="64"
                                            style="border-radius: 20px; margin-right: 75px">
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">{{ $research->content }}</td>
                            <td class="text-center">
                                <a href="/admin-panel-management/research/{{ $research->id }}/details" class="btn btn-primary" style="pointer-events: fill">التفاصيل</a>
                                <a href="/admin-panel-management/research/{{ $research->id }}/edit"
                                    class="btn btn-success" style="pointer-events: fill">تعديل</a>
                                <form method="POST" action="{{ route('delete-research', ['id' => $research->id]) }}"
                                    class="btn btn-danger" style="pointer-events: fill">
                                    @method('DELETE')
                                    @csrf
                                    <x-dropdown-link :href="route('delete-research', ['id' => $research->id])"
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
