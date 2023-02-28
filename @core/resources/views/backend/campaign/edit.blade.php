@extends('backend.admin-master')
@section('site-title')
    {{__('Update Campaign')}}
@endsection
@section('style')
    <x-media.css />
    <x-niceselect.css />
    <link rel="stylesheet" href="{{ asset('assets/backend/css/flatpickr.min.css') }}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40">
                    <x-msg.error />
                    <x-msg.flash />
                </div>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Update Campaign')}}</h4>
                        @can('campaign-list')
                        <div class="text-right">
                            <a href="{{ route('admin.campaigns.all') }}" class="btn btn-primary">{{ __('All Campaigns') }}</a>
                        </div>
                        @endcan
                        @can('campaign-edit')
                        <div class="row new_campaign mt-5">
                            <div class="col-sm-3">
                                <div class="nav flex-column nav-pills side_nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-campaign-tab" data-toggle="pill" href="#v-pills-campaign" role="tab" aria-controls="v-pills-campaign" aria-selected="true">{{ __('Campaign') }}</a>
                                    <a class="nav-link" id="v-pills-products-tab" data-toggle="pill" href="#v-pills-products" role="tab" aria-controls="v-pills-products" aria-selected="false">{{ __('Products') }}</a>
                                </div>
                                <div class="form-group mt-5">
                                    <input type="checkbox" id="set_fixed_percentage"> 
                                    <label for="set_fixed_percentage">{{ __('Set Fixed Percentage') }}</label>
                                    <div id="fixe_price_cut_container" style="display: none">
                                        <input type="number" id="fixed_percentage_amount" class="form-control mb-2" placeholder="{{ __('Price Cut Percentage') }}">
                                        <button class="btn btn-sm btn-primary mb-2" id="fixed_price_sync_all">{{ __('Sync Price') }}</button>
                                        <p class="text-secondary mb-4">{{ __('This will change all the campaign price to given a pecentage.') }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" id="set_fixed_date"> 
                                    <label for="set_fixed_date">{{ __('Set Fixed Date') }}</label>
                                    <div id="fixe_date_container" style="display: none">
                                        <input type="text" id="fixed_from_date" class="form-control mb-2 flatpickr" placeholder="{{ __('From Date') }}">
                                        <input type="text" id="fixed_to_date" class="form-control mb-2 flatpickr" placeholder="{{ __('To Date') }}">
                                        <button class="btn btn-sm btn-primary" id="fixed_date_sync_all">{{ __('Sync Date') }}</button>
                                        <p class="text-secondary mb-4">{{ __('This will change all the start and end date to selected date.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <form action="{{ route('admin.campaigns.update') }}" method="POST">
                                    @csrf
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-campaign" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card border-primary mb-3" style="border: 1px solid">
                                                        <div class="card-header bg-transparent border-primary font-weight-bold">{{ __('Update Info') }}</div>
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="id" value="{{ $campaign->id }}">
                                                                <label for="campaign_name">{{ __('Campaign Name') }}</label>
                                                                <input type="text" class="form-control" id="campaign_name" name="campaign_name" placeholder="Campaign Name" value="{{ $campaign->title }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="campaign_subtitle">{{ __('Campaign Subtitle') }}</label>
                                                                <input type="text" class="form-control" id="campaign_subtitle" name="campaign_subtitle" placeholder="Campaign Subtitle" value="{{ $campaign->subtitle }}">
                                                            </div>
                                                            <x-media-upload :title="__('Campaign Image')" :id="$campaign->image" :name="'image'" :dimentions="'1920x1080'"/>
                                                            <div class="form-group">
                                                                <label for="campaign_status">{{ __('Campaign Status') }}</label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="draft" @if($campaign->status == 'draft') selected @endif>{{ __('Draft') }}</option>
                                                                    <option value="publish" @if($campaign->status == 'publish') selected @endif>{{ __('Publish') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="v-pills-products" role="tabpanel" aria-labelledby="v-pills-products-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="product_repeater_container">
                                                        @if ($campaign->products)
                                                            @foreach ($campaign->products as $campaign_product)
                                                            <div class="card border-primary mb-3" style="border: 1px solid">
                                                                <div class="card-header bg-transparent border-primary campaign-card-header">
                                                                    <span>{{ __('Campaign Product') }}</span>
                                                                    <span class="delete-campaign"><i class="las la-times-circle"></i></span>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="form-group select_product">
                                                                        <label for="product_id">{{ __('Select Product') }}</label>
                                                                        <input type="hidden" name="campaign_product_id[]" class="campaign_product_id" value="{{ $campaign_product->id }}">
                                                                        <input type="hidden" name="product_id[]" class="product_id" value="{{ $campaign_product->product_id }}">
                                                                        <select id="product_id" class="form-control nice-select wide">
                                                                            @foreach ($all_products as $product)
                                                                                <option value="{{ $product->id }}"
                                                                                    data-price="{{ $product->price }}"
                                                                                    data-sale_price="{{ $product->sale_price }}"
                                                                                    data-stock="{{ optional($product->inventory)->stock_count ?? 0 }}"
                                                                                    @if($campaign_product->product_id == $product->id) selected @endif
                                                                                >
                                                                                    {{ $product->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="units_for_sale">{{ __('Original Price') }}</label>
                                                                                <input type="number" class="form-control original_price product_original_price" disabled value="{{ optional($campaign_product->product)->sale_price }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="campaign_price">{{ __('Price for Campaign') }}</label>
                                                                                <input type="number" name="campaign_price[]" class="form-control campaign_price" value="{{ $campaign_product->campaign_price }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="available_num_of_units">{{ __('No. of Units Available') }}</label>
                                                                                <input type="number" class="form-control available_num_of_units" disabled value="{{ optional(optional($campaign_product->product)->inventory)->stock_count ?? 0 }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="units_for_sale">{{ __('No. of Units for Sale') }}</label>
                                                                                <input type="number" name="units_for_sale[]" id="units_for_sale" class="form-control" value="{{ $campaign_product->units_for_sale }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="start_date">{{ __('Start Date') }}</label>
                                                                                <input type="text" name="start_date[]" class="form-control start_date flatpickr" value="{{ $campaign_product->start_date }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <div class="form-group">
                                                                                <label for="end_date">{{ __('End Date') }}</label>
                                                                                <input type="text" name="end_date[]" class="form-control end_date flatpickr" value="{{ $campaign_product->end_date }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="button" class="btn btn-outline-primary" id="add_product_btn">{{ __('Add Product') }}</button>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">{{ __('Update Campaign') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup />
    <div class="d-none">
        <input type="hidden" id="fixed_percentage">
        <input type="hidden" id="fixed_campaign_start_date">
        <input type="hidden" id="fixed_campaign_end_date">
    </div>
@endsection
@section('script')
    <x-media.js />
    <script src="{{ asset('assets/backend/js/flatpickr.js') }}"></script>
    <x-niceselect.js />
    <script>
        (function ($) {
            $(document).ready(function () {
                flatpickr(".flatpickr", {
                    altInput: true,
                    altFormat: "F j, Y",
                    dateFormat: "Y-m-d",
                });

                if ($('.nice-select').length > 0) {
                    $('.nice-select').niceSelect();
                }

                $(document).on('click', '.cross-btn', function () {
                    let container = $(this).closest('.card');
                    container.slideUp('slow');
                    setTimeout(() => container.remove(), 1000);
                });

                $('#set_fixed_percentage').on('change', function () {
                    if ($(this).is(':checked')) {
                        $('#fixe_price_cut_container').slideDown('500')
                    } else {
                        $('#fixe_price_cut_container').slideUp('500');
                        setTimeout(function () {
                            $('#fixed_percentage_amount').val('');
                        }, 500);
                    }
                });

                $('#set_fixed_date').on('change', function () {
                    if ($(this).is(':checked')) {
                        $('#fixe_date_container').slideDown(500);
                    } else {
                        $('#fixe_date_container').slideUp(500);
                        setTimeout(function () {
                            $('#fixe_date_container input').val('');
                        }, 500);
                    }
                });

                $('#fixed_price_sync_all').on('click', function () {
                    let fixed_percentage = $('#fixed_percentage_amount').val().trim();

                    if (!fixed_percentage.length) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'warning',
                            title: '{{ __("Set percentage first") }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                    let all_prices = $('.product_original_price');
                    for (let i = 0; i < all_prices.length; i++) {
                        let price_container = $(all_prices[i]).closest('.col');
                        let final_price_container = price_container.next();
                        let product_price = $(all_prices[i]).val().trim();
                        let price_after_percentage = product_price - (product_price / 100 * fixed_percentage);
                        price_after_percentage = price_after_percentage.toFixed(2);
                        final_price_container.find('.campaign_price').val(price_after_percentage);
                    }
                });

                $('#fixed_date_sync_all').on('click', function () {
                    if ($('#set_fixed_date').is(':checked')) {
                        let from_date = $('#fixed_from_date').val();
                        let to_date = $('#fixed_to_date').val();

                        $('.start_date.flatpickr-input').val(from_date);
                        $('.end_date.flatpickr-input').val(to_date);

                        flatpickr(".flatpickr", {
                            altInput: true,
                            altFormat: "F j, Y",
                            dateFormat: "Y-m-d",
                        });
                    } else {
                        Swal.fire({
                            position: 'top-start',
                            icon: 'warning',
                            title: '{{ __("Set fixed date first") }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });

                $(document).on('change', '.select_product select', function () {
                    let selected_product_id = $(this).val();
                    let container = $(this).closest('.card');
                    let original_price_field = container.find('.original_price');
                    let campaign_price_field = container.find('.campaign_price');
                    $(this).prev().val(selected_product_id);
                    let data = $(this).find('option:checked').data();
                    let product_price = data['sale_price'];

                    $(this).closest('.card-body').find('.available_num_of_units').val(data['stock']);

                    $(this).closest('.card-body').find('.original_price').val(product_price);

                    if ($('#set_fixed_percentage').is(':checked')) {
                        let percentage = $('#fixed_percentage_amount').val().trim();
                        let price_after_percentage = product_price - (product_price / 100 * percentage);
                        console.log(price_after_percentage);
                        campaign_price_field.val(price_after_percentage);
                    }
                });

                $('.delete-campaign').on('click', function () {
                    let container = $(this).closest('.card');
                    let campaign_id = container.find('input.campaign_product_id').val();

                    Swal.fire({
                        title: "{{ __('Do you want to delete this campaign?') }}",
                        showCancelButton: true,
                        confirmButtonText: 'Delete',
                        confirmButtonColor: '#dd3333',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.post('{{ route("admin.campaigns.delete.product") }}', {_token: '{{ csrf_token() }}', id: campaign_id}).then(function (data) {
                                if (data) {
                                    Swal.fire('Deleted!', '', 'success');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                }
                            });
                        }
                    });
                });

                $('#add_product_btn').on('click', function () {
                    let from_date = undefined;
                    let to_date = undefined;

                    if ($('#set_fixed_date').is(':checked')) {
                        from_date = $('#fixed_from_date').val();
                        to_date = $('#fixed_to_date').val();
                    }

                    $('#product_repeater_container').append(`
                        <div class="card border-primary mb-3" style="border: 1px solid">
                            <div class="card-header bg-transparent border-primary campaign-card-header">
                                <span>{{ __('Campaign Product') }}</span>
                                <span class="cross-btn"><i class="las la-times-circle"></i></span>
                            </div>
                            <div class="card-body">
                                <div class="form-group select_product">
                                    <label for="product_id">{{ __('Select Product') }}</label>
                                    <input type="hidden" name="product_id[]" class="product_id">
                                    <select id="product_id" class="form-control nice-select wide">
                                        @foreach ($all_products as $product)
                                            <option value="{{ $product->id }}" 
                                                data-price="{{ $product->price }}"
                                                data-sale_price="{{ $product->sale_price }}"
                                                data-stock="{{ optional($product->inventory)->stock_count ?? 0 }}"
                                            >
                                                {{ $product->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="original_price">{{ __('Original Price') }}</label>
                                            <input type="number" class="form-control original_price product_original_price" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="campaign_price">{{ __('Price for Campaign') }}</label>
                                            <input type="number" name="campaign_price[]" class="form-control campaign_price" step="0.01">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="available_num_of_units">{{ __('No. of Units Available') }}</label>
                                            <input type="number" class="form-control available_num_of_units" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="units_for_sale">{{ __('No. of Units for Sale') }}</label>
                                            <input type="number" name="units_for_sale[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="start_date">{{ __('Start Date') }}</label>
                                            <input type="text" name="start_date[]" class="form-control start_date flatpickr" ${from_date ? `value="${from_date}"` : ''}>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="end_date">{{ __('End Date') }}</label>
                                            <input type="text" name="end_date[]" class="form-control end_date flatpickr" ${to_date ? `value="${to_date}"` : ''}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    flatpickr(".flatpickr", {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d",
                    });
                    $('#product_repeater_container .nice-select').niceSelect('destroy');
                    $('#product_repeater_container .nice-select').niceSelect();
                });
            });
        })(jQuery)
    </script>
@endsection
