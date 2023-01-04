
<!DOCTYPE html>
<html lang="{{ \App\Facades\GlobalLanguage::user_lang_slug() }}" dir="{{ \App\Facades\GlobalLanguage::user_lang_dir() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    {!! load_google_fonts() !!}
    {!! render_favicon_by_id(get_static_option('site_favicon')) !!}

    <title>
        @if(!request()->routeIs('tenant.frontend.homepage'))
            @yield('title')
            -
            {{filter_static_option_value('site_'.\App\Facades\GlobalLanguage::user_lang_slug().'_title',$global_static_field_data)}}
        @else
            {{filter_static_option_value('site_'.\App\Facades\GlobalLanguage::user_lang_slug().'_title',$global_static_field_data)}}
            @if(!empty(filter_static_option_value('site_'.\App\Facades\GlobalLanguage::user_lang_slug().'_tag_line',$global_static_field_data)))
                - {{filter_static_option_value('site_'.\App\Facades\GlobalLanguage::user_lang_slug().'_tag_line',$global_static_field_data)}}
            @endif
        @endif
    </title>


    {!! render_favicon_by_id(filter_static_option_value('site_favicon', $global_static_field_data)) !!}

    <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/plugin.css')}}">


    @if(!empty(tenant()->id))
      <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/dynamic-'.tenant()->id.'-style.css')}}">
    @endif
    
    <link rel="stylesheet" href="{{global_asset('assets/landlord/common/css/helpers.css')}}">
    <x-frontend.common-css/>
    <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/'.get_static_option('tenant_default_theme').'-main-style.css')}}">
        <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/developer.css')}}">


    @if(\App\Facades\GlobalLanguage::user_lang_dir() == 'rtl')
        <link rel="stylesheet" href="{{global_asset('assets/tenant/frontend/themes/css/'.get_static_option('tenant_default_theme').'-rtl.css')}}">
    @endif

    @include('tenant.frontend.partials.css-variable')
    @yield('style')

</head>
<body class="{{tenant()->theme_slug}}">

@include('tenant.frontend.partials.navbar')

