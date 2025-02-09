<x-admin.base-layout>
    <x-slot:pageTitle>تعزيز المهارات</x-slot>
    <div class="container mt-4">
        <h4>تعزيز المهارات - اختر الألعاب التي ترغب في دعمها</h4>
        <form action="/dashboard/updateSupportedGames" method="POST">
            @csrf
            @foreach ($scenes as $scene)
                <div class="form-check">
                    <input type="hidden" name="scenes[{{ $scene->id }}]" value="0">
                    <input class="form-check-input" type="checkbox" name="scenes[{{ $scene->id }}]" value="1" {{ in_array($scene->id, $supportedScenes) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $scene->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">حفظ</button>
        </form>
    </div>
</x-admin.base-layout>
