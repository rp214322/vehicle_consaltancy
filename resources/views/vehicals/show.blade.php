@extends('layouts.app')
@section('content')
    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{!! $vehical->brand->name !!} {!! $vehical->vehical_model->name !!} {!! $vehical->title !!}</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <a href="{{ route('vehicals.list') }}">Vehicals</a>
                            <span>{!! $vehical->brand->name !!} {!! $vehical->vehical_model->name !!} {!! $vehical->title !!}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Car Details Section Begin -->
    <section class="car-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="car__details__pic">
                        <div class="car__details__pic__large">
                            <img class="car-big-img" src="{{  $vehical->feature_image()->exists() ? $vehical->feature_image()->first()->file_url() : asset('front/img/no_image.png') }}" alt="">
                        </div>
                        <div class="car-thumbs">
                            <div class="car-thumbs-track car__thumb__slider owl-carousel">
                                @foreach ($vehical->gallery as $photo)
                                    <div class="ct" data-imgbigurl="{{ $photo->file_url() }}"><img
                                            src="{{ $photo->file_url('thumb') }}" alt=""></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="car__details__tab">
                        <ul class="nav nav-tabs justify-content-around" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">Technical</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Features & Options</a>
                            </li>
                        </ul>
                    
                        <div class="tab-content">
                        <!-- Technical Tab -->
                        <div class="tab-pane active" id="tabs-2" role="tabpanel">
                            <div class="car__details__tab__info">
                                @if (strip_tags($vehical->technical) != $vehical->technical)
                                    {{-- Render raw HTML if content has tags --}}
                                    {!! $vehical->technical !!}
                                @else
                                    {{-- Plain text fallback --}}
                                    <p>{{ $vehical->technical }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Features & Options Tab -->
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="car__details__tab__info">
                                @if (stripos($vehical->feature_option, '<ul') !== false)
                                    {{-- Render as grid list if it contains <ul> --}}
                                    <div class="row">
                                        @php
                                            // Extract <li> elements as array using DOM
                                            $dom = new DOMDocument();
                                            libxml_use_internal_errors(true);
                                            $dom->loadHTML('<html><body>' . $vehical->feature_option . '</body></html>');
                                            $lis = $dom->getElementsByTagName('li');
                                            $items = [];
                                            foreach ($lis as $li) {
                                                $items[] = $li->nodeValue;
                                            }
                                        @endphp

                                        @foreach(array_chunk($items, ceil(count($items)/2)) as $column)
                                            <div class="col-md-6">
                                                <ul class="custom-feature-list">
                                                    @foreach($column as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    {{-- Just show paragraph --}}
                                    <p>{{ $vehical->feature_option }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>                    
                </div>
                <div class="col-lg-3">
                    <div id="flashMessageContainer"></div>
                    <div class="car__details__sidebar">
                        <div class="car__details__sidebar__model">
                            <ul>
                                <li>Brand <span>{!! $vehical->brand->name !!}</span></li>
                                <li>Model <span>{!! $vehical->vehical_model->name !!}</span></li>
                                <li>Color <span>{!! $vehical->color !!}</span></li>
                                <li>Fuel Type <span>{!! App\Models\Vehical::$fules[$vehical->fuel] !!}</span></li>
                                <li>Mileage <span>{!! $vehical->mileage !!} / KM</span></li>
                                <li>Price <span>{!! $vehical->price !!}</span></li>
                            </ul>
                            <a href="#" class="primary-btn">
                                Make an Offer
                            </a>
                            @if(Auth::check())
                                <a href="#InquiryModel" data-toggle="modal" data-target="#InquiryModel" class="primary-btn">
                                    Express Purchase
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="primary-btn">
                                    Book Test Drive
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Car Details Section End -->
    <div class="modal fade bs-example-modal-lg" id="InquiryModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <form action="javascript:;" method="post" id="InquiryForm">
                    @csrf
                    <input type="hidden" name="vehical_id" value="{!! $vehical->id !!}"> <!-- Vehicle ID included -->
                
                    <div class="modal-header">
                        <h5 class="modal-title">Place Your Inquiry</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="modal_form">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" 
                                       value="{!! Auth::check() ? Auth::user()->first_name . ' ' . Auth::user()->last_name : '' !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" 
                                       value="{!! Auth::check() ? Auth::user()->email : '' !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" 
                                       value="{!! Auth::check() ? Auth::user()->phone : '' !!}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" placeholder="Description" required></textarea>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="javascript:;" class="btn btn-primary place_inquiry">Submit</a>
                    </div>
                </form>                
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(".place_inquiry").on("click", function (e) {
            var _form = jQuery("#InquiryForm");
            jQuery('#preloder, .loader').show();
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "{!! route('store.inquiry') !!}", // Using single API
                data: _form.serialize(),
            })
            .done(function (response) {
                jQuery('#preloder, .loader').hide();
                jQuery("#InquiryModel").modal('hide');
                // Display success message in a flash message
                var successMessage = '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                    + response.message
                    + '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    + '<span aria-hidden="true">&times;</span></button></div>';

                jQuery("#flashMessageContainer").html(successMessage);

            })
            .fail(function (error) {
                jQuery('#preloder, .loader').hide();
                _form.find(".has-error").remove();
                var response = JSON.parse(error.responseText);

                $.each(response.errors, function (key, value) {
                    var input = '[name=' + key + ']';
                    if (_form.find(input).parent().find(".has-error").length === 0) {
                        _form.find(input).parent().append("<span class='has-error'>" + value + "</span>");
                    } else {
                        _form.find(input).parent().find('.has-error').html(value);
                    }
                });
            });
        });

        jQuery(".favouriteVehical").on("click",function(e){
            jQuery('#preloder, .loader').show();
            e.preventDefault();
            var url = jQuery(this).data('href');
            $.ajax({
                type: "GET",
                url: url,
            })
            .done(function (data) {
                console.log(data);
                jQuery('#preloder, .loader').hide();
            }).fail(function (error) {
                jQuery('#preloder, .loader').hide();
                console.log(error);
            });
        });
    });
</script>
@endsection
