@extends('layouts.app')
@section('content')
    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Vehical Listing</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Vehical</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="car__sidebar">
                      <div class="car__filter">
                        <h5>Vehicle Filter</h5>
                        <form action="#">
                          <div class="filter-row">
                            <select>
                              <option data-display="Category">Select Category</option>
                              <option value="">Acura</option>
                              <option value="">Audi</option>
                              <option value="">Bentley</option>
                              <option value="">BMW</option>
                              <option value="">Bugatti</option>
                            </select>
                            <select>
                              <option data-display="Brand">Select Brand</option>
                              <option value="">Q3</option>
                              <option value="">A4</option>
                              <option value="">AVENTADOR</option>
                            </select>
                            <select>
                              <option data-display="Model">Select Model</option>
                              <option value="">Q3</option>
                              <option value="">A4</option>
                              <option value="">AVENTADOR</option>
                            </select>
                          </div>
                  
                          <div class="filter-row">
                            <select>
                              <option data-display="Year">Select Year</option>
                              <option value="">2021</option>
                              <option value="">2022</option>
                              <option value="">2023</option>
                            </select>
                            <select>
                              <option data-display="Fuel Type">Select Fuel Type</option>
                              <option value="">Petrol</option>
                              <option value="">Diesel</option>
                              <option value="">Electric</option>
                            </select>
                            <div class="filter-price">
                              <p>Price:</p>
                              <div class="price-range-wrap">
                                <div class="filter-price-range"></div>
                                <div class="range-slider">
                                  <div class="price-input">
                                    <input type="text" id="filterAmount" />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                  
                          <div class="car__filter__btn">
                            <button type="submit" class="site-btn">Reset Filter</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>                  
                  <div class="col-lg-12">
                    <div class="car__filter__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item">
                                    <h6>Show On Page</h6>
                                    <select id="perPage">
                                        <option value="{!! route('vehicals.list',array_merge(request()->query(), ['per_page' => 10])) !!}" {!! $request->per_page == 10 ? 'selected' : '' !!}>10</option>
                                        <option value="{!! route('vehicals.list',array_merge(request()->query(), ['per_page' => 50])) !!}" {!! $request->per_page == 50 ? 'selected' : '' !!}>50</option>
                                        <option value="{!! route('vehicals.list',array_merge(request()->query(), ['per_page' => 100])) !!}" {!! $request->per_page == 100 ? 'selected' : '' !!}>100</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="car__filter__option__item car__filter__option__item--right">
                                    <h6>Sort By</h6>
                                    <select id="sortBy">
                                        <option value="{!! route('vehicals.list',array_merge(request()->query(), ['sort_by' => 'desc'])) !!}" {!! $request->sort_by == "DESC" ? 'selected' : '' !!}>Price: Highest Fist</option>
                                        <option value="{!! route('vehicals.list',array_merge(request()->query(), ['sort_by' => 'asc'])) !!}" {!! $request->sort_by == "ASC" ? 'selected' : '' !!}>Price: Lowest Fist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($vehicals as $vehical)
                            <div class="col-lg-4 col-md-4">
                                <div class="car__item">
                                    <div class="car__item__pic__slider owl-carousel">
                                        @foreach ($vehical->gallery as $photo)
                                            <img src="{{ $photo->file_url('thumb') }}" alt="">
                                        @endforeach
                                    </div>
                                    <div class="car__item__text">
                                        <div class="car__item__text__inner">
                                            <div class="label-date">{!! $vehical->year !!}</div>
                                            <h5><a href="{!! route('vehical.show',$vehical->slug) !!}">{!! $vehical->title !!}</a></h5>
                                            <ul>
                                                <li><span>{!! $vehical->color !!}</span></li>
                                                <li>{!! App\Models\Vehical::$fules[$vehical->fuel] !!}</li>
                                                <li><span>{!! $vehical->mileage !!}</span> km</li>
                                            </ul>
                                        </div>
                                        <div class="car__item__price">
                                            <span class="car-option">{!! $vehical->status ? "Sold" : "For sale" !!}</span>
                                            <h6>₹ {!! $vehical->price !!}</h6>
                                            <a class="favouriteVehical" data-href="{!! route('favourite.vehical',$vehical->id) !!}"><i class="fa {!! in_array($vehical->id,$favourite_vehicals) ? 'fa-heart' : 'fa-heart-o' !!}"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $vehicals->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Car Section End -->
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function(){
        var filterSlider = $(".filter-price-range");
        filterSlider.slider({
            range: true,
            min: 1,
            max: 10000000,
            values: [2000000, 5000000],
            slide: function (event, ui) {
                $("#filterAmount").val("[ " + "₹" + ui.values[0] + " - ₹" + ui.values[1] + " ]");
            }
        });
        $("#filterAmount").val("[ " + "₹" + $(".filter-price-range").slider("values", 0) + " - ₹" + $(".filter-price-range").slider("values", 1) + " ]");

        jQuery("#perPage, #sortBy").on('change',function(){
            window.location.href = jQuery(this).val();
        });

        jQuery(".favouriteVehical").on("click",function(e){
            jQuery('#preloder, .loader').show();
            e.preventDefault();
            var _this = jQuery(this);
            $.ajax({
                type: "GET",
                url: _this.data('href'),
            })
            .done(function (data) {
                jQuery(_this).find("i").toggleClass('fa-heart-o').toggleClass('fa-heart');
                jQuery('#preloder, .loader').hide();
            }).fail(function (error) {
                jQuery('#preloder, .loader').hide();
                console.log(error);
            });
        });
    });
</script>
@endsection
