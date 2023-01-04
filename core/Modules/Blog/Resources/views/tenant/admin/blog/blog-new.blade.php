@extends(route_prefix().'admin.admin-master')
@section('title')   {{__('New Blog Post')}} @endsection
@section('style')
    <link rel="stylesheet" href="{{global_asset('assets/landlord/admin/css/bootstrap-tagsinput.css')}}">
    <x-summernote.css/>
    <x-media-upload.css/>
    <style>
        .nav-pills .nav-link {
            margin: 8px 0px !important;
        }
        .col-lg-4.right-side-card {
            background: aliceblue;
        }
    </style>
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
                        <h4 class="card-title mb-5">  {{__('New Blog Post')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <form action="{{route(route_prefix().'admin.blog.new')}}" method="get">
                            <x-fields.select name="lang" title="{{__('Language')}}">
                                @foreach(\App\Facades\GlobalLanguage::all_languages() as $lang)
                                    <option value="{{$lang->slug}}" @if($lang->slug === $lang_slug) selected @endif>{{$lang->name}}</option>
                                @endforeach
                            </x-fields.select>
                        </form>
                        <p></p>
                        <x-link-with-popover url="{{route(route_prefix().'admin.blog')}}" extraclass="ml-3">
                            {{__('All Blog Post')}}
                        </x-link-with-popover>
                    </x-slot>
                </x-admin.header-wrapper>
                <x-error-msg/>
                <x-flash-msg/>
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.blog.new')}}">
                    @csrf
                <div class="row">

                <div class="col-md-8">
                    <x-fields.input type="hidden" name="lang" value="{{$lang_slug}}"/>
                    <x-fields.input type="text" name="title" label="{{__('Title')}}" class="title" id="title"/>
                    <div class="form-group permalink_label">
                        <label class="text-dark">{{__('Permalink * :')}}
                            <span id="slug_show" class="display-inline"></span>
                            <span id="slug_edit" class="display-inline">
                                 <button class="btn btn-primary btn-sm slug_edit_button"> <i class="las la-edit"></i> </button>

                                <input type="text" name="slug" class="form-control blog_slug mt-2" >
                                  <button class="btn btn-info btn-sm slug_update_button mt-2" >{{__('Update')}}</button>
                            </span>
                        </label>
                    </div>
                    <x-summernote.textarea label="{{__('Blog Content')}}" name="blog_content"/>
                    <x-fields.textarea name="excerpt" label="{{__('Excerpt')}}"/>

                  <x-blog::backend.common-meta-data.add-meta-markup/>

                 </div>
                    <div class="col-lg-4 right-side-card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <x-fields.select name="category_id" title="{{__('Category')}}">
                                                    <option value="" readonly="" >{{__('Select Category')}}</option>
                                                    @foreach($all_category as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->getTranslation('title',$lang_slug)}}</option>
                                                    @endforeach
                                                </x-fields.select>

                                                <div class="form-group">
                                                    <label for="title">{{__('Tags')}}</label>
                                                    <input type="text" class="form-control" name="tags" data-role="tagsinput">
                                                </div>

                                                <x-fields.select name="visibility" class="form-control" id="visibility" title="{{__('Visibility')}}">
                                                    <option value="public">{{__('Public')}}</option>
                                                    <option value="logged_user">{{__('Logged User')}}</option>
                                                </x-fields.select>


                                                <x-fields.select name="status" class="form-control" id="status" title="{{__('Status')}}">
                                                    <option value="{{\App\Enums\StatusEnums::DRAFT}}">{{__("Draft")}}</option>
                                                    <option value="{{\App\Enums\StatusEnums::PUBLISH}}">{{__("Publish")}}</option>
                                                </x-fields.select>

                                                <x-fields.media-upload name="image" title="{{__('Image')}}" dimentions="{{__('1920 X 1280 px image recommended')}}"/>
                                                <x-landlord-others.media-upload-gallery-insert :name="'image_gallery'" :title="'Gallery Image'"/>

                                                <div class="submit_btn mt-5">
                                                    <button type="submit" class="btn btn-gradient-primary pull-right">{{__('Submit New Post ')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                     </div>
                </form>
            </div>
        </div>
    </div>
    <x-media-upload.markup/>
@endsection

@section('scripts')
    <script src="{{global_asset('assets/landlord/admin/js/bootstrap-tagsinput.js')}}"></script>
    <x-summernote.js/>
    <x-media-upload.js/>

    <script>
        (function ($) {
            "use strict";

            $(document).ready(function ($) {

                $(document).on('change','select[name="lang"]',function (e){
                    $(this).closest('form').trigger('submit');
                    $('input[name="lang"]').val($(this).val());
                });

                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                $('.permalink_label').addClass('d-none');
                $(document).on('keyup', '.title', function (e) {
                    var slug = converToSlug($(this).val());
                    var url = `{{url('/blog/')}}/` + slug;
                    $('.permalink_label').removeClass('d-none');
                    var data = $('#slug_show').text(url).css('color', 'blue');
                    $('.blog_slug').val(slug);
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
                    var url = `{{url('/blog/')}}/` + slug;
                    $('#slug_show').text(url);
                    $('.blog_slug').addClass('d-none');
                });


                $(document).on('change', '#langchange', function (e) {
                    $('#langauge_change_select_get_form').trigger('submit');
                });

                var el = $('.post_type_radio');
                $(document).on('change', '.post_type', function () {
                    var val = $(this).val();
                    if (val === 'option2') {
                        $('.video_section').removeClass('d-none');
                    } else {
                        $('.video_section').addClass('d-none');
                    }
                })



            });
        })(jQuery)
    </script>
@endsection
