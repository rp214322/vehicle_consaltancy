@extends('layouts.app')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Forgot Password</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Forgot Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Forgot Password Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="contact__form">
                    <h3 class="text-center mb-5">Forgot Your Password?</h3>
                    <p class="text-center mb-4">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>

                    <!-- Flash Message -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <button type="submit" class="site-btn">Reset Password</button>
                    </form>

                    <div class="text-center mt-4">
                        <p>
                            Remember your password?
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
<!-- Forgot Password Section End -->


@endsection
