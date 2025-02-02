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
                            {{--                            <form action="{{ route('your.route.name') }}" method="POST">--}}
                            <form action="/" method="POST">
                                @csrf
                                {{--                                @foreach ($items as $item)--}}
                                @for ($i = 0; $i < 10; $i++)
                                    <div class="form-check">
                                        {{--                                        <input class="form-check-input" type="checkbox" name="selected_items[]"--}}
                                        {{--                                               value="{{ $item->id }}" id="item{{ $item->id }}">--}}
                                        {{--                                        <label class="form-check-label" for="item{{ $item->id }}">--}}
                                        {{--                                            {{ $item->name }}--}}
                                        {{--                                        </label>--}}
                                        <input class="form-check-input" type="checkbox" name="selected_items[]"
                                               value="" id="item">
                                        <label class="form-check-label" for="item">
                                            test
                                        </label>
                                    </div>
                                @endfor
                                {{--                                @endforeach--}}
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
