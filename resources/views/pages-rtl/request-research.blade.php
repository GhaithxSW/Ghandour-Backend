<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/alert.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/alert.css') }}">

        <link rel="stylesheet" href="{{ mix('css/light/blog-post.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/blog-post.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/tagify/tagify.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/filepond.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/filepond/FilePondPluginImagePreview.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/switches.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-tagify.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-filepond.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/ecommerce-create.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/leaflet/leaflet.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/contact_us.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/contact_us.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/timeline.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/timeline.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins-rtl/splide/splide.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/light/custom-splide.min.css') }}">
        <link rel="stylesheet" href="{{ mix('rtl/css/dark/custom-splide.min.css') }}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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

        @if (session('success'))
            <div class="modal fade inputForm-modal" id="successModal" tabindex="-1" role="dialog"
                aria-labelledby="inputFormModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="background: green">
                        <div class="modal-header" id="inputFormModalLabel" style="background: green">
                            <h5 class="modal-title" style="color: white">{{ __('trans.msg_request_success') }}</h5>
                            <a href="/" style="color: white"><svg aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18">
                                    </line>
                                    <line x1="6" y1="6" x2="18" y2="18">
                                    </line>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class='form-row row text-center form-width-responsive' id="error-div">
            <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>{{ __('form_validations.stripe_general') }}</div>
            </div>
        </div>

        <form method="POST" action="/add-request-research" role="form"
            class="require-validation row g-3 mt-3 card form-width-responsive" id="requestForm" data-cc-on-file="false"
            data-stripe-publishable-key="{{ config('stripe.stripe_key') }}"
            style="padding: 20px; box-shadow: 0 1px 4px 3px rgba(0, 0, 0, 0.1);">
            @csrf

            <div id="requestDiv">

                <h2 class="text-center mt-3 mb-4">
                    <b>{{ __('trans.request_research_now') }}</b>
                </h2>

                <div class="row mb-2">
                    <div class="col-xs-12 col-md-6 mb-2">
                        <label for="first_name" class="form-label">{{ __('trans.first_name') }}</label>
                        <input type="text" name="first_name" class="form-control" id="first_name"
                            placeholder="{{ __('trans.name_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="first_name-error"></p>
                        @error('first_name')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <label for="last_name" class="form-label">{{ __('trans.last_name') }}</label>
                        <input type="text" name="last_name" class="form-control" id="last_name"
                            placeholder="{{ __('trans.last_name_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="last_name-error"></p>
                        @error('last_name')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-md-4 mb-2">
                        <label for="country" class="form-label">{{ __('trans.country') }}</label>
                        <input type="text" name="country" class="form-control" id="country"
                            placeholder="{{ __('trans.country_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="country-error"></p>
                        @error('country')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2">
                        <label for="phone" class="form-label">{{ __('trans.phone') }}</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                            placeholder="{{ __('trans.phone_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="phone-error"></p>
                        @error('phone')
                            <p class="m-2 text-red-600 phone-validation" style="color: red">
                                {{ __('trans.phone_unique') }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <label for="email" class="form-label">{{ __('trans.email') }}</label>
                        <input type="email" name="email" class="form-control text-right" id="email"
                            placeholder="{{ __('trans.email_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="email-error"></p>
                        @error('email')
                            <p class="m-2 text-red-600 email-validation" style="color: red">
                                {{ __('trans.email_unique') }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-md-4 mb-2" id="educationDiv">
                        <label for="education_level" class="form-label">{{ __('trans.education_level') }}</label>
                        <select name="education_level" class="form-select" id="education_level">
                            <option selected disabled>{{ __('trans.choose') }}</option>
                            @foreach ($educationLevelArabic as $educationLevel)
                                <option value="{{ $educationLevel }}">{{ $educationLevel }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="education_level-error">
                        </p>
                        @error('education_level')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2" id="middle_grade_list">
                        <label for="middle_grade" class="form-label">{{ __('trans.grade') }}</label>
                        <select name="middle_grade" class="form-select">
                            <option selected disabled>{{ __('trans.choose_grade') }}</option>
                            @foreach ($middleSchoolGradesArabic as $middleSchoolGrades)
                                <option value="{{ $middleSchoolGrades }}">{{ $middleSchoolGrades }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="middle_grade-error"></p>
                        @error('middle_grade')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2" id="high_grade_list">
                        <label for="high_grade" class="form-label">{{ __('trans.grade') }}</label>
                        <select name="high_grade" class="form-select">
                            <option selected disabled>{{ __('trans.choose_grade') }}</option>
                            @foreach ($highSchoolGradesArabic as $highSchoolGrades)
                                <option value="{{ $highSchoolGrades }}">{{ $highSchoolGrades }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="high_grade-error"></p>
                        @error('high_grade')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2" id="university_year_list">
                        <label for="university_year" class="form-label">{{ __('trans.year') }}</label>
                        <select name="university_year" class="form-select">
                            <option selected disabled>{{ __('trans.choose_year') }}</option>
                            @foreach ($universityGradesArabic as $universityGrades)
                                <option value="{{ $universityGrades }}">{{ $universityGrades }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="university_year-error">
                        </p>
                        @error('university_year')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2" id="graduate_study_list">
                        <label for="graduate_study" class="form-label">{{ __('trans.graduate_study') }}</label>
                        <select name="graduate_study" class="form-select">
                            <option selected disabled>{{ __('trans.choose_graduate_study') }}</option>
                            @foreach ($graduateStudiesArabic as $graduateStudy)
                                <option value="{{ $graduateStudy }}">{{ $graduateStudy }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="graduate_study-error">
                        </p>
                        @error('graduate_study')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4" id="school">
                        <label for="school" class="form-label">{{ __('trans.school') }}</label>
                        <input type="text" name="school" class="form-control" id="schoolField"
                            placeholder="{{ __('trans.school_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="school-error"></p>
                        @error('school')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4" id="university">
                        <label for="university" class="form-label">{{ __('trans.university') }}</label>
                        <input type="text" name="university" class="form-control" id="universityField"
                            placeholder="{{ __('trans.university_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="university-error"></p>
                        @error('university')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-md-4 mb-2">
                        <label for="teacher_name" class="form-label">{{ __('trans.teacher_name') }}</label>
                        <input type="text" class="form-control" name="teacher_name" id="teacher_name"
                            placeholder="{{ __('trans.teacher_name_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="teacher_name-error"></p>
                        @error('teacher_name')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4 mb-2">
                        <label for="research_topic" class="form-label">{{ __('trans.research_topic') }}</label>
                        <input type="text" class="form-control" name="research_topic" id="research_topic"
                            placeholder="{{ __('trans.research_topic_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="research_topic-error">
                        </p>
                        @error('research_topic')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <label for="research_papers_count"
                            class="form-label">{{ __('trans.research_papers_count') }}</label>
                        <input type="text" class="form-control" name="research_papers_count"
                            id="research_papers_count" maxlength="2"
                            placeholder="{{ __('trans.research_papers_count_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red"
                            id="research_papers_count-error"></p>
                        <p class="text-blue-600 mt-2 price-hint" style="color: blue" id="potential-price"></p>
                        @error('research_papers_count')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-xs-12 col-md-6 mb-2">
                        <label for="research_lang" class="form-label">{{ __('trans.research_lang') }}</label>
                        <select class="form-select" name="research_lang" id="research_lang">
                            <option selected disabled>{{ __('trans.research_lang_placeholder') }}</option>
                            @foreach ($researchLanguageArabic as $languages)
                                <option value="{{ $languages }}">{{ $languages }}</option>
                            @endforeach
                        </select>
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="research_lang-error">
                        </p>
                        @error('research_lang')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <label for="delivery_date" class="form-label">{{ __('trans.delivery_date') }}</label>
                        <input type="date" class="form-control text-right" name="delivery_date"
                            id="delivery_date" placeholder="{{ __('trans.delivery_date_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red" id="delivery_date-error">
                        </p>
                        @error('delivery_date')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-xs-12 col-md-12">
                        <label for="notes" class="form-label">{{ __('trans.notes') }}</label>
                        <textarea class="form-control" name="notes" placeholder="{{ __('trans.notes_placeholder') }}"></textarea>
                        @error('notes')
                            <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <a href="/" class="btn btn-primary m-1">{{ __('trans.back') }}</a>
                        <button class="btn btn-success m-1" id="submitButton">{{ __('trans.submit') }}</button>
                    </div>
                </div>

            </div>

            <div id="paymentDiv" style="display: none;">

                <h2 class="text-center mt-4 mb-5">
                    <b>{{ __('trans.pay') }}</b>
                </h2>

                {{-- <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>{{ __('trans.card_name') }}</label>
                        <input class='form-control' size='4' type='text'>
                    </div>
                </div> --}}

                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>{{ __('trans.card_number') }}</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                        <p class="text-red-600 mt-2 stripe-validation" style="color: red" id="card-number-error"></p>
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>{{ __('trans.cvc') }}</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                            type='text' maxlength="3">
                        <p class="text-red-600 mt-2 stripe-validation" style="color: red" id="card-cvc-error"></p>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_month') }}</label>
                        {{-- <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'
                            maxlength="2"> --}}
                        <select class='form-select card-expiry-month'>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <p class="text-red-600 mt-2 stripe-validation" style="color: red"
                            id="card-expiry-month-error"></p>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_year') }}</label>
                        {{-- <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                            type='text' maxlength="4"> --}}
                        @php
                            $currentYear = date('Y');
                        @endphp
                        <select class='form-select card-expiry-year'>
                            @for ($i = $currentYear; $i <= $currentYear + 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        <p class="text-red-600 mt-2 stripe-validation" style="color: red"
                            id="card-expiry-year-error"></p>
                    </div>
                </div>

                {{-- <div class="form-row row">
                    <div class="col-xs-12 form-group required">
                        <label class="control-label">{{ __('trans.payment_amount') }}</label>
                        <select class="form-select" name="payment-amount">
                            <option value="3">3</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                </div> --}}

                <div class="form-row row">
                    <div class="col-xs-12 form-group required">
                        <label class="control-label">{{ __('trans.payment_amount') }}: <span
                                id="payment-amount-value">
                            </span></label>
                        <input type="text" name="payment-amount" id="payment-amount" class="form-control"
                            value="" style="display: none">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-xs-12">
                        <button class="btn btn-secondary btn-lg btn-block" id="pay-button"
                            type="submit">{{ __('trans.pay_now') }}</button>
                        <button class="btn btn-danger btn-lg btn-block"
                            id="backToForm">{{ __('trans.back') }}</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <x-slot:footerFiles>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            $(function() {

                /*------------------------------------------
                --------------------------------------------
                Stripe Payment Code
                --------------------------------------------
                --------------------------------------------*/
                $('#error-div').hide();
                let $form = $(".require-validation");
                let $payButton = $("#pay-button");
                let $backButton = $("#backToForm");

                $('form.require-validation').bind('submit', function(e) {
                    let $form = $(".require-validation"),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'
                        ].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
                    $errorMessage.addClass('hide');

                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        let $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();

                            $('#error-div').show();
                        }
                    });

                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }

                });

                /*------------------------------------------
                --------------------------------------------
                Stripe Response Handler
                --------------------------------------------
                --------------------------------------------*/
                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        /* token contains id, last4, and card type */
                        let token = response['id'];

                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                        $payButton.prop('disabled', true);
                        $backButton.prop('disabled', true);

                        $form.get(0).submit();
                    }
                }

            });
        </script>

        <script>
            $(document).ready(function() {
                let educationLevelSelect = $('#education_level');
                let middleGradeList = $('#middle_grade_list');
                let highGradeList = $('#high_grade_list');
                let universityYearList = $('#university_year_list');
                let graduateStudyList = $('#graduate_study_list');
                let school = $('#school');
                let university = $('#university');

                let educationDiv = $('#educationDiv');

                educationDiv.removeClass('col-xs-12 col-md-4').addClass('col-xs-12 col-md-12');

                middleGradeList.hide();
                highGradeList.hide();
                universityYearList.hide();
                graduateStudyList.hide();
                school.hide();
                university.hide();

                function selectEducationLevel() {
                    let selectedOption = educationLevelSelect.val();

                    if (selectedOption === 'المرحلة المتوسطة' || selectedOption === 'Middle School') {
                        educationDiv.removeClass('col-xs-12 col-md-12').addClass('col-xs-12 col-md-4');
                        middleGradeList.show();
                        highGradeList.hide();
                        universityYearList.hide();
                        graduateStudyList.hide();
                        school.show();
                        university.hide();
                    } else if (selectedOption === 'المرحلة الثانوية' || selectedOption === 'High School') {
                        educationDiv.removeClass('col-xs-12 col-md-12').addClass('col-xs-12 col-md-4');
                        middleGradeList.hide();
                        highGradeList.show();
                        universityYearList.hide();
                        graduateStudyList.hide();
                        school.show();
                        university.hide();
                    } else if (selectedOption === 'المرحلة الجامعية' || selectedOption === 'University') {
                        educationDiv.removeClass('col-xs-12 col-md-12').addClass('col-xs-12 col-md-4');
                        middleGradeList.hide();
                        highGradeList.hide();
                        universityYearList.show();
                        graduateStudyList.hide();
                        school.hide();
                        university.show();
                    } else if (selectedOption === 'الدراسات العليا' || selectedOption === 'Graduate Studies') {
                        educationDiv.removeClass('col-xs-12 col-md-12').addClass('col-xs-12 col-md-4');
                        middleGradeList.hide();
                        highGradeList.hide();
                        universityYearList.hide();
                        graduateStudyList.show();
                        school.hide();
                        university.show();
                    } else {
                        middleGradeList.hide();
                        highGradeList.hide();
                        universityYearList.hide();
                        graduateStudyList.hide();
                        school.hide();
                        university.hide();
                    }
                }

                educationLevelSelect.change(selectEducationLevel);

                selectEducationLevel();

                let submitButton = $("#submitButton");
                let backToForm = $("#backToForm");

                let errorDiv = $("#error-div");
                let successDiv = $("#success-div");

                submitButton.on("click", function(event) {
                    event.preventDefault();

                    requestDiv.style.display = "none";
                    paymentDiv.style.display = "block";

                    errorDiv.hide();
                    successDiv.hide();
                });

                backToForm.on("click", function(event) {
                    event.preventDefault();

                    requestDiv.style.display = "block";
                    paymentDiv.style.display = "none";

                    errorDiv.hide();
                    successDiv.hide();
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#submitButton').prop('disabled', true);

                function updateSubmitButtonState() {
                    let formFilled = true;
                    let allValidationsPassed = true;

                    $('#requestDiv input:visible, #requestDiv select:visible, #requestDiv textarea:visible').each(
                        function() {
                            if ($(this).val()?.trim() === '') {
                                formFilled = false;
                                return false;
                            }
                        });

                    $('.error-validation').each(function() {
                        if ($(this).text()?.trim() !== '') {
                            allValidationsPassed = false;
                            return false;
                        }
                    });

                    $('#submitButton').prop('disabled', !(formFilled && allValidationsPassed));
                }

                $('#requestDiv input:visible, #requestDiv select:visible, #requestDiv textarea:visible').on(
                    'input change', updateSubmitButtonState);
            });
        </script>

        <script>
            $(document).ready(function() {
                $('input[type="text"]').val('');
                $('input[type="number"]').val('');
                $('input[type="email"]').val('');
                $('input[type="password"]').val('');
                $('textarea').val('');
                // $('select').val('');

                $('#first_name').on('input', function() {
                    let firstNameValue = $(this).val();
                    let firstNameRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (firstNameValue.trim() === '') {
                        $('#first_name-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!firstNameRegex.test(firstNameValue)) {
                        $('#first_name-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#first_name-error').text('');
                    }
                });

                $('#last_name').on('input', function() {
                    let lastNameValue = $(this).val();
                    let lastNameRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (lastNameValue.trim() === '') {
                        $('#last_name-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!lastNameRegex.test(lastNameValue)) {
                        $('#last_name-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#last_name-error').text('');
                    }
                });

                $('#phone').on('input', function() {
                    let phoneValue = $(this).val();
                    let phoneRegex = /^[0-9]+$/;

                    $('.phone-validation').hide();

                    if (phoneValue.trim() === '') {
                        $('#phone-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!phoneRegex.test(phoneValue)) {
                        $('#phone-error').text(
                            "{{ __('form_validations.numeric_validation') }}");
                    } else if (phoneRegex.test(phoneValue) && phoneValue.length !== 10) {
                        $('#phone-error').text("{{ __('form_validations.phone_validation') }}");
                    } else {
                        $('#phone-error').text('');
                    }
                });

                $('#email').on('input', function() {
                    let emailValue = $(this).val();
                    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    $('.email-validation').hide();

                    if (emailValue.trim() === '') {
                        $('#email-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!emailRegex.test(emailValue)) {
                        $('#email-error').text("{{ __('form_validations.email_validation') }}");
                    } else {
                        $('#email-error').text('');
                    }
                });

                $('#country').on('input', function() {
                    let countryValue = $(this).val();
                    let countryRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (countryValue.trim() === '') {
                        $('#country-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!countryRegex.test(countryValue)) {
                        $('#country-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#country-error').text('');
                    }
                });

                $('#teacher_name').on('input', function() {
                    let teacherNameValue = $(this).val();
                    let teacherNameRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (teacherNameValue.trim() === '') {
                        $('#teacher_name-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!teacherNameRegex.test(teacherNameValue)) {
                        $('#teacher_name-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#teacher_name-error').text('');
                    }
                });

                $('#schoolField').on('input', function() {
                    let schoolValue = $(this).val();

                    if (schoolValue.trim() === '') {
                        $('#school-error').text("{{ __('form_validations.field_empty') }}");
                    } else {
                        $('#school-error').text('');
                    }
                });

                $('#universityField').on('input', function() {
                    let universityValue = $(this).val();

                    if (universityValue.trim() === '') {
                        $('#university-error').text("{{ __('form_validations.field_empty') }}");
                    } else {
                        $('#university-error').text('');
                    }
                });

                $('#research_topic').on('input', function() {
                    let researchTopicValue = $(this).val();
                    let researchTopicRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (researchTopicValue.trim() === '') {
                        $('#research_topic-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!researchTopicRegex.test(researchTopicValue)) {
                        $('#research_topic-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#research_topic-error').text('');
                    }
                });

                $('#research_lang').on('input', function() {
                    let researchLangValue = $(this).val();
                    let researchLangRegex = /^[A-Za-z\u0600-\u06FF\s]+$/;

                    if (researchLangValue.trim() === '') {
                        $('#research_lang-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!researchLangRegex.test(researchLangValue)) {
                        $('#research_lang-error').text("{{ __('form_validations.string_validation') }}");
                    } else {
                        $('#research_lang-error').text('');
                    }
                });

                let priceAmount = 0;

                $('#research_papers_count').on('input', function() {
                    let countValue = $(this).val();
                    let countRegex = /^[0-9]+$/;

                    if (countValue.trim() === '') {
                        priceAmount = 0;
                        $('#potential-price').text('');
                        $('#research_papers_count-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!countRegex.test(countValue)) {
                        priceAmount = 0;
                        $('#potential-price').text('');
                        $('#research_papers_count-error').text(
                            "{{ __('form_validations.numeric_validation') }}");
                        // } else if (parseInt(countValue, 10) > 10) {
                        //     $('#research_papers_count-error').text("{{ __('form_validations.papers_ten') }}");
                    } else if ($('#education_level').val() === 'المرحلة المتوسطة') {
                        if (parseInt(countValue, 10) === 0) {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.papers_zero') }}");
                        } else if (parseInt(countValue, 10) > 0 && parseInt(countValue, 10) <= 5) {
                            priceAmount = 5;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 5 && parseInt(countValue, 10) <= 10) {
                            priceAmount = 10;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.pages_count_validation') }}");
                        }
                    } else if ($('#education_level').val() === 'المرحلة الثانوية') {
                        if (parseInt(countValue, 10) === 0) {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.papers_zero') }}");
                        } else if (parseInt(countValue, 10) > 0 && parseInt(countValue, 10) <= 5) {
                            priceAmount = 5;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 5 && parseInt(countValue, 10) <= 10) {
                            priceAmount = 10;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 10 && parseInt(countValue, 10) <= 20) {
                            priceAmount = 20;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.pages_count_validation') }}");
                        }
                    } else if ($('#education_level').val() === 'المرحلة الجامعية') {
                        if (parseInt(countValue, 10) === 0) {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.papers_zero') }}");
                        } else if (parseInt(countValue, 10) > 0 && parseInt(countValue, 10) <= 20) {
                            priceAmount = 20;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 20 && parseInt(countValue, 10) <= 30) {
                            priceAmount = 30;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 30 && parseInt(countValue, 10) <= 50) {
                            priceAmount = 50;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.pages_count_validation') }}");
                        }
                    } else if ($('#education_level').val() === 'الدراسات العليا') {
                        if (parseInt(countValue, 10) === 0) {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.papers_zero') }}");
                        } else if (parseInt(countValue, 10) > 0 && parseInt(countValue, 10) <= 50) {
                            priceAmount = 100;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else if (parseInt(countValue, 10) > 50 && parseInt(countValue, 10) <= 100) {
                            priceAmount = 150;
                            $('#research_papers_count-error').text('');
                            $('#potential-price').text("{{ __('trans.price_amount_hint') }}" + ' ' +
                                priceAmount + ' ' + "{{ __('trans.sar') }}");
                        } else {
                            priceAmount = 0;
                            $('#potential-price').text('');
                            $('#research_papers_count-error').text(
                                "{{ __('form_validations.pages_count_validation') }}");
                        }
                    } else {
                        priceAmount = 0;
                        $('#potential-price').text('');
                        $('#research_papers_count-error').text('');
                    }
                });

                $('#education_level').on('change', function() {
                    $('#research_papers_count').val('');
                });

                $('#submitButton').on('click', function() {
                    $('#payment-amount-value').text(priceAmount);
                    $('#payment-amount').val(priceAmount);
                });

                $('#delivery_date').on('input', function() {
                    let dateValue = $(this).val();
                    let dateRegex = /^\d{4}-\d{2}-\d{2}$/;

                    if (dateValue.trim() === '') {
                        $('#delivery_date-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!dateRegex.test(dateValue)) {
                        $('#delivery_date-error').text("{{ __('form_validations.date_validation') }}");
                    } else {
                        let inputDate = new Date(dateValue);
                        let currentDate = new Date();

                        if (isNaN(inputDate) || inputDate < currentDate) {
                            $('#delivery_date-error').text("{{ __('form_validations.future_date') }}");
                        } else {
                            $('#delivery_date-error').text('');
                        }
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#pay-button').prop('disabled', true);

                function updatePayButtonState() {
                    let formFilled = true;
                    let allValidationsPassed = true;

                    $('#paymentDiv input, #paymentDiv select').each(
                        function() {
                            if ($(this).val()?.trim() === '') {
                                formFilled = false;
                                return false;
                            }
                        });

                    $('.stripe-validation').each(function() {
                        if ($(this).text()?.trim() !== '') {
                            allValidationsPassed = false;
                            return false;
                        }
                    });

                    $('#pay-button').prop('disabled', !(formFilled && allValidationsPassed));
                }

                $('#paymentDiv input, #paymentDiv select').on(
                    'input change', updatePayButtonState);
            });
        </script>

        <script>
            $(document).ready(function() {
                $('.card-number').on('input', function() {
                    let cardNumberValue = $(this).val();
                    let cardNumberRegex = /^[0-9]+$/;

                    if (cardNumberValue.trim() === '') {
                        $('#card-number-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!cardNumberRegex.test(cardNumberValue)) {
                        $('#card-number-error').text("{{ __('form_validations.numeric_validation') }}");
                    } else if (cardNumberRegex.test(cardNumberValue) && cardNumberValue.length > 16) {
                        $('#card-number-error').text("{{ __('form_validations.invalid_card_number') }}");
                    } else {
                        $('#card-number-error').text('');
                    }
                });

                $('.card-cvc').on('input', function() {
                    let cardCVCValue = $(this).val();
                    let cardCVCRegex = /^[0-9]+$/;

                    if (cardCVCValue.trim() === '') {
                        $('#card-cvc-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!cardCVCRegex.test(cardCVCValue)) {
                        $('#card-cvc-error').text("{{ __('form_validations.numeric_validation') }}");
                    } else if (cardCVCRegex.test(cardCVCValue) && cardCVCValue.length !== 3) {
                        $('#card-cvc-error').text("{{ __('form_validations.invalid_card_cvc') }}");
                    } else {
                        $('#card-cvc-error').text('');
                    }
                });
            });
        </script>

    </x-slot>

</x-rtl.base-layout>
