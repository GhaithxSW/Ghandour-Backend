<x-admin.base-layout :scrollspy="false">
    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
    </x-slot>

    <div id="content" class="main-content" style="margin-right: 265px">
        <div class="layout-px-spacing">
            <div class="middle-content container-xxl p-0">

                <h5 class="mb-3">تعزيز المهارات</h5>

                {{--Letter Scenes--}}
                <div class="row layout-top-spacing">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card p-4">
                            <h5 class="mb-3">الأحرف</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($letterScenes as $letterScene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $letterScene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox"
                                               name="scenes[{{ $letterScene->id }}]"
                                               value="1" id="item{{ $letterScene->id }}"
                                            {{ $letterScene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $letterScene->id }}">
                                            {{ $letterScene->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-3">تعزيز</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{--Number Scenes--}}
                <div class="row layout-top-spacing">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card p-4">
                            <h5 class="mb-3">الأرقام</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($numberScenes as $numberScene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $numberScene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox"
                                               name="scenes[{{ $numberScene->id }}]"
                                               value="1" id="item{{ $numberScene->id }}"
                                            {{ $numberScene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $numberScene->id }}">
                                            {{ $numberScene->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-3">تعزيز</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{--Math Scenes--}}
                <div class="row layout-top-spacing">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card p-4">
                            <h5 class="mb-3">المفاهيم الرياضية</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($mathScenes as $mathScene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $mathScene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox"
                                               name="scenes[{{ $mathScene->id }}]"
                                               value="1" id="item{{ $mathScene->id }}"
                                            {{ $mathScene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $mathScene->id }}">
                                            {{ $mathScene->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-3">تعزيز</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{--Color Scenes--}}
                <div class="row layout-top-spacing">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card p-4">
                            <h5 class="mb-3">الألوان</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($colorScenes as $colorScene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $colorScene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox"
                                               name="scenes[{{ $colorScene->id }}]"
                                               value="1" id="item{{ $colorScene->id }}"
                                            {{ $colorScene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $colorScene->id }}">
                                            {{ $colorScene->name }}
                                        </label>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary mt-3">تعزيز</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{--Four Seasons Scenes--}}
                <div class="row layout-top-spacing">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card p-4">
                            <h5 class="mb-3">الفصول الأربعة</h5>
                            <form action="/dashboard/addScenesToSupported" method="POST">
                                @csrf

                                @foreach ($fourSeasonsScenes as $fourSeasonsScene)
                                    <div class="form-check">
                                        <input type="hidden" name="scenes[{{ $fourSeasonsScene->id }}]" value="0">
                                        <input class="form-check-input" type="checkbox"
                                               name="scenes[{{ $fourSeasonsScene->id }}]"
                                               value="1" id="item{{ $fourSeasonsScene->id }}"
                                            {{ $fourSeasonsScene->supported ? 'checked' : '' }}>
                                        <label class="form-check-label" for="item{{ $fourSeasonsScene->id }}">
                                            {{ $fourSeasonsScene->name }}
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
