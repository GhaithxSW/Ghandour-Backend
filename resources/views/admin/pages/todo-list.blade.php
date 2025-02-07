<x-admin.base-layout :scrollspy="false">
    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
    </x-slot>

    <div id="content" class="main-content" style="margin-right: 265px">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">
                <div class="row layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card p-4">
                            <h5 class="mb-3">تعزيز المهارات</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($scenes as $scene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $scene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox" name="scenes[{{ $scene->id }}]"
                                               value="1" id="item{{ $scene->id }}"
                                            {{ $scene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $scene->id }}">
                                            {{ $scene->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-3">تعزيز</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-slot:footerFiles>
            <script src="{{ asset('plugins-rtl/editors/quill/quill.js') }}"></script>
        </x-slot>
</x-admin.base-layout>
