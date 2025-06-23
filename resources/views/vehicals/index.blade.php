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
                <div class="col-lg-3">
                    <div class="car__sidebar">
                      <div class="car__filter">
                        <h5>Vehicle Filter</h5>
                        <form id="searchForm" action="{!! route('vehicals.list') !!}" method="GET">
                          <div class="filter-row">
                            <select id="CategoryId" name="category_id">
                                <option value="">Select Category</option>
                                @foreach (App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}" data-slug="{{ Str::slug($category->name) }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <select id="BrandId" name="brand_id">
                                <option value="">Select Brand</option>
                            </select>
                            <select id="ModelId" name="model_id">
                                <option value="">Select Model</option>
                            </select>
                          </div>
                          <div class="filter-row">
                            <select id="year" name="year">
                                <option value="">Select Year</option>
                                @for ($i = 0; $i < 15; $i++)
                                    <option>{!! Carbon\Carbon::now()->subYear($i)->format('Y') !!}</option>
                                @endfor
                            </select>
                            <select name="fuel" id="fuel" class="form-control" required>
                                <option value="">Select Fuel</option>
                                @foreach (App\Models\Vehical::$fules as $key => $value)
                                <option value="{!! $key !!}">{!! $value !!}</option>
                                @endforeach
                            </select>
                            <div class="filter-price">
                              <p>Price:</p>
                              <div class="price-range-wrap">
                                <div class="filter-price-range"></div>
                                <div class="range-slider">
                                  <div class="price-input">
                                    <input type="text" id="amount" name="price">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="car__filter__btn">
                            <button type="submit" class="site-btn">Search</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>                  
                  <div class="col-lg-9">
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
                                            <h5><a href="{!! route('vehical.show',$vehical->slug) !!}">{!! $vehical->brand->name !!} {!! $vehical->vehical_model->name !!} {!! $vehical->title !!}</a></h5>
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
                $("#amount").val("[ " + "₹" + ui.values[0] + " - ₹" + ui.values[1] + " ]");
            }
        });
        $("#amount").val("[ " + "₹" + $(".filter-price-range").slider("values", 0) + " - ₹" + $(".filter-price-range").slider("values", 1) + " ]");

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
    $(document).ready(function() {
    var fetchData = "{!! route('fetchData') !!}";

    // Fetch brands based on selected category
    $('#CategoryId').on('change', function() {
        var categoryId = $(this).val();
        $('#BrandId').html('<option value="">Loading...</option>').prop('disabled', true);
        $('#ModelId').html('<option value="">Select Model</option>').prop('disabled', true);

        if (categoryId) {
            $.ajax({
                url: fetchData,
                type: "GET",
                data: { id: categoryId, type: "brand" },
                success: function(response) {
                    $('#BrandId').html(response).prop('disabled', false);
                    
                    // Debugging
                    console.log("Brand Options Loaded:", response);

                    if ($.fn.niceSelect) {
                        $('#BrandId').niceSelect('destroy').niceSelect();
                    }
                },
                error: function() {
                    $('#BrandId').html('<option value="">Error Loading Brands</option>').prop('disabled', false);
                }
            });
        }
    });

    // Fetch models based on selected brand
    $('#BrandId').on('change', function() {
        var brandId = $(this).val();
        $('#ModelId').html('<option value="">Loading...</option>').prop('disabled', true);

        if (brandId) {
            $.ajax({
                url: fetchData,
                type: "GET",
                data: { id: brandId, type: "model" },
                success: function(response) {
                    $('#ModelId').html(response).prop('disabled', false);
                    
                    // Debugging
                    console.log("Model Options Loaded:", response);

                    if ($.fn.niceSelect) {
                        $('#ModelId').niceSelect('destroy').niceSelect();
                    }
                },
                error: function() {
                    $('#ModelId').html('<option value="">Error Loading Models</option>').prop('disabled', false);
                }
            });
        }
    });

    // Handle form submission
    $('#searchForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var categorySlug = $('#CategoryId option:selected').data('slug') || "";
        var brandSlug = $('#BrandId option:selected').data('slug') || "";
        var modelSlug = $('#ModelId option:selected').data('slug') || "";
        var year = $('#year').val() || "";
        var fuel = $('#fuel').val() || "";
        var price = $('#amount').val() || "";

        // Debugging Slug Values
        console.log("Category Slug:", categorySlug);
        console.log("Brand Slug:", brandSlug);
        console.log("Model Slug:", modelSlug);

        // Construct the final URL
        var url = "{!! route('vehicals.list') !!}?category=" + categorySlug + 
                  "&brand=" + brandSlug + 
                  "&model=" + modelSlug + 
                  "&year=" + year + 
                  "&fuel=" + fuel + 
                  "&price=" + encodeURIComponent(price);

        // Debugging: Store URL in sessionStorage for post-redirect logs
        sessionStorage.setItem('debug_url', url);
        console.log("Redirecting to:", url);

        // Redirect to the correct URL
        window.location.href = url;
    });

    // Retrieve previous search URL for debugging after redirect
    console.log("Previous Search URL:", sessionStorage.getItem('debug_url'));
    
    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    // Restore values from URL
    var selectedCategory = getQueryParam("category");
    var selectedBrand = getQueryParam("brand");
    var selectedModel = getQueryParam("model");
    var selectedYear = getQueryParam("year");
    var selectedFuel = getQueryParam("fuel");
    var selectedPrice = getQueryParam("price");

    if (selectedCategory) {
        $("#CategoryId option").each(function () {
            if ($(this).data("slug") === selectedCategory) {
                $(this).prop("selected", true);
            }
        });
    }

    if (selectedBrand) {
        $("#BrandId option").each(function () {
            if ($(this).data("slug") === selectedBrand) {
                $(this).prop("selected", true);
            }
        });
    }

    if (selectedModel) {
        $("#ModelId option").each(function () {
            if ($(this).data("slug") === selectedModel) {
                $(this).prop("selected", true);
            }
        });
    }

    if (selectedYear) {
        $("#year").val(selectedYear);
    }

    if (selectedFuel) {
        $("#fuel").val(selectedFuel);
    }

    if (selectedPrice) {
        $("#amount").val(selectedPrice);
    }

    // Reinitialize niceSelect if used
    if ($.fn.niceSelect) {
        $("#CategoryId, #BrandId, #ModelId, #year, #fuel").niceSelect("destroy").niceSelect();
    }
});
</script>
@endsection
