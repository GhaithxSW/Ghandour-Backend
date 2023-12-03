<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <style>
            @media screen and (max-width: 990px) {
                .font-bg {
                    font-size: 26px;
                }
            }

            @media screen and (max-width: 600px) {
                .font-bg {
                    font-size: 18px;
                }

                .font-bg-btn {
                    font-size: 15px;
                }
            }

            @media screen and (max-width: 300px) {
                .font-bg {
                    font-size: 16px;
                }

                .font-bg-btn {
                    font-size: 14px;
                }
            }
        </style>

    </x-slot>

    <div class="container">

        @if (session('success'))
            <div class="alert alert-success text-center" style="font-size: 20px; margin-top: 75px">
                {{-- {{ session('success') }} --}}
                {{ __('trans.msg_request_success') }}
            </div>
        @endif

        <h2 class="text-center" style="margin-bottom: 50px; margin-top: 50px">
            <b>{{ __('trans.request_research_now') }}</b>
        </h2>
        <form method="POST" action="/add-request-research" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="phone" class="form-label">{{ __('trans.phone') }}</label>
                <input type="text" name="phone" class="form-control"
                    placeholder="{{ __('trans.phone_placeholder') }}">
                @error('phone')
                    <p class="mt-2 text-red-600" style="color: red">{{ __('trans.phone_required') }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="education_level" class="form-label">{{ __('trans.education_level') }}</label>
                <select name="education_level" class="form-select">
                    <option selected disabled>{{ __('trans.choose') }}</option>
                    @foreach ($educationLevels as $educationLevel)
                        <option value="{{ $educationLevel->id }}">{{ $educationLevel->name_ar }}</option>
                    @endforeach
                </select>
                @error('education_level')
                    <p class="mt-2 text-red-600" style="color: red">{{ __('trans.education_level_required') }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="research_topic" class="form-label">{{ __('trans.research_topic') }}</label>
                <input type="text" class="form-control" name="research_topic"
                    placeholder="{{ __('trans.research_topic_placeholder') }}">
                @error('research_topic')
                    <p class="mt-2 text-red-600" style="color: red">{{ __('trans.research_topic_required') }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="teacher_name" class="form-label">{{ __('trans.teacher_name') }}</label>
                <input type="text" class="form-control" name="teacher_name"
                    placeholder="{{ __('trans.teacher_name_placeholder') }}">
                @error('teacher_name')
                    <p class="mt-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-12">
                <label for="notes" class="form-label">{{ __('trans.notes') }}</label>
                <textarea class="form-control" name="notes" placeholder="{{ __('trans.notes_placeholder') }}"></textarea>
                @error('notes')
                    <p class="mt-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-12">
                <a href="/" class="btn btn-primary m-1">{{ __('trans.back') }}</a>
                <button type="submit" class="btn btn-success m-1">{{ __('trans.submit') }}</button>
            </div>
        </form>
    </div>

    <x-slot:footerFiles></x-slot>

</x-rtl.base-layout>
