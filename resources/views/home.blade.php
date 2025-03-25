@extends('layouts.app')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="{!! asset('front/img/hero-bg.jpg') !!}">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero__text">
                        <div class="hero__text__title">
                            <span>FIND YOUR DREAM CAR</span>
                            <h2>Porsche Cayenne S</h2>
                        </div>
                        <div class="hero__text__price">
                            <div class="car-model">Model 2019</div>
                            <h2>₹2 CR</h2>
                        </div>
                        <a href="{!! route('vehicals.list') !!}" class="primary-btn"><img src="{!! asset('front/img/wheel.png') !!}" alt=""> Test Drive</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="hero__tab">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-2" role="tabpanel">
                                <div class="hero__tab__form">
                                    <h2>Search Your Dream</h2>
                                    <form id="searchForm" action="{!! route('vehicals.list') !!}" method="GET">
                                        <div class="select-list">
                                            <div class="select-list-item">
                                                <p>Select Category</p>
                                                <select id="CategoryId" name="category_id">
                                                    <option value="">Select Category</option>
                                                    @foreach (App\Models\Category::all() as $category)
                                                        <option value="{{ $category->id }}" data-slug="{{ Str::slug($category->name) }}">
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Brand</p>
                                                <select id="BrandId" name="brand_id">
                                                    <option value="">Select Brand</option>
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Model</p>
                                                <select id="ModelId" name="model_id">
                                                    <option value="">Select Model</option>
                                                </select>
                                            </div>
                                            <div class="select-list-item">
                                                <p>Select Year</p>
                                                <select id="year" name="year">
                                                    <option value="">Select Year</option>
                                                    @for ($i = 0; $i < 15; $i++)
                                                        <option>{!! Carbon\Carbon::now()->subYear($i)->format('Y') !!}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="car-price">
                                            <p>Price Range:</p>
                                            <div class="price-range-wrap">
                                                <div class="price-range"></div>
                                                <div class="range-slider">
                                                    <div class="price-input">
                                                        <input type="text" id="amount" name="price">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="site-btn">Search</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <div class="section-title">
                <span>Our Services</span>
                <h2>What We Offers</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor
                </p>
            </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="services__item">
                <img src="{{ asset('front/img/services/services-2.png') }}" alt="Buying A Cars" />
                <h5>Buying A Cars</h5>
                <p>
                Consectetur adipiscing elit incididunt ut labore et dolore magna
                aliqua. Risus commodo viverra maecenas.
                </p>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="services__item">
                <img src="{{ asset('front/img/services/services-3.png') }}" alt="Car Maintenance" />
                <h5>Car Maintenance</h5>
                <p>
                Consectetur adipiscing elit incididunt ut labore et dolore magna
                aliqua. Risus commodo viverra maecenas.
                </p>
            </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="services__item">
                <img src="{{ asset('front/img/services/services-4.png') }}" alt="Support 24/7" />
                <h5>Support 24/7</h5>
                <p>
                Consectetur adipiscing elit incididunt ut labore et dolore magna
                aliqua. Risus commodo viverra maecenas.
                </p>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Feature Section Begin -->
    <section class="feature spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature__text">
                        <div class="section-title">
                            <span>Our Feature</span>
                            <h2>We Are a Trusted Name In Auto</h2>
                        </div>
                        <div class="feature__text__desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>
                        <div class="feature__text__btn">
                            <a href="{!! route('about') !!}" class="primary-btn">About Us</a>
                            <a href="{!! route('about') !!}" class="primary-btn partner-btn">Our Partners</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-1.png') }}" alt="">
                                </div>
                                <h6>Engine</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-2.png') }}" alt="">
                                </div>
                                <h6>Turbo</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-3.png') }}" alt="">
                                </div>
                                <h6>Colling</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-4.png') }}" alt="">
                                </div>
                                <h6>Suspension</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-5.png') }}" alt="">
                                </div>
                                <h6>Electrical</h6>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-6">
                            <div class="feature__item">
                                <div class="feature__item__icon">
                                    <img src="{{ asset('front/img/feature/feature-6.png') }}" alt="">
                                </div>
                                <h6>Brakes</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Section End -->

    <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Vehicle</span>
                        <h2>Best Vehicle Offers</h2>
                    </div>
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Most Researched</li>
                        <li data-filter=".sale">Latest on Sale</li>
                    </ul>
                </div>
            </div>
            <div class="row car-filter">
                @php
                    $mostPopular = App\Models\Vehical::orderByDesc('created_at')->limit(4)->get();
                    $latestOnSale = App\Models\Vehical::where('status', 0)->orderByDesc('created_at')->limit(4)->get();
                @endphp

                @foreach ($mostPopular as $vehical)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix">
                        <div class="car__item">
                            <div class="car__item__pic__slider owl-carousel">
                                @foreach ($vehical->gallery as $photo)
                                    <img src="{{ $photo->file_url('thumb') }}" alt="">
                                @endforeach
                            </div>
                            <div class="car__item__text">
                                <div class="car__item__text__inner">
                                    <div class="label-date">{!! $vehical->year !!}</div>
                                    <h5><a href="{!! route('vehical.show', $vehical->slug) !!}">{!! $vehical->title !!}</a></h5>
                                    <ul>
                                        <li><span>{!! $vehical->color !!}</span></li>
                                        <li>{!! App\Models\Vehical::$fules[$vehical->fuel] !!}</li>
                                        <li><span>{!! $vehical->mileage !!}</span> km</li>
                                    </ul>
                                </div>
                                <div class="car__item__price">
                                    <span class="car-option">{!! $vehical->status ? "Sold" : "For sale" !!}</span>
                                    <h6>₹{!! $vehical->price !!}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($latestOnSale as $vehical)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix sale">
                        <div class="car__item">
                            <div class="car__item__pic__slider owl-carousel">
                                @foreach ($vehical->gallery as $photo)
                                    <img src="{{ $photo->file_url('thumb') }}" alt="">
                                @endforeach
                            </div>
                            <div class="car__item__text">
                                <div class="car__item__text__inner">
                                    <div class="label-date">{!! $vehical->year !!}</div>
                                    <h5><a href="{!! route('vehical.show', $vehical->slug) !!}">{!! $vehical->title !!}</a></h5>
                                    <ul>
                                        <li><span>{!! $vehical->color !!}</span></li>
                                        <li>{!! App\Models\Vehical::$fules[$vehical->fuel] !!}</li>
                                        <li><span>{!! $vehical->mileage !!}</span> km</li>
                                    </ul>
                                </div>
                                <div class="car__item__price">
                                    <span class="car-option">{!! $vehical->status ? "Sold" : "For sale" !!}</span>
                                    <h6>₹{!! $vehical->price !!}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Car Section End -->

    <!-- Chooseus Section Begin -->
    <section class="chooseus spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="chooseus__text">
                        <div class="section-title">
                            <h2>Why People Choose Us</h2>
                            <p>Duis aute irure dolorin reprehenderits volupta velit dolore fugiat nulla pariatur
                                excepteur sint occaecat cupidatat.</p>
                        </div>
                        <ul>
                            <li><i class="fa fa-check-circle"></i> Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</li>
                            <li><i class="fa fa-check-circle"></i> Integer et nisl et massa tempor ornare vel id orci.
                            </li>
                            <li><i class="fa fa-check-circle"></i> Nunc consectetur ligula vitae nisl placerat tempus.
                            </li>
                            <li><i class="fa fa-check-circle"></i> Curabitur quis ante vitae lacus varius pretium.</li>
                        </ul>
                        <a href="#" class="primary-btn">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="chooseus__video set-bg">
            <img src="{{ asset('front/img/chooseus-video.png') }}" alt="">
            <a href="https://www.youtube.com/watch?v=Xd0Ok-MkqoE"
                class="play-btn video-popup"><i class="fa fa-play"></i></a>
        </div>
    </section>
    <!-- Chooseus Section End -->
    <!-- Cta Begin -->
    <section class="latest spad">
        <div class="cta">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                <div class="cta__item set-bg" data-setbg="{{ asset('front/img/cta/cta-1.jpg') }}">
                    <h4>Do You Want To Buy A Vehicle</h4>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod
                    </p>
                </div>
                </div>
                <div class="col-lg-6 col-md-6">
                <div class="cta__item set-bg" data-setbg="{{ asset('front/img/cta/cta-2.jpg') }}">
                    <h4>Do You Want To Sell A Vehicle</h4>
                    <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Cta End -->
@endsection
@section('scripts')
<script>
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
                  "&price=" + encodeURIComponent(price);

        // Debugging: Store URL in sessionStorage for post-redirect logs
        sessionStorage.setItem('debug_url', url);
        console.log("Redirecting to:", url);

        // Redirect to the correct URL
        window.location.href = url;
    });

    // Retrieve previous search URL for debugging after redirect
    console.log("Previous Search URL:", sessionStorage.getItem('debug_url'));
});
</script>
@endsection
