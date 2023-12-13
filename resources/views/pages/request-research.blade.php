<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        @vite(['resources/scss/light/assets/components/modal.scss'])
        @vite(['resources/scss/dark/assets/components/modal.scss'])
        @vite(['resources/scss/light/assets/elements/alert.scss'])
        @vite(['resources/scss/dark/assets/elements/alert.scss'])

        <style>
            .form-width-responsive {
                margin-left: 175px;
                margin-right: 175px;
            }

            @media screen and (max-width: 990px) {
                .font-bg {
                    font-size: 26px;
                }

                .form-width-responsive {
                    margin-left: 5px;
                    margin-right: 5px;
                }
            }

            @media screen and (max-width: 600px) {
                .font-bg {
                    font-size: 18px;
                }

                .font-bg-btn {
                    font-size: 15px;
                }

                .form-width-responsive {
                    margin-left: 5px;
                    margin-right: 5px;
                }
            }

            @media screen and (max-width: 300px) {
                .font-bg {
                    font-size: 16px;
                }

                .font-bg-btn {
                    font-size: 14px;
                }

                .form-width-responsive {
                    margin-left: 0;
                    margin-right: 0;
                }
            }
        </style>

    </x-slot>

    <div class="container" style="padding: 5%">

        {{-- @if (session('success'))
            <div class="alert alert-gradient alert-dismissible fade show mb-4 text-center" role="alert"
                style="font-size: 20px">
                {{ __('trans.msg_request_success') }}
            </div>
        @endif --}}

        @if (session('success'))
            <div class="alert alert-success text-center form-width-responsive"
                style="font-size: 20px; margin-bottom: 50px">
                {{ __('trans.msg_request_success') }}
            </div>
        @endif

        <h2 class="text-center mt-3 mb-5">
            <b>{{ __('trans.request_research_now') }}</b>
        </h2>

        <form method="POST" action="/add-request-research" class="row g-3 card form-width-responsive"
            style="padding: 20px; box-shadow: 0 1px 4px 3px rgba(0, 0, 0, 0.1);">
            @csrf
            <div class="col">
                <label for="phone" class="form-label">{{ __('trans.phone') }}</label>
                <input type="text" name="phone" class="form-control"
                    placeholder="{{ __('trans.phone_placeholder') }}">
                @error('phone')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <label for="education_level" class="form-label">{{ __('trans.education_level') }}</label>
                <select name="education_level" class="form-select">
                    <option selected disabled>{{ __('trans.choose') }}</option>
                    @foreach ($educationLevels as $educationLevel)
                        <option value="{{ $educationLevel->id }}">{{ $educationLevel->name_en }}</option>
                    @endforeach
                </select>
                @error('education_level')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <label for="research_topic" class="form-label">{{ __('trans.research_topic') }}</label>
                <input type="text" class="form-control" name="research_topic"
                    placeholder="{{ __('trans.research_topic_placeholder') }}">
                @error('research_topic')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <label for="teacher_name" class="form-label">{{ __('trans.teacher_name') }}</label>
                <input type="text" class="form-control" name="teacher_name"
                    placeholder="{{ __('trans.teacher_name_placeholder') }}">
                @error('teacher_name')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <label for="notes" class="form-label">{{ __('trans.notes') }}</label>
                <textarea class="form-control" name="notes" placeholder="{{ __('trans.notes_placeholder') }}"></textarea>
                @error('notes')
                    <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <a href="/" class="btn btn-primary m-1">{{ __('trans.back') }}</a>
                <button type="submit" class="btn btn-success m-1">{{ __('trans.submit') }}</button>
            </div>
        </form>
    </div>

    <x-slot:footerFiles></x-slot>

</x-base-layout>
