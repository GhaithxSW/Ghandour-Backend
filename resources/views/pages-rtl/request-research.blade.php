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
            <div class="alert alert-success text-center form-width-responsive"
                style="font-size: 20px; margin-bottom: 50px">
                {{ __('trans.msg_request_success') }}
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success text-center form-width-responsive">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        <div class='form-row row text-center form-width-responsive' id="error-div" style="display: none">
            <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert'>Please correct the errors and try again</div>
            </div>
        </div>

        <form method="POST" action="/add-request-research" role="form"
            class="require-validation row g-3 mt-3 card form-width-responsive" id="requestForm" data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            style="padding: 20px; box-shadow: 0 1px 4px 3px rgba(0, 0, 0, 0.1);">
            @csrf

            <div id="requestDiv">

                <h2 class="text-center mt-3 mb-5">
                    <b>{{ __('trans.request_research_now') }}</b>
                </h2>

                <div class="col mb-3">
                    <label for="first_name" class="form-label">{{ __('trans.first_name') }}</label>
                    <input type="text" name="first_name" class="form-control"
                        placeholder="{{ __('trans.name_placeholder') }}">
                    @error('first_name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="last_name" class="form-label">{{ __('trans.last_name') }}</label>
                    <input type="text" name="last_name" class="form-control"
                        placeholder="{{ __('trans.last_name_placeholder') }}">
                    @error('last_name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="country" class="form-label">{{ __('trans.country') }}</label>
                    <input type="text" name="country" class="form-control"
                        placeholder="{{ __('trans.country_placeholder') }}">
                    @error('country')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="phone" class="form-label">{{ __('trans.phone') }}</label>
                    <input type="text" name="phone" class="form-control"
                        placeholder="{{ __('trans.phone_placeholder') }}">
                    @error('phone')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="email" class="form-label">{{ __('trans.email') }}</label>
                    <input type="email" name="email" class="form-control text-right"
                        placeholder="{{ __('trans.email_placeholder') }}">
                    @error('email')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="education_level" class="form-label">{{ __('trans.education_level') }}</label>
                    <select name="education_level" class="form-select">
                        <option selected disabled>{{ __('trans.choose') }}</option>
                        @foreach ($educationLevels as $educationLevel)
                            <option value="{{ $educationLevel->id }}">{{ $educationLevel->name_ar }}</option>
                        @endforeach
                    </select>
                    @error('education_level')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="grade" class="form-label">{{ __('trans.grade') }}</label>
                    <input type="text" name="grade" class="form-control"
                        placeholder="{{ __('trans.grade_placeholder') }}">
                    @error('grade')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="school" class="form-label">{{ __('trans.school') }}</label>
                    <input type="text" name="school" class="form-control"
                        placeholder="{{ __('trans.school_placeholder') }}">
                    @error('school')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="research_topic" class="form-label">{{ __('trans.research_topic') }}</label>
                    <input type="text" class="form-control" name="research_topic"
                        placeholder="{{ __('trans.research_topic_placeholder') }}">
                    @error('research_topic')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="teacher_name" class="form-label">{{ __('trans.teacher_name') }}</label>
                    <input type="text" class="form-control" name="teacher_name"
                        placeholder="{{ __('trans.teacher_name_placeholder') }}">
                    @error('teacher_name')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="research_lang" class="form-label">{{ __('trans.research_lang') }}</label>
                    <input type="text" class="form-control" name="research_lang"
                        placeholder="{{ __('trans.research_lang_placeholder') }}">
                    @error('research_lang')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="research_papers_count"
                        class="form-label">{{ __('trans.research_papers_count') }}</label>
                    <input type="text" class="form-control" name="research_papers_count"
                        placeholder="{{ __('trans.research_papers_count_placeholder') }}">
                    @error('research_papers_count')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="delivery_date" class="form-label">{{ __('trans.delivery_date') }}</label>
                    <input type="text" class="form-control" name="delivery_date"
                        placeholder="{{ __('trans.delivery_date_placeholder') }}">
                    @error('delivery_date')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="notes" class="form-label">{{ __('trans.notes') }}</label>
                    <textarea class="form-control" name="notes" placeholder="{{ __('trans.notes_placeholder') }}"></textarea>
                    @error('notes')
                        <p class="m-2 text-red-600" style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col mb-3">
                    <a href="/" class="btn btn-primary m-1">{{ __('trans.back') }}</a>
                    <button class="btn btn-success m-1" id="submitButton" disabled>{{ __('trans.submit') }}</button>
                </div>

            </div>

            <div id="paymentDiv" style="display: none;">

                <h2 class="text-center mt-4 mb-5">
                    <b>{{ __('trans.pay') }}</b>
                </h2>

                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>{{ __('trans.card_name') }}</label>
                        <input class='form-control' size='4' type='text'>
                    </div>
                </div>

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
                            type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_month') }}</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='2'
                            type='text'>
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>{{ __('trans.expiration_year') }}</label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                            type='text'>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col-xs-12">
                        {{-- <a href="/request-research" class="btn btn-primary m-1">{{ __('trans.back') }}</a> --}}
                        <button class="btn btn-secondary btn-lg btn-block" type="submit">{{ __('trans.pay_now') }}
                            ($100)</button>
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

                var $form = $(".require-validation");

                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
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
                        var $input = $(el);
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
                        var token = response['id'];

                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }

            });
        </script>

        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.getElementById("requestForm");
                var submitButton = document.getElementById("submitButton");

                var backToForm = document.getElementById("backToForm");


                submitButton.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Perform AJAX submission or other processing here

                    // Show the payment form and hide the request form
                    requestDiv.style.display = "none";
                    paymentDiv.style.display = "block";
                });

                backToForm.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Perform AJAX submission or other processing here

                    // Show the payment form and hide the request form
                    requestDiv.style.display = "block";
                    paymentDiv.style.display = "none";
                });

            });
        </script> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to check if all form fields are filled
                function checkFormFields() {
                    var formFilled = true;

                    // Get all input/select/textarea elements in the requestDiv
                    var formElements = document.querySelectorAll(
                        '#requestDiv input, #requestDiv select, #requestDiv textarea');

                    // Check each form field
                    formElements.forEach(function(element) {
                        if (element.value === '') {
                            formFilled = false;
                            return; // Break the loop if any field is empty
                        }
                    });

                    // Enable/disable submitButton based on formFilled
                    document.getElementById('submitButton').disabled = !formFilled;
                }

                // Bind the checkFormFields function to form field change events
                var formElements = document.querySelectorAll(
                    '#requestDiv input, #requestDiv select, #requestDiv textarea');
                formElements.forEach(function(element) {
                    element.addEventListener('input', checkFormFields);
                    element.addEventListener('change', checkFormFields);
                });


                var submitButton = document.getElementById("submitButton");
                var backToForm = document.getElementById("backToForm");

                submitButton.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Perform AJAX submission or other processing here

                    // Show the payment form and hide the request form
                    requestDiv.style.display = "none";
                    paymentDiv.style.display = "block";
                });

                backToForm.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior

                    // Perform AJAX submission or other processing here

                    // Show the payment form and hide the request form
                    requestDiv.style.display = "block";
                    paymentDiv.style.display = "none";
                });


            });
        </script>



        {{-- <script>
            document.addEventListener("DOMContentLoaded", function() {
                var form = document.getElementById("requestForm");
                var submitButton = document.getElementById("submitButton");

                form.addEventListener("input", function(event) {
                    // Check if the changed element is within the requestDiv
                    if (event.target.closest("#requestDiv")) {
                        // Check if all input and select fields are filled, excluding the "Choose" option
                        var allFieldsFilled = Array.from(form.elements).every(function(element) {
                            if (element.tagName === "INPUT" && element.type === "text") {
                                return element.value.trim() !== "";
                            } else if (element.tagName === "SELECT") {
                                return element.value !== "" && element.value !==
                                "0"; // Assuming "0" is the value for the "Choose" option
                            }
                            return true; // Ignore non-input/select elements
                        });

                        // Enable/disable the submit button based on the condition
                        submitButton.disabled = !allFieldsFilled;
                    }
                });

                // Add an event listener to handle form submission
                form.addEventListener("submit", function(event) {
                    // Prevent the form from submitting if the submit button is disabled
                    if (submitButton.disabled) {
                        event.preventDefault();
                        alert("Please fill in all required fields before submitting.");
                    }
                });

                // Add an event listener to handle switching back to the form
                var backToFormButton = document.getElementById("backToForm");
                if (backToFormButton) {
                    backToFormButton.addEventListener("click", function() {
                        document.getElementById("paymentDiv").style.display = "none";
                        document.getElementById("requestDiv").style.display = "block";
                    });
                }
            });
        </script> --}}










        {{-- MASTER PICE --}}

        {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                // Function to check if all form fields are filled
                function checkFormFields() {
                    var formFilled = true;

                    // Check each input/select/textarea in the requestDiv
                    $('#requestDiv input, #requestDiv select, #requestDiv textarea').each(function() {
                        if ($(this).val() === '') {
                            formFilled = false;
                            return false; // Break the loop if any field is empty
                        }
                    });

                    // Enable/disable submitButton based on formFilled
                    $('#submitButton').prop('disabled', !formFilled);
                }

                // Bind the checkFormFields function to form field change events
                $('#requestDiv input, #requestDiv select, #requestDiv textarea').on('input change', function() {
                    checkFormFields();
                });
            });
        </script> --}}


    </x-slot>

</x-rtl.base-layout>
