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

        <h2 class="text-center mt-4 mb-5">
            <b>{{ __('trans.pay') }}</b>
        </h2>

        <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation row g-3 card form-width-responsive"
            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"  style="padding: 20px; box-shadow: 0 1px 4px 3px rgba(0, 0, 0, 0.1);">
            @csrf

            <div class='form-row row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>{{ __('trans.card_name') }}</label> <input class='form-control' size='4'
                        type='text'>
                </div>
            </div>

            <div class='form-row row'>
                <div class='col-xs-12 form-group required'>
                    <label class='control-label'>{{ __('trans.card_number') }}</label> <input autocomplete='off'
                        class='form-control card-number' size='20' type='text'>
                </div>
            </div>

            <div class='form-row row'>
                <div class='col-xs-12 col-md-4 form-group cvc required'>
                    <label class='control-label'>{{ __('trans.cvc') }}</label> <input autocomplete='off' class='form-control card-cvc'
                        placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>{{ __('trans.expiration_month') }}</label> <input class='form-control card-expiry-month'
                        placeholder='MM' size='2' type='text'>
                </div>
                <div class='col-xs-12 col-md-4 form-group expiration required'>
                    <label class='control-label'>{{ __('trans.expiration_year') }}</label> <input class='form-control card-expiry-year'
                        placeholder='YYYY' size='4' type='text'>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-xs-12">
                    <button class="btn btn-secondary btn-lg btn-block" type="submit">{{ __('trans.pay_now') }}
                        ($100)</button>
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
    </x-slot>

</x-rtl.base-layout>
