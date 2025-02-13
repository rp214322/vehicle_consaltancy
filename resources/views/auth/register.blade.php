@extends('layouts.app')

@section('content')
    <!-- Breadcrumb End -->
    <div class="breadcrumb-option set-bg" data-setbg="{{ asset('front/img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Join Us</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                            <span>Join Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- First Name -->
                        <div class="mb-3">
                            <label class="form-label"><b>First Name</b></label>
                            <input id="first_name" type="text"
                                class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                value="{{ old('first_name') }}" autofocus>
                            @error('first_name')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <!-- Last Name -->
                        <div class="mb-3">
                            <label class="form-label"><b>Last Name</b></label>
                            <input id="last_name" type="text"
                                class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                value="{{ old('last_name') }}">
                            @error('last_name')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <!-- Gender -->
                        <div class="mb-3">
                            <label class="form-label"><b>Gender</b></label>
                            <div class="input-group">
                                <select id="gender" class="form-control open @error('gender') is-invalid @enderror"
                                    name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <!-- Error message should be outside the select -->
                            @error('gender')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label"><b>Email</b></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label class="form-label"><b>Phone Number</b></label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label"><b>Password</b></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="text-danger d-block"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label"><b>Confirm Password</b></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-danger w-100 py-2">Join Us</button>

                        <a class="btn btn-link" href="{{ route('login') }}">Already have an account? Log in</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
