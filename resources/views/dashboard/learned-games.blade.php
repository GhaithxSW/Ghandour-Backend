<x-admin.base-layout>
    <x-slot:pageTitle>المهارات المتعلمة</x-slot>
    <div class="container mt-4">
        <h4>المهارات المتعلمة - اختر الألعاب التي أتمها الطفل</h4>
        <form action="/dashboard/updateLearnedGames" method="POST">
            @csrf
            @foreach ($scenes as $scene)
                <div class="form-check">
                    <input type="hidden" name="scenes[{{ $scene->id }}]" value="0">
                    <input class="form-check-input" type="checkbox" name="scenes[{{ $scene->id }}]" value="1" {{ in_array($scene->id, $learnedScenes) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $scene->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">حفظ</button>
        </form>
    </div>
</x-admin.base-layout>
