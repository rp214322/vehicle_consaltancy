@extends('layouts.app')
@section('content')
    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Begin -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="contact__text">
                <div class="section-title">
                  <h2>Let’s Work Together</h2>
                  <p>
                    To make requests for further information, contact us via our
                    social channels.
                  </p>
                </div>
                <ul>
                  <li><span>Email:</span> info@hvac.com</li>
                  <li><span>Contact:</span> +91 701 6590 780</li>
                  <li>
                    <span>Address:</span> 625 Titanium Square, Thaltej, Ahmedabad,
                    Gujarat, India
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="contact__form">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
              @endif
              @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <form action="{{ route('send.inquiry') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
                    </div>
                    <div class="col-lg-6">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
                    </div>
                </div>
                <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required />
                <textarea name="message" placeholder="Your Question" required>{{ old('message') }}</textarea>
                <button type="submit" class="site-btn">Submit Now</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact Section End -->
@endsection
