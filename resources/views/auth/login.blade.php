@extends('layouts.app')

@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Login</h2>
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Login Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">

                <!-- Flash Messages -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="contact__form">
                    <h3 class="text-center mb-5">Login to Your Account</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="text-center mb-3">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" 
                                    style="color: #007bff; text-decoration: none; transition: all 0.3s ease-in-out;"
                                    onmouseover="this.style.textDecoration='underline'; this.style.color='#ff6600';"
                                    onmouseout="this.style.textDecoration='none'; this.style.color='#007bff';">
                                    Forgot your password?
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="site-btn">Login</button>
                    </form>

                    <div class="text-center mt-4">
                        <p>Don't have an account? 
                            <a href="{{ route('register') }}" 
                                style="color: #007bff; text-decoration: none; transition: all 0.3s ease-in-out;" 
                                onmouseover="this.style.textDecoration='underline'; this.style.color='#ff6600';"
                                onmouseout="this.style.textDecoration='none'; this.style.color='#007bff';">
                                Register here
                            </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Login Section End -->


@endsection
