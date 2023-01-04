@extends('landlord.frontend.frontend-page-master')

@section('title')
    {{$order_details->getTranslation('title',get_user_lang())}}
@endsection

@section('page-title')
    {{ __('Plan Details') }}
@endsection

@section('style')
    <link rel="stylesheet" href="{{global_asset('assets/common/css/toastr.css')}}">

    <style>
        .theme-wrapper{
            border: 1px solid transparent;
            outline: 1px solid transparent;
        }
        .selected_theme{
            transition: 0.3s;
            border-color: var(--main-color-two);
            outline-color: var(--main-color-two);
            padding: 10px;
        }
        .selected_text{
            top: 0;
            left: 11px;
            background-color: var(--main-color-two);
            padding: 15px;
            position: absolute;
            color: white;
            transition: 0.3s;
        }
        .selected_text i{
            font-size: 30px;
        }
        .selected_text i {
            background: darkslateblue;
            font-size: 30px;
        }

        #login_form_order_page .form-control{
            height: 50px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')

    @php
        $user_lang = get_user_lang();
        $user = Auth::guard('web')->user();
    @endphp
    <section class="order-service-page-content-area padding-100">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title margin-bottom-60">
                        <h2 class="title">{{$order_details->getTranslation('title',$user_lang)}}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-8">
                    <div class="price-plan-left-wrap">
                        <div class="price-header">
                            <h3 class="title"></h3>
                            <div class="price-wrap">
                                <span class="price">{{amount_with_currency_symbol($order_details->price)}}</span><br>
                                <span class="">{{\App\Enums\PricePlanTypEnums::getText($order_details->type)}}</span>
                            </div>
                        </div>
                        <div class="price-footer">
                            @if($trial)
                                @php
                                    if(Auth::guard('web')->check() != true)
                                        {
                                            $button_attr = 'data-bs-target="#loginModal"';
                                        } else {
                                            $button_attr = 'data-bs-target="#trialModal"';
                                        }
                                @endphp
                                <div class="btn-wrapper">
                                <a href="javascript:void(0)" class="cmn-btn02"
                                   data-bs-toggle="modal" {!! $button_attr !!}>{{__('Start Trial')}}</a>
                                </div>

                            @else
                                <div class="btn-wrapper">
                                    <a href="{{route('landlord.frontend.plan.order',$order_details->id)}}"
                                       class="cmn-btn02">{{__('Buy Now')}}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-8">
                    <div class="single-price-plan-item price-plan-two">

                        <div class="price-body features-view-all">
                            <ul class="features">
                                @if(!empty($order_details->page_permission_feature))
                                    <li class="check"> {{ sprintf(__('Page Create %d'),$order_details->page_permission_feature )}}</li>
                                @endif

                                @if(!empty($order_details->blog_permission_feature))
                                    <li class="check"> {{ sprintf(__('Blog Create %d'),$order_details->blog_permission_feature )}}</li>
                                @endif

                                @if(!empty($order_details->service_permission_feature))
                                    <li class="check"> {{ sprintf(__('Service Create %d'),$order_details->service_permission_feature )}}</li>
                                @endif

                                @foreach($order_details->plan_features as $key=> $item)
                                    <li class="check"> {{__(str_replace('_', ' ',ucfirst($item->feature_name))) ?? ''}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @php
                        $faq_items = !empty($order_details->faq) ? unserialize($order_details->faq,['class' => false]) : ['title' => []];
                         $rand_number = rand(9999,99999999);
                    @endphp

                    @if(!empty(current($faq_items['title'])) )
                        <section class="faqArea section-padding fix section-bg2">
                            <div class="row justify-content-center">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2 mb-25">
                                        <h2 class="tittle wow fadeInUp" data-wow-delay="0.0s">{{__('General')}}<span class="color"> {{__('Question')}} </span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <div class="collapse-wrapper">
                                            <div class="accordion" id="accordionExample-{{$rand_number}}">
                                            @foreach($faq_items['title'] as $faq)
                                                    @php
                                                        $aria_expanded = 'false';
                                                    @endphp
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingOne-{{$loop->index}}">
                                                            <button class="accordion-button {{$loop->index == 0 ? '' : 'collapsed'}}" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#collapseOne-{{$loop->index}}"
                                                                    aria-expanded="{{$aria_expanded}}"
                                                                    aria-controls="collapseOne-{{$loop->index}}">
                                                                      {{purify_html($faq)}}
                                                            </button>
                                                        </h2>
                                                        <div id="collapseOne-{{$loop->index}}"
                                                             class="accordion-collapse collapse {{$loop->index == 0 ? 'show' : ''}}"
                                                             aria-labelledby="headingOne-{{$loop->index}}"
                                                             data-bs-parent="#accordionExample-{{$rand_number}}">
                                                            <div class="accordion-body">
                                                                    {{  purify_html($faq_items['description'][$loop->index] ?? '')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                     @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3>{{__('Select Theme')}}</h3>
                    <div class="row theme-row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xl-4 mt-5">
                        @foreach($themes as $theme)
                        @break($loop->last)
                            <div class="col position-relative">
                                <div class="theme-wrapper {{$loop->first ? 'selected_theme' : ''}}" data-theme="{{$theme->slug}}" data-name="{{$theme->getTranslation('title', $user_lang)}}">
                                    {!! render_image_markup_by_attachment_id($theme->image) !!}
                                    <h4 class="text-center">{{$theme->getTranslation('title', $user_lang)}}</h4>

                                    @if($loop->first)
                                        <h4 class="selected_text"><i class="las la-check-circle"></i></h4>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="auth-form-light text-left justify-content-between">

                        <h4 class="text-center my-3 title">{{__('Sign in to continue.')}}</h4>
                        <x-error-msg/>
                        <x-flash-msg/>
                        <form class="pt-3" action="" method="post" id="login_form_order_page">
                        <div id="msg-wrapper"></div>
                        <div class="error-wrap"></div>
                            <div class="form-group">
                                <input type="email" name="username" class="form-control"
                                       placeholder="{{__('Username')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"
                                       placeholder="{{__('Password')}}">
                            </div>
                            <div class="mt-3">
                                <div class="btn-wrapper">
                                       <button type="button" class="cmn-btn1 w-100 mb-40" id="login_btn">{{__('Login')}}</button>
                                </div>

                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" name="remember"
                                               class="form-check-input"> {{__('Keep me signed in')}}
                                        <i class="input-helper"></i>
                                    </label>
                                </div>
                                <a href="#" class="auth-link text-black">{{__('Forgot password?')}}</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light"> {{__('Do not have an account?')}}
                                <a href="{{route('landlord.user.register')}}" class="text-primary">{{__('Create')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::guard('web')->check())
        <div class="modal fade" id="trialModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center text-success" id="exampleModalLabel">{{__('Start Trial')}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="error-wrap"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h5>{{__('Personal Information')}}</h5>
                                <hr>
                                <p>{{__('Name :')}}<span>{{$user->name}}</span></p>
                                <p>{{__('Email :')}} <span>{{$user->email}}</span></p>
                                <p class="mt-4">{{__('Subdomain :')}}

                                <input class="form--control" type="text" name="subdomain" autocomplete="off"
                                value="{{old('subdomain')}}" placeholder="{{__('Subdomain')}}"></p>
                                <div id="subdomain-wrap"></div>
                            </div>

                            <div class="col-6">
                                <h5>{{__('Package Information')}}</h5>
                                <hr>
                                <p>{{__('Plan :')}} <span>{{$order_details->getTranslation('title', $user_lang)}}</span></p>
                                <p>{{__('Price :')}} <span>{{amount_with_currency_symbol($order_details->price)}}</span></p>
                                <p>{{__('Trial :')}} <span>{{$order_details->trial_days}} {{__('Days')}}</span></p>
                                <p class="modal_theme">{{__('Theme :')}} <span>{{__('Donation Theme')}}</span></p>
                            </div>

                            <form action="" class="mt-5" method="POST">
                                <input type="hidden" name="user_id" id="user-id" value="{{$user->id}}">
                                <input type="hidden" name="order_id" id="order-id" value="{{$order_details->id}}">
                                <input type="hidden" name="theme_slug" id="theme-slug" value="theme-1">

                                <div class="parent d-flex justify-content-end">
                                    <div class="btn-wrapper">
                                        <button type="button" id="create-trial-account-button" href="{{route('landlord.frontend.plan.order',$order_details->id)}}"
                                           class="cmn-btn02">@if(auth('web')->check()){{__('Create Website')}} @else {{__('Create Account')}} @endif</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="{{global_asset('assets/common/js/toastr.min.js')}}"></script>
    <x-unique-domain-checker :name="'subdomain'"/>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function ($) {


                $(document).on('click', '#order_pkg_btn', function () {
                    var name = $("#order_name").val()
                    var email = $("#order_email").val()
                    sessionStorage.pkg_user_name = name;
                    sessionStorage.pkg_user_email = email;

                })

                $(document).on('click', '#login_btn', function (e) {
                    e.preventDefault();
                    var formContainer = $('#login_form_order_page');
                    var el = $(this);
                    var username = formContainer.find('input[name="username"]').val();
                    var password = formContainer.find('input[name="password"]').val();
                    var remember = formContainer.find('input[name="remember"]').val();

                    el.text('{{__("Please Wait")}}');

                    $.ajax({
                        type: 'post',
                        url: "{{route('landlord.user.ajax.login')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            username: username,
                            password: password,
                            remember: remember,
                        },
                        success: function (data) {
                            if (data.status == 'invalid') {
                                el.text('{{__("Login")}}')
                                formContainer.find('.error-wrap').html('<div class="alert alert-danger">' + data.msg + '</div>');
                            } else {
                                formContainer.find('.error-wrap').html('');
                                el.text('{{__("Login Success.. Redirecting ..")}}');
                                location.reload();
                            }
                        },
                        error: function (data) {
                            var response = data.responseJSON.errors
                            formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                            $.each(response, function (value, index) {
                                formContainer.find('.error-wrap ul').append('<li>' + index + '</li>');
                            });
                            el.text('{{__("Login")}}');
                        }
                    });
                });
                var defaulGateway = $('#site_global_payment_gateway').val();
                $('.payment-gateway-wrapper ul li[data-gateway="' + defaulGateway + '"]').addClass('selected');

                $(document).on('click', '.payment-gateway-wrapper > ul > li', function (e) {
                    e.preventDefault();

                    let gateway = $(this).data('gateway');
                    if (gateway === 'manual_payment') {
                        $('.manual_transaction_id').removeClass('d-none');
                    } else {
                        $('.manual_transaction_id').addClass('d-none');
                    }

                    $(this).addClass('selected').siblings().removeClass('selected');
                    $('.payment-gateway-wrapper').find(('input')).val($(this).data('gateway'));
                    $('.payment_gateway_passing_clicking_name').val($(this).data('gateway'));

                });

                $(document).on('change', '#guest_logout', function (e) {
                    e.preventDefault();
                    var infoTab = $('#nav-profile-tab');
                    var nextBtn = $('.next-step-button');
                    if ($(this).is(':checked')) {
                        $('.login-form').hide();
                        infoTab.attr('disabled', false).removeClass('disabled');
                        nextBtn.show();
                    } else {
                        $('.login-form').show();
                        infoTab.attr('disabled', true).addClass('disabled');
                        nextBtn.hide();
                    }
                });

                $(document).on('click', '.next-step-button', function (e) {
                    var infoTab = $('#nav-profile-tab');
                    infoTab.attr('disabled', false).removeClass('disabled').addClass('active').siblings().removeClass('active');
                    $('#nav-profile').addClass('show active').siblings().removeClass('show active');
                });

                $(document).on('click', '#create-trial-account-button', function (e) {
                    e.preventDefault();
                    var timer = "";
                    var submit_button = $('#create-trial-account-button');
                    var text = ["{{__('Creating Account...')}}","{{__('Creating Database...')}}","{{__('Creating Designs...')}}","{{__('Getting Ready...')}}","{{__('Your Account is Ready...')}}"];

                    let i = 1;
                    function buttonLoop(isRunning) {
                        if(isRunning){
                            timer = setTimeout(function() {
                                submit_button.text(text[i]);
                                if (i < 5) {
                                    buttonLoop(true);
                                }
                                i++;
                            }, 1500)
                        }else{
                            clearTimeout(timer);
                        }
                    }

                    let user_id = $('#user-id').val();
                    let order_id = $('#order-id').val();
                    let subdomain = $('input[name=subdomain]').val();
                    let theme = $('input[name=theme_slug]').val();

                    let formContainer = $('.modal-body');

                    $.ajax({
                        type: 'post',
                        url: "{{route('landlord.frontend.trial.account')}}",
                        data: {
                            _token: "{{csrf_token()}}",
                            user_id: user_id,
                            order_id: order_id,
                            subdomain: subdomain,
                            theme: theme
                        },
                        beforeSend: function () {
                            submit_button.prop('disabled', true);
                            submit_button.text(text[0]);

                            buttonLoop(true);
                        },
                        success: function (data) {
                            buttonLoop(false);

                            if (data.type == 'success')
                            {
                                let text = '<h5 class="text-success text-center mt-4">"{{__('Your Account is Complete. We are Redirecting You to Your Admin Dashboard')}}"</h5>';
                                submit_button.parent().after(text);
                                setTimeout(function (){
                                    location.href = data.url;
                                }, 3000);
                            }
                            else if(data.type == 'danger')
                            {
                                formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                                formContainer.find('.error-wrap ul').append('<li>' + data.msg + '</li>')
                                $('input[name=subdomain]').val('');

                                submit_button.text('Create Account');
                                submit_button.prop('disabled', false);
                            }else{
                                  submit_button.parent().parent().after('<div class="alert alert-'+data.type+' mt-2">' + data.msg + '</div>');
                            }
                        },
                        error: function (data) {
                            let i = 0;

                            buttonLoop(false);

                            submit_button.text('Create Account');
                            submit_button.prop('disabled', false);

                            var response = data.responseJSON.errors
                            formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                            $.each(response, function (value, index) {
                                formContainer.find('.error-wrap ul').append('<li> <span>' + ++i + '.</span> ' + index + '</li>');
                            });
                        }
                    });
                });

                let row = $('.theme-row');
                let col = row.children('.col-3').first();
                let name = col.find('.theme-wrapper').data('name');
                $('p.modal_theme').find('span').text(name);


                $(document).on('click', '.theme-wrapper', function (e){
                    let el = $(this);
                    let theme_slug = el.data('theme');
                    let theme_name = el.data('name');

                    $('.theme-wrapper').removeClass('selected_theme');
                    el.addClass('selected_theme');

                    let text = '<h4 class="selected_text"><i class="las la-check-circle"></i></h4>';
                    $('.selected_text').remove();
                    el.append(text);

                    $('input#theme-slug').val(theme_slug);
                    $('p.modal_theme').find('span').text(theme_name);
                });
            });
        })(jQuery);
    </script>
@endsection
