
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="d-flex justify-content-between flex-wrap align-items-center">
                    <div class="header-info-left">
                        <ul class="listing">
                            <li class="listItem"><i class="fa-solid fa-phone icon"></i>{{get_static_option('topbar_phone')}}</li>
                            <li class="listItem"><i class="fa-solid fa-envelope icon"></i> {{get_static_option('topbar_email')}}</li>
                        </ul>
                    </div>
                    <div class="header-info-right">

                        <ul class="user-account">
                            @if (auth()->check())
                                @php
                                    $route = auth()->guest() == 'admin' ? route('tenant.admin.dashboard') : route('tenant.user.home');
                                @endphp
                                <li class="listItem"><a href="{{ $route }}">{{ __('Dashboard') }}</a> <span>/</span>
                                    <a href="{{ route('tenant.user.logout') }}">{{ __('Logout') }}</a>
                                </li>
                            @else
                                <li class="listItem"><a href="{{ route('tenant.user.login') }}">{{ __('Login') }}</a> <span>/</span>
                                    <a href="{{ route('tenant.user.register') }}">{{ __('Register') }}</a></li>
                            @endif
                        </ul>
                        <div class="language_dropdown @if(get_user_lang_direction() == 'rtl') ml-1 @else mr-1 @endif d-none" id="languages_selector">
                            @if (auth()->check())
                                @php
                                    $route = auth()->guest() == 'admin' ? route('tenant.admin.dashboard') : route('tenant.user.home');
                                @endphp
                                <div class="selected-language">{{ __('Account') }}<i class="fas fa-caret-down"></i></div>
                                <ul>
                                    <li class="listItem"><a href="{{ $route }}">{{ __('Dashboard') }}</a>
                                    <li class="listItem"><a href="{{ route('tenant.user.logout') }}">{{ __('Logout') }}</a></li>
                                </ul>
                            @else
                                <div class="selected-language">{{ __('Login') }}<i class="fas fa-caret-down"></i></div>
                                <ul>
                                    <li class="listItem"><a class="listItem" href="{{ route('tenant.user.login') }}">{{ __('Login') }}</a>
                                    <li class="listItem"><a class="listItem" href="{{ route('tenant.user.register') }}">{{ __('Register') }}</a>
                                </ul>
                            @endif
                        </div>
                        <!-- Select  -->
                        <div class="select-language">
                            <select class="niceSelect tenant_languages_selector">
                                @foreach(\App\Facades\GlobalLanguage::all_languages(\App\Enums\StatusEnums::PUBLISH) as $lang)
                                    @php
                                        $exploded = explode('(',$lang->name);
                                    @endphp
                                   <option class="lang_item" value="{{$lang->slug}}" >{{current($exploded)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <ul class="header-cart">
                            <li class="listItem"><a href="{{get_static_option('topbar_facessbook_url')}}" class="social"><i class="lab la-facebook-f icon"></i></a></li>
                            <li class="listItem"> <a href="{{get_static_option('topbar_instagram_url')}}" class="social"><i class="lab la-instagram icon"></i></a></li>
                            <li class="listItem"> <a href="{{get_static_option('topbar_linkedin_url')}}" class="social"><i class="lab la-linkedin-in icon"></i></a></li>
                            <li class="listItem"> <a href="{{get_static_option('topbar_twitter_url')}}" class="social"><i class="lab la-twitter icon"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
