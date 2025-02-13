<x-admin.base-layout>
    <x-slot:pageTitle>تعزيز المهارات</x-slot>

    <div class="container mt-4" style="margin-right: 0px; margin-bottom: 100px">
        <h4 class="mb-4 text-center" style="margin-top: 50px">💡 تعزيز المهارات - اختر الألعاب التي ترغب في دعمها</h4>

        <form action="/dashboard/updateSupportedGames" method="POST">
            @csrf

            @foreach ([
                'أحرف' => 'letterScenes',
                'كلمات' => 'wordScenes',
                'أرقام' => 'numberScenes',
                'مفاهيم الرياضية' => 'mathScenes',
                'ألوان' => 'colorScenes',
                'الفصول الأربعة' => 'fourSeasonsScenes',
                'مختلطة' => 'complexScenes',
                'فواكه' => 'fruitScenes',
                'حيوانات' => 'animalScenes',
                'خضار' => 'vegetableScenes'
            ] as $categoryName => $variable)

                @if (!empty($$variable))
                    <div class="card mb-3 shadow-sm" style="width: 50%; margin-right: 295px">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0" style="color: white">{{ $categoryName }}</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($$variable as $scene)
                                <div class="form-check">
                                    <input type="hidden" name="scenes[{{ $scene->id }}]" value="0">
                                    <input class="form-check-input" type="checkbox" name="scenes[{{ $scene->id }}]"
                                           value="1" {{ in_array($scene->id, $supportedScenes) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $scene->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            @endforeach

            <div style="margin-right: 295px">
                <button type="submit" class="btn btn-success mt-3 px-5">✅ حفظ</button>
            </div>
        </form>
    </div>
</x-admin.base-layout>
