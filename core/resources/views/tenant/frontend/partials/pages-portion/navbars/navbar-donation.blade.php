<header class="header-style-01 headerBg1">
    @include('tenant.frontend.partials.topbar')
    <nav class="navbar navbar-area  navbar-expand-lg ">
        <div class="container container-two nav-container">
            <div class="responsive-mobile-menu">
                <div class="logo-wrapper">
                    <a href="{{url('/')}}" class="logo">
                        {!! render_image_markup_by_attachment_id(get_static_option('site_logo'),'logo') !!}
                    </a>
                </div>
                <a href="#0" class="click_show_icon"><i class="las fa-ellipsis-v"></i> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bizcoxx_main_menu" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="NavWrapper">
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav">
                        {!! render_frontend_menu($primary_menu) !!}
                    </ul>
                </div>
            </div>


            <div class="nav-right-content">
                <div class="btn-wrapper">
                    <a href="{{ route('tenant.dynamic.page',get_dynamic_page_name_by_id(get_static_option('donation_page'))) }}" class="cmn-btn">{{__('Campaign')}}</a>
                </div>
            </div>
        </div>
    </nav>
</header>
