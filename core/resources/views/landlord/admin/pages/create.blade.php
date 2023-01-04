@extends(route_prefix().'admin.admin-master')
@section('title') {{__('Create New Page')}} @endsection

@section('style')
    <x-media-upload.css/>
    <x-summernote.css/>
@endsection
@section('content')
    @php
        $lang_slug = request()->get('lang') ?? \App\Facades\GlobalLanguage::default_slug();
    @endphp
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-5">{{__('Create New Page')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <form action="{{route(route_prefix().'admin.pages.create')}}" method="get">
                            <x-fields.select name="lang" title="{{__('Language')}}">
                                @foreach(\App\Facades\GlobalLanguage::all_languages() as $lang)
                                    <option value="{{$lang->slug}}" @if($lang->slug === $lang_slug) selected @endif>{{$lang->name}}</option>

                                @endforeach
                            </x-fields.select>
                        </form>
                        <p></p>
                        <x-link-with-popover url="{{route(route_prefix().'admin.pages')}}" extraclass="ml-3">
                            {{__('All Pages')}}
                        </x-link-with-popover>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.pages.create')}}">
                    @csrf
                    <x-fields.input type="hidden" name="lang"  value="{{$lang_slug}}"/>

                    <div class="row">
                        <div class="col-lg-9">
                            <x-fields.input name="title" label="{{__('Title')}}" id="title" />
                            <div class="form-group permalink_label">
                                <label class="text-dark">{{__('Permalink')}} * :
                                    <span id="slug_show" class="display-inline text-info"></span>
                                    <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-warning btn-sm slug_edit_button"> <i class="mdi mdi-lead-pencil"></i> </button>
                                        <input type="text" name="slug" class="form-control blog_slug mt-2 d-none">
                                          <button class="btn btn-info btn-sm slug_update_button mt-2 d-none">{{__('Update')}}</button>
                                    </span>
                                </label>
                            </div>
                            <x-summernote.textarea label="{{__('Page Content')}}" name="page_content"/>

                            <div class="meta-information-wrapper">
                                <h4 class="mb-4">{{__('Meta Information For SEO')}}</h4>
                                <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                                    <div class="nav flex-column nav-pills me-3" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active"  data-bs-toggle="pill" data-bs-target="#v-general-meta-info" type="button" role="tab"  aria-selected="true">
                                            {{__('General Meta Info')}}</button>
                                        <button class="nav-link" data-bs-toggle="pill" data-bs-target="#v-facebook-meta-info" type="button" role="tab"  aria-selected="false">
                                            {{__('Facebook Meta Info')}}</button>
                                        <button class="nav-link"  data-bs-toggle="pill" data-bs-target="#v-twitter-meta-info" type="button" role="tab"  aria-selected="false">
                                            {{__('Twitter Meta Info')}}
                                        </button>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="v-general-meta-info" role="tabpanel" >
                                            <x-fields.input name="meta_title" label="{{__('Meta Title')}}" />
                                            <x-fields.textarea name="meta_description" label="{{__('Meta Description')}}" />
                                            <x-fields.media-upload name="meta_image" title="{{__('Meta Image')}}" dimentions="1200x1200"/>
                                        </div>
                                        <div class="tab-pane fade" id="v-facebook-meta-info" role="tabpanel" >
                                            <x-fields.input name="meta_fb_title" label="{{__('Meta Title')}}" />
                                            <x-fields.textarea name="meta_fb_description" label="{{__('Meta Description')}}" />
                                            <x-fields.media-upload name="fb_image" title="{{__('Meta Image')}}" dimentions="1200x1200"/>
                                        </div>
                                        <div class="tab-pane fade" id="v-twitter-meta-info" role="tabpanel" >
                                            <x-fields.input name="meta_tw_title" label="{{__('Meta Title')}}" />
                                            <x-fields.textarea name="meta_tw_description" label="{{__('Meta Description')}}" />
                                            <x-fields.media-upload name="tw_image" title="{{__('Meta Image')}}" dimentions="1200x1200"/>
                                        </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                        <div class="col-lg-3">
                            <x-fields.select name="visibility" title="{{__('Visibility')}}" info="{{__('if you select users only, then this page can only be accessable by logged in users')}}">
                                <option value="0">{{__('Everyone')}}</option>
                                <option value="1">{{__('Users Only')}}</option>
                            </x-fields.select>
                            <x-fields.switcher name="breadcrumb" label="{{__('Enable/Disable Breadcrumb')}}" />
                            <x-fields.switcher name="page_builder" label="{{__('Enable/Disable Page Builder')}}" />
                            <x-fields.select name="status" title="{{__('Status')}}">
                                <option value="1">{{__('Publish')}}</option>
                                <option value="0">{{__('Draft')}}</option>
                            </x-fields.select>
                            <button type="submit" class="btn btn-gradient-primary me-2 mt-5">{{__('Save Changes')}}</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection
@section('scripts')
    <x-media-upload.js/>
    <x-summernote.js/>
    <script>
        $(document).ready(function(){
            //Permalink Code
            $('.permalink_label').hide();
            $(document).on('change','select[name="lang"]',function (e){
                $(this).closest('form').trigger('submit');
                $('input[name="lang"]').val($(this).val());
            });

            function removeTags(str) {
                if ((str===null) || (str==='')){
                    return false;
                }
                str = str.toString();
                return str.replace( /(<([^>]+)>)/ig, '');
            }

            function converToSlug(slug){
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                finalSlug = slug.replace(/  +/g, ' ');
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                return finalSlug;
            }

            $(document).on('keyup change', 'input[name="title"]', function (e) {
                var slug = converToSlug($(this).val());
                var url = `{{route('landlord.homepage')}}/` + removeTags(slug);
                $('.permalink_label').show();
                var data = $('#slug_show').text(url).css('color', 'blue');
                $('.blog_slug').val(removeTags(slug));

            });

            //Slug Edit Code
            $(document).on('click', '.slug_edit_button', function (e) {
                e.preventDefault();
                $('.blog_slug').removeClass('d-none');
                $(this).hide();
                $('.slug_update_button').removeClass('d-none');
            });

            //Slug Update Code
            $(document).on('click', '.slug_update_button', function (e) {
                e.preventDefault();
                $(this).addClass('d-none');
                $('.slug_edit_button').removeClass('d-none');
                var update_input = $('.blog_slug').val();
                var slug = converToSlug(update_input);
                var url = `{{route('landlord.homepage')}}` + removeTags(slug);
                $('#slug_show').text(url);
                $('.blog_slug').addClass('d-none');
            });

            //For Navbar
            var imgSelect = $('.img-select');
            var id = $('#navbar_variant').val();
            imgSelect.removeClass('selected');
            $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
            $(document).on('click','.img-select img',function (e) {
                e.preventDefault();
                imgSelect.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#navbar_variant').val($(this).data('home_id'));
            })

            //For Footer
            var imgSelect = $('.img-select');
            var id = $('#footer_variant').val();
            imgSelect.removeClass('selected');
            $('img[data-home_id="'+id+'"]').parent().parent().addClass('selected');
            $(document).on('click','.img-select img',function (e) {
                e.preventDefault();
                imgSelect.removeClass('selected');
                $(this).parent().parent().addClass('selected').siblings();
                $('#footer_variant').val($(this).data('home_id'));
            })

        });
    </script>
@endsection