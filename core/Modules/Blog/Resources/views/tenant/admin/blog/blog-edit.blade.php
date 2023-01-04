@extends(route_prefix().'admin.admin-master')
@section('title')   {{__('Edit Blog Post')}} @endsection

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
        $user_lang = \App\Facades\GlobalLanguage::user_lang_slug();
    @endphp
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-admin.header-wrapper>
                    <x-slot name="left">
                        <h4 class="card-title mb-5">  {{__('Edit Blog Post')}}</h4>
                    </x-slot>
                    <x-slot name="right" class="d-flex">
                        <form action="{{route(route_prefix().'admin.blog.edit',$blog_post->id)}}" method="get">
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
                <form class="forms-sample" method="post" action="{{route(route_prefix().'admin.blog.update',$blog_post->id)}}">
                    @csrf
                <div class="row">

                <div class="col-md-8">
                    <x-fields.input type="hidden" name="lang" value="{{$lang_slug}}"/>
                    <x-fields.input type="text" name="title" label="{{__('Title')}}" class="title" value="{{$blog_post->getTranslation('title',$lang_slug)}}" id="title"/>

                    <div class="form-group permalink_label">
                        <label class="text-dark">{{__('Permalink * :')}}
                            <span id="slug_show" class="display-inline"></span>
                            <span id="slug_edit" class="display-inline">
                                         <button class="btn btn-info btn-sm slug_edit_button"> <i class="las la-edit"></i> </button>
                                          <input type="text" name="slug" value="{{$blog_post->slug}}" class="form-control blog_slug mt-2" >
                                          <button class="btn btn-info btn-sm slug_update_button mt-2" >{{__('Update')}}</button>
                                    </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>{{__('Blog Content')}}</label>
                        <input type="hidden" name="blog_content" value="{{$blog_post->getTranslation('blog_content',$lang_slug)}}">
                        <div class="summernote" data-content="{{$blog_post->getTranslation('blog_content',$lang_slug)}}"></div>
                    </div>

                    <x-fields.textarea name="excerpt" label="{{__('Excerpt')}}" value="{{$blog_post->getTranslation('excerpt',$lang_slug)}}"/>
                    <x-blog::backend.common-meta-data.edit-meta-markup :data="$blog_post"/>

                 </div>
                    <div class="col-lg-4 right-side-card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mt-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <x-fields.select name="category_id" class="form-control" title="{{__('Category')}}">
                                                    @foreach($all_category as $cat)
                                                        <option value="{{$cat->id}}" @if($cat->id == $blog_post->category_id) selected @endif>{{$cat->getTranslation('title',$lang_slug)}}</option>
                                                    @endforeach
                                                </x-fields.select>

                                                <div class="form-group">
                                                    <label for="title">{{__('Tags')}}</label>
                                                    <input type="text" class="form-control" value="{{$blog_post->tags}}" name="tags" data-role="tagsinput">
                                                </div>

                                                <x-fields.select name="visibility" class="form-control" id="visibility" title="{{__('Visibility')}}">
                                                    <option value="public" @if( $blog_post->visibility == 'public') selected @endif>{{__('Public')}}</option>
                                                    <option value="logged_user"@if( $blog_post->visibility == 'logged_user') selected @endif>{{__('Logged User')}}</option>
                                                </x-fields.select>


                                                <x-fields.select name="status" class="form-control" id="status" title="{{__('Status')}}">
                                                    <option value="{{\App\Enums\StatusEnums::DRAFT}}"@if( $blog_post->status == \App\Enums\StatusEnums::DRAFT) selected @endif>{{__("Draft")}}</option>
                                                    <option value="{{\App\Enums\StatusEnums::PUBLISH}}"@if( $blog_post->status ==\App\Enums\StatusEnums::PUBLISH) selected @endif>{{__("Publish")}}</option>
                                                </x-fields.select>

                                                  <x-landlord-others.edit-media-upload-image :label="'Blog Image'" :name="'image'" :value="$blog_post->image"/>
                                                  <x-landlord-others.edit-media-upload-gallery :label="'Image Gallery'" :name="'image_gallery'" :value="$blog_post->image_gallery"/>

                                                <div class="submit_btn mt-5">
                                                    <button type="submit" class="btn btn-gradient-primary pull-right">{{__('Update Post ')}}</button>
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
    <x-summernote.js/>
    <x-media-upload.js/>
    <script src="{{global_asset('assets/landlord/admin/js/bootstrap-tagsinput.js')}}"></script>
    <script>
            $(document).ready(function () {
                //Status Code

                function converToSlug(slug){
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    finalSlug = slug.replace(/  +/g, ' ');
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }

                //Permalink Code
                var sl =  $('.blog_slug').val();
                var url = `{{url('/blog/')}}/` + sl;
                var data = $('#slug_show').text(url).css('color', 'blue');

                var form = $('#blog_new_form');

                //Slug Edit Code
                $(document).on('click', '.slug_edit_button', function (e) {
                    e.preventDefault();
                    $('.blog_slug').removeClass('d-none');
                    $(this).addClass('d-none');
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


                $(document).on('change','select[name="lang"]',function (e){
                    $(this).closest('form').trigger('submit');
                    $('input[name="lang"]').val($(this).val());
                });


            });


            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function (contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });
            if ($('.summernote').length > 0) {
                $('.summernote').each(function (index, value) {
                    $(this).summernote('code', $(this).data('content'));
                });
            }



    </script>
@endsection
