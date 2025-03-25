@extends('layouts.app')

@section('content')

    <!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Register</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Register Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="contact__form">
                    <h3 class="text-center mb-5">Create an Account</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <input id="first_name" type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                            placeholder="First Name">
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="last_name" type="text" name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}"
                            placeholder="Last Name">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="email" type="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="phone" type="text" name="phone"
                            class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                            placeholder="Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password-confirm" type="password" name="password_confirmation"
                            class="form-control" placeholder="Confirm Password">

                        <button type="submit" class="site-btn">Register</button>
                    </form>

                    <div class="text-center mt-4">
                        <p>
                            Already have an account?
                            <a href="{{ route('login') }}"
                                style="color: #007bff; text-decoration: none; transition: all 0.3s ease-in-out;"
                                onmouseover="this.style.textDecoration='underline'; this.style.color='#ff6600';"
                                onmouseout="this.style.textDecoration='none'; this.style.color='#007bff';">
                                Login here
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Register Section End -->


@endsection
