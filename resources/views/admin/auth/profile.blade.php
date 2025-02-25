@extends('admin.layouts.guest')

@section('styles')
    <style>
        .login-page {
            background-color: #f8f9fa;
        }

        .login-wrap {
            min-height: calc(100vh - 60px);
        }

        .card-box {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-photo {
            position: relative;
        }

        .profile-photo .edit-avatar {
            position: absolute;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }

        .profile-photo .edit-avatar input {
            display: none;
        }

        .avatar-photo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 3px solid #ddd;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <!-- Back Button -->
        <div class="mb-3">
            <button class="btn btn-secondary" onclick="history.back()">
                <i class="fa fa-arrow-left"></i> Back
            </button>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                <div class="card-box height-100-p pd-20">
                    <div class="profile-photo text-center">
                        </label>
                        <img id="profileImagePreview"
                            src="{{ asset(Auth::user()->image ? Auth::user()->image : 'images/Default_image.jpg') }}"
                            alt="Profile Photo"
                            class="avatar-photo img-fluid rounded-circle shadow-sm" />
                        <h5 class="text-center h5 mt-3">{{ Auth::user()->first_name }}</h5>
                    </div>

                    <div class="profile-info mt-3">
                        <h5 class="mb-3 text-blue">Contact Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
                            <li><strong>Phone:</strong> {{ Auth::user()->phone ?? 'Not Available' }}</li>
                            <li><strong>Country:</strong> <span
                                    id="userCountry">{{ Auth::user()->country ?? 'Not Set' }}</span></li>
                            <li><strong>State/Province:</strong> <span
                                    id="userState">{{ Auth::user()->state ?? 'Not Set' }}</span></li>
                            <li><strong>Address:</strong> {{ Auth::user()->address ?? 'Not Set' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12 mb-30">
                <div class="card-box height-100-p overflow-hidden">
                    <div class="profile-tab height-100-p">
                        <div class="tab-content p-3">
                            <div class="tab-pane fade show active" id="setting">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form method="POST" action="{{ route('admin.post.profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name"
                                                value="{{ old('first_name', Auth::user()->first_name) }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name', Auth::user()->last_name) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email', Auth::user()->email) }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Country</label>
                                            <select class="form-control" name="country" id="countrySelect">
                                                <option value="">Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>State/Province</label>
                                            <select class="form-control" name="state" id="stateSelect">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ old('phone', Auth::user()->phone) }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob" class="form-control"
                                                value="{{ old('dob', Auth::user()->dob ? Auth::user()->dob->format('Y-m-d') : '') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label>Address</label>
                                            <textarea class="form-control" name="address">{{ old('address', Auth::user()->address) }}</textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>Profile Photo</label>
                                            <input type="file" class="form-control" name="image" accept="image/*">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Update Information</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- Tab Pane End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById("profileImageUpload").addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profileImagePreview").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            const countrySelect = $("#countrySelect");
            const stateSelect = $("#stateSelect");
            const phoneInput = $("input[name='phone']");
            const geonamesUsername = "ritesh10_shivlab"; // Replace with your Geonames username

            // Fetch all countries and filter only Canada & India
            fetch("https://restcountries.com/v3.1/all")
                .then(response => response.json())
                .then(data => {
                    countrySelect.empty().append('<option value="">Select Country</option>');

                    // Filter only Canada & India
                    const filteredCountries = data.filter(country => country.cca2 === "CA" || country.cca2 ===
                        "IN");

                    filteredCountries.forEach(country => {
                        const countryName = country.name.common;
                        const countryCode = country.cca2;
                        const geonameId = countryCode === "CA" ? 6251999 :
                            1269750; // Canada & India geoname IDs

                        countrySelect.append(
                            `<option value="${countryCode}" data-geonameid="${geonameId}">${countryName}</option>`
                        );
                    });

                    // Set the user's country if available
                    const userCountry = $("#userCountry").text().trim();
                    if (userCountry && userCountry !== 'Not Set') {
                        countrySelect.find(`option:contains("${userCountry}")`).prop('selected', true).trigger(
                            'change');
                    }

                    countrySelect.select2({
                        theme: 'bootstrap4',
                        width: '100%',
                        placeholder: 'Select Country'
                    });
                })
                .catch(error => console.error("API Error (Countries):", error));

            countrySelect.on("change", function() {
                const selectedCountryCode = $(this).val();
                stateSelect.empty().append('<option value="">Select State</option>');

                if (selectedCountryCode) {
                    const selectedGeonameId = $(this).find(":selected").data("geonameid");
                    fetchStates(selectedGeonameId);
                }

                stateSelect.select2({
                    theme: 'bootstrap4',
                    width: '100%',
                    placeholder: 'Select State'
                });
            });

            function fetchStates(geonameId) {
                if (!geonameId) return;

                fetch(`http://api.geonames.org/childrenJSON?geonameId=${geonameId}&username=${geonamesUsername}`)
                    .then(response => response.json())
                    .then(data => {
                        stateSelect.empty().append('<option value="">Select State</option>');

                        if (data.geonames.length > 0) {
                            data.geonames.forEach(state => {
                                stateSelect.append(
                                    `<option value="${state.name}">${state.name}</option>`);
                            });

                            const userState = $("#userState").text().trim();
                            if (userState && userState !== 'Not Set') {
                                stateSelect.find(`option:contains("${userState}")`).prop('selected', true)
                                    .trigger('change');
                            }
                        } else {
                            console.warn("No states found for:", geonameId);
                        }
                    })
                    .catch(error => console.error("API Error (States):", error));
            }

            console.log("Country, State, and Phone script initialized");
        });
    </script>
@endsection
