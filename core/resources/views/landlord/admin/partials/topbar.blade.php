<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('landlord.admin.home')}}">
            @php
                $logo_type = !empty(get_static_option('dark_mode_for_admin_panel')) ? 'site_white_logo' : 'site_logo';
            @endphp
            {!! render_image_markup_by_attachment_id(get_static_option($logo_type)) !!}

        </a>
        <a class="navbar-brand brand-logo-mini" href="{{route('landlord.admin.home')}}">
            {!! render_image_markup_by_attachment_id(get_static_option('site_favicon')) !!}
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <!--<div class="search-field d-none d-md-block">-->
        <!--    <form class="d-flex align-items-center h-100" action="#">-->
        <!--        <div class="input-group">-->
        <!--            <div class="input-group-prepend bg-transparent">-->
        <!--                <i class="input-group-text border-0 mdi mdi-magnify"></i>-->
        <!--            </div>-->
        <!--            <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">-->
        <!--        </div>-->
        <!--    </form>-->
        <!--</div>-->
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <div class="nav-profile-img">
                        {!! render_image_markup_by_attachment_id(auth('admin')->user()->image,'','full',true) !!}
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{auth('admin')->user()->name}}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{route('landlord.admin.tenant.activity.log')}}">
                        <i class="mdi mdi-cached me-2 text-success"></i> {{__('Activity Log')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('landlord.admin.edit.profile')}}">
                        <i class="mdi mdi-account-settings me-2 text-success"></i> {{__('Edit Profile')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('landlord.admin.change.password')}}">
                        <i class="mdi mdi-key me-2 text-success"></i> {{__('Change Password')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                           document.getElementById('tenanat_logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                        <i class="mdi mdi-logout me-2 text-primary"></i>
                        {{__('Signout')}}
                        <form id="logout-form" action="{{ route('landlord.admin.logout') }}" method="POST"
                              class="d-none">
                            @csrf
                            <button class="d-none" type="submit" id="tenanat_logout_submit_btn"></button>
                        </form>
                    </a>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                    @if($new_message)
                        <span class="count-symbol bg-warning"></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">

                    <h6 class="p-3 mb-0">{{$new_message. ' '.  __('Messages') }}  </h6>
                    <div class="dropdown-divider"></div>

                    @foreach($all_messages as $message)

                        <a class="dropdown-item preview-item" href="{{route(route_prefix().'admin.contact.message.view', $message->id)}}">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                            @php
                                $fields = json_decode($message->fields,true);
                            @endphp
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                    <h6 class="preview-subject mb-1 font-weight-normal">{{__('You have message from' )}}
                                        <strong>{{optional($message->form)->title}}</strong></h6>
                                    <p class="text-gray mb-0"> {{$message->created_at->diffForHumans() . ' '}}  @if($message->status === 1)<small class="mt-1 text-danger">{{'('.__('New' .')')}}</small>@endif</p>
                            </div>
                            <div class="dropdown-divider"></div>
                            @endforeach

                            <h6 class="p-3 mb-0 text-center"><a
                                    href="{{route(route_prefix().'admin.contact.message.all')}}">{{__('Seel All')}}</a>
                            </h6>
                        </a>
                </div>

            </li>

            <!--<li class="nav-item nav-logout d-none d-lg-block">-->
            <!--    <a class="nav-link" href="#">-->
            <!--        <i class="mdi mdi-theme-light-dark"></i>-->
            <!--    </a>-->
            <!--</li>-->
            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="btn btn-outline-danger btn-icon-text" href="{{route('landlord.homepage')}}" target="_blank">
                    <i class="mdi mdi-upload btn-icon-prepend"></i> {{__('Visit Site')}}
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>