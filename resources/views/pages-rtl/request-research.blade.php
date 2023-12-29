<x-rtl.base-layout :scrollspy="false">

    <x-slot:pageTitle>{{ $title }}</x-slot>

    <x-slot:headerFiles>

        <link rel="stylesheet" href="{{ mix('css/light/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/modal.css') }}">
        <link rel="stylesheet" href="{{ mix('css/light/alert.css') }}">
        <link rel="stylesheet" href="{{ mix('css/dark/alert.css') }}">

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
                            id="research_papers_count"
                            placeholder="{{ __('trans.research_papers_count_placeholder') }}">
                        <p class="text-red-600 mt-2 error-validation" style="color: red"
                            id="research_papers_count-error"></p>
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
                    </div>
                </div>

                <div class='form-row row'>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>{{ __('trans.cvc') }}</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                            type='text' maxlength="3">
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_month') }}</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'
                            maxlength="2">
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_year') }}</label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                            type='text' maxlength="4">
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
            document.addEventListener('DOMContentLoaded', function() {
                let educationLevelSelect = document.getElementById('education_level');
                let middleGradeList = document.getElementById('middle_grade_list');
                let highGradeList = document.getElementById('high_grade_list');
                let universityYearList = document.getElementById('university_year_list');
                let graduateStudyList = document.getElementById('graduate_study_list');
                let school = document.getElementById('school');
                let university = document.getElementById('university');

                let educationDiv = document.getElementById('educationDiv');

                educationDiv.classList.remove('col-xs-12', 'col-md-4');
                educationDiv.classList.add('col-xs-12', 'col-md-12');

                middleGradeList.style.display = 'none';
                highGradeList.style.display = 'none';
                universityYearList.style.display = 'none';
                graduateStudyList.style.display = 'none';
                school.style.display = 'none';
                university.style.display = 'none';

                function selectEducationLevel() {
                    let selectedOption = educationLevelSelect.options[educationLevelSelect.selectedIndex].value;

                    if (selectedOption === 'المرحلة المتوسطة' || selectedOption === 'Middle School') {
                        educationDiv.classList.remove('col-xs-12', 'col-md-12');
                        educationDiv.classList.add('col-xs-12', 'col-md-4');
                        middleGradeList.style.display = 'block';
                        highGradeList.style.display = 'none';
                        universityYearList.style.display = 'none';
                        graduateStudyList.style.display = 'none';
                        school.style.display = 'block';
                        university.style.display = 'none';
                    } else if (selectedOption === 'المرحلة الثانوية' || selectedOption === 'High School') {
                        educationDiv.classList.remove('col-xs-12', 'col-md-12');
                        educationDiv.classList.add('col-xs-12', 'col-md-4');
                        middleGradeList.style.display = 'none';
                        highGradeList.style.display = 'block';
                        universityYearList.style.display = 'none';
                        graduateStudyList.style.display = 'none';
                        school.style.display = 'block';
                        university.style.display = 'none';
                    } else if (selectedOption === 'المرحلة الجامعية' || selectedOption === 'University') {
                        educationDiv.classList.remove('col-xs-12', 'col-md-12');
                        educationDiv.classList.add('col-xs-12', 'col-md-4');
                        middleGradeList.style.display = 'none';
                        highGradeList.style.display = 'none';
                        universityYearList.style.display = 'block';
                        graduateStudyList.style.display = 'none';
                        school.style.display = 'none';
                        university.style.display = 'block';
                    } else if (selectedOption === 'الدراسات العليا' || selectedOption === 'Graduate Studies') {
                        educationDiv.classList.remove('col-xs-12', 'col-md-12');
                        educationDiv.classList.add('col-xs-12', 'col-md-4');
                        middleGradeList.style.display = 'none';
                        highGradeList.style.display = 'none';
                        universityYearList.style.display = 'none';
                        graduateStudyList.style.display = 'block';
                        school.style.display = 'none';
                        university.style.display = 'block';
                    } else {
                        middleGradeList.style.display = 'none';
                        highGradeList.style.display = 'none';
                        universityYearList.style.display = 'none';
                        graduateStudyList.style.display = 'none';
                        school.style.display = 'none';
                        university.style.display = 'none';
                    }
                }

                educationLevelSelect.addEventListener('change', selectEducationLevel);

                selectEducationLevel();

                let submitButton = document.getElementById("submitButton");
                let backToForm = document.getElementById("backToForm");

                let errorDiv = document.getElementById("error-div");
                let successDiv = document.getElementById("success-div");

                submitButton.addEventListener("click", function(event) {
                    event.preventDefault();

                    requestDiv.style.display = "none";
                    paymentDiv.style.display = "block";

                    errorDiv.style.display = "none";
                    successDiv.style.display = "none";
                });

                backToForm.addEventListener("click", function(event) {
                    event.preventDefault();

                    requestDiv.style.display = "block";
                    paymentDiv.style.display = "none";

                    errorDiv.style.display = "none";
                    successDiv.style.display = "none";
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#submitButton').prop('disabled', true);

                function updateSubmitButtonState() {
                    let formFilled = true;
                    let allValidationsPassed = true;

                    $('#requestDiv input:visible, #requestDiv select:visible, #requestDiv textarea:visible').each(
                        function() {
                            if ($(this).val().trim() === '') {
                                formFilled = false;
                                return false;
                            }
                        });

                    $('.error-validation').each(function() {
                        if ($(this).text().trim() !== '') {
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
                    let phoneRegex = /^[0-9]{10}$/;

                    $('.phone-validation').hide();

                    if (phoneValue.trim() === '') {
                        $('#phone-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!phoneRegex.test(phoneValue)) {
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

                $('#research_papers_count').on('input', function() {
                    let countValue = $(this).val();
                    let countRegex = /^[0-9]+$/;

                    if (countValue.trim() === '') {
                        $('#research_papers_count-error').text("{{ __('form_validations.field_empty') }}");
                    } else if (!countRegex.test(countValue)) {
                        $('#research_papers_count-error').text(
                            "{{ __('form_validations.numeric_validation') }}");
                    } else if (parseInt(countValue, 10) > 10) {
                        $('#research_papers_count-error').text("{{ __('form_validations.papers_ten') }}");
                    } else if (parseInt(countValue, 10) === 0) {
                        $('#research_papers_count-error').text("{{ __('form_validations.papers_zero') }}");
                    } else {
                        $('#research_papers_count-error').text('');
                    }
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

    </x-slot>

</x-rtl.base-layout>
