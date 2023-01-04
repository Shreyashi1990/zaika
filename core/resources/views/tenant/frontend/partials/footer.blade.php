
@include('tenant.frontend.partials.widget-area')

<div class="mouseCursor cursorOuter"></div>
<div class="mouseCursor cursorInner"></div>
<div class="progressParent">
    <svg class="backCircle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>



<script src="{{global_asset('assets/common/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{global_asset('assets/tenant/frontend/themes/js/popper.min.js')}}"></script>
<script src="{{global_asset('assets/tenant/frontend/themes/js/bootstrap.js')}}"></script>
<script src="{{global_asset('assets/tenant/frontend/themes/js/plugin.js')}}"></script>
<script src="{{global_asset('assets/tenant/frontend/themes/js/main.js')}}"></script>

@if(!empty(tenant()->id))
    <script src="{{global_asset('assets/tenant/frontend/themes/js/dynamic-'.tenant()->id.'-script.js')}}"></script>
@endif

    <x-custom-js.newsletter-store/>
    <x-custom-js.tenant-newsletter-store/>
    <x-custom-js.query-submit/>
    <x-custom-js.contact-form-store/>
    <x-custom-js.lang-change/>

 {{--Module Js--}}
    <x-blog::frontend.custom-js.category-show/>
    <x-service::frontend.custom-js.category-show/>
{{--Module Js--}}

@yield('scripts')
@yield('footer-scripts')
</body>

</html>
