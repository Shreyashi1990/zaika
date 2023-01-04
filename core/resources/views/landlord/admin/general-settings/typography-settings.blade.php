@extends(route_prefix().'admin.admin-master')
@section('title') {{__('Typography Settings')}} @endsection
@section('style')
    <style>
        .typo_admin .nice-select
        {
            line-height: 25px !important;
        }
    </style>
    <link rel="stylesheet" href="{{global_asset('assets/landlord/admin/css/nice-select.css')}}">
@endsection
@section('content')

    <div class="col-12 grid-margin stretch-card typo_admin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">{{__('Typography Identity')}}</h4>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.general.typography.settings')}}">
                    @csrf

                    @if(!tenant())

                    <div class="form-group">
                        <label for="body_font_family">{{__('Font Family')}}</label>
                        <select class="form-control nice-select wide" name="body_font_family" id="body_font_family">
                            @foreach($google_fonts as $font_family => $font_variant)
                                <option value="{{$font_family}}" @if($font_family == get_static_option('body_font_family')) selected @endif>{{$font_family}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br><br>

                    <div class="form-group">
                        <label for="body_font_variant">{{__('Font Variant')}}</label>
                        @php
                            $font_family_selected = get_static_option('body_font_family') ?? get_static_option('body_font_family') ;
                            $get_font_family_variants = property_exists($google_fonts,$font_family_selected) ? (array) $google_fonts->$font_family_selected : ['variants' => array('regular')];
                        @endphp
                        <select class="form-control nice-select wide" multiple id="body_font_variant" name="body_font_variant[]">
                            @foreach($get_font_family_variants['variants'] as $variant)
                                @php
                                    $selected_variant = !empty(get_static_option('body_font_variant')) ? unserialize(get_static_option('body_font_variant')) : [];
                                @endphp
                                <option value="{{$variant}}" @if(in_array($variant,$selected_variant)) selected @endif>{{str_replace(['0,','1,'],['','i'],$variant)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <br><br>

                    <h4 class="header-title margin-top-80">{{__("Heading Typography Settings")}}</h4>
                    <div class="form-group">
                        <label for="heading_font">{{__('Heading Font')}}</label>
                        <label class="switch">
                            <input type="checkbox" name="heading_font"  @if(!empty(get_static_option('heading_font'))) checked @endif id="heading_font">
                            <span class="slider"></span>
                        </label>
                        <small>{{__('Use different font family for heading tags ( h1,h2,h3,h4,h5,h6)')}}</small>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="heading_font_family">{{__('Font Family')}}</label>
                        <select class="form-control nice-select wide" name="heading_font_family" id="heading_font_family">
                            @foreach($google_fonts as $font_family => $font_variant)
                                <option value="{{$font_family}}" @if($font_family == get_static_option('heading_font_family')) selected @endif>{{$font_family}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br><br>
                    <div class="form-group margin-top-50">
                        <label for="heading_font_variant">{{__('Font Variant')}}</label>
                        @php
                            $font_family_selected = get_static_option('heading_font_family') ?? '';
                            $get_font_family_variants = property_exists($google_fonts,$font_family_selected) ? (array) $google_fonts->$font_family_selected : ['variants' => array('regular')];
                        @endphp
                        <select class="form-control nice-select wide" multiple name="heading_font_variant[]" id="heading_font_variant">
                            @foreach($get_font_family_variants['variants'] as $variant)
                                @php
                                    $selected_variant = !empty(get_static_option('heading_font_variant')) ? unserialize(get_static_option('heading_font_variant')) : [];
                                @endphp
                                <option value="{{$variant}}"
                                        @if(in_array($variant,$selected_variant)) selected @endif>{{str_replace(['0,','1,'],['','i'],$variant)}}</option>
                            @endforeach
                        </select>
                    </div>
                  @endif


                    @if(tenant())
                        <div class="row">
                            @php
                                $all_theme = ['theme_donation', 'theme_job', 'theme_event','theme_support_ticket', 'theme_ecommerce','theme_knowledgebase'];
                            @endphp

                            @foreach($all_theme as $theme)
                                @include('landlord.admin.general-settings.tenant.theme.typography.'. str_replace('theme_','',$theme), ['suffix' => $theme])
                            @endforeach
                        </div>
                    @endif


                    <br><br><br>
                    <button type="submit" class="btn btn-gradient-primary me-2">{{__('Save Changes')}}</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{global_asset('assets/landlord/admin/js/jquery.nice-select.min.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                $(document).on('change','.body_font_family',function (e) {
                    e.preventDefault();
                    var themeNum = $(this).data('theme');
                    var fontFamily =  $(this).val();

                    $.ajax({
                        url: "{{route(route_prefix().'admin.general.typography.single')}}",
                        type: "POST",
                        data:{
                            _token: "{{csrf_token()}}",
                            font_family : fontFamily,
                            theme : themeNum
                        },
                        success:function (data) {
                            var theme = data.theme;
                            var variantSelector = $('.body_font_variant_'+theme);
                            variantSelector.html('');

                            $.each(data.decoded_fonts.variants,function (index,value) {
                                var nameval = value.replace('0,','');
                                nameval = nameval.replace('1,','i');

                                variantSelector.append('<option value="'+value+'">'+nameval+'</option>');
                            });
                            variantSelector.niceSelect('update');
                        }
                    });
                });
                $(document).on('change','.heading_font_family',function (e) {
                    e.preventDefault();
                    var themeNum = $(this).data('theme');
                    var fontFamily =  $(this).val();

                    $.ajax({
                        url: "{{route(route_prefix().'admin.general.typography.single')}}",
                        type: "POST",
                        data:{
                            _token: "{{csrf_token()}}",
                            font_family : fontFamily,
                            theme : themeNum
                        },
                        success:function (data) {
                            var theme = data.theme;
                            var variantSelector = $('.heading_font_variant_'+theme);
                            console.log(variantSelector)
                            variantSelector.html('');
                            $.each(data.decoded_fonts.variants,function (index,value) {
                                var nameval = value.replace('0,','');
                                nameval = nameval.replace('1,','i');

                                variantSelector.append('<option value="'+value+'">'+nameval+'</option>');
                            });

                            variantSelector.niceSelect('update');
                        }
                    });

                });

                if($('.nice-select').length > 0){
                    $('.nice-select').niceSelect();
                }

                let switch_donation = $('input[data-theme=theme_donation]');
                let switch_job = $('input[data-theme=theme_job]');
                let switch_event = $('input[data-theme=theme_event]');
                let switch_support_ticket = $('input[data-theme=theme_support_ticket]');
                let switch_ecommerce = $('input[data-theme=theme_ecommerce]');
                let switch_knowledgebase = $('input[data-theme=theme_knowledgebase]');


                if(!switch_donation.prop('checked')){
                    let theme = switch_donation.data('theme');
                    var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                    dependendFields.parent().hide();
                }

                if(!switch_job.prop('checked')) {
                    let theme = switch_job.data('theme');
                    var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                    dependendFields.parent().hide();
                }

                if(!switch_event.prop('checked')) {
                    let theme = switch_event.data('theme');
                    var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                    dependendFields.parent().hide();
              }
                if(!switch_support_ticket.prop('checked')) {
                    let theme = switch_support_ticket.data('theme');
                var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                dependendFields.parent().hide();
            }

                if(!switch_ecommerce.prop('checked')) {
                    let theme = switch_ecommerce.data('theme');
                var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                dependendFields.parent().hide();
             }
                if(!switch_knowledgebase.prop('checked')) {
                let theme = switch_knowledgebase.data('theme');
                var dependendFields = $('select[name=heading_font_family_'+theme+'], .heading_font_variant_'+theme+'');

                dependendFields.parent().hide();
             }

                $(document).on('change','input.heading_font',function (e) {
                    let theme = $(this).data('theme');
                    let themeName = theme.replace('heading_font_', '');

                    var dependendFields = $('select[name=heading_font_family_'+themeName+'], .heading_font_variant_'+themeName+'');

                    if(!$(this).prop('checked')){
                        dependendFields.parent().hide();
                    }else{
                        dependendFields.parent().show();
                    }
                });

                $(document).on('click','#typography_submit_btn',function (e) {
                    e.preventDefault();
                    $(this).text('Updating...').prop('disabled',true);
                    $(this).parent().trigger("submit");
                })
            });
        }(jQuery));
    </script>
@endsection
