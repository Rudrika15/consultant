@extends('layouts.visitorApp')
@section('content')
    <div style="background-color: #F7F8FA;">
        <div class="about">
            <h3 class="contacttext ms-lg-5">Contact Us</h3>
            <img class="img" src="{{ asset('visitors/images/Backgroung-Web-banner-.png') }}" alt="" width="100%"
                height="300px">
        </div>
        <div class="grid pt-4">
            <div class="container">
                <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
                <span class="span_arrow">/</span>
                <a href="{{ route('visitors.contactus') }}" class="about_us_link">CONTACT US</a>
            </div>
        </div>

        <div class="container">
            <div class="d-flex justify-content-center mt-5 mb-5 gap-5">
                <div class="card contact_card">
                    <div class="card-body mb-5">
                        <div class="phone">
                            <i class="fa fa-phone phoneicon"></i>
                        </div>
                        <div class="card-text text-center">
                            <p class="phone_font fw-bold">Phone</p>
                        </div>
                        <div class="card-text text-center">
                            <p class="phoneno">9632587412</p>
                        </div>
                    </div>
                </div>
                <div class="card contact_card">
                    <div class="card-body mb-5">
                        <div class="phone text-center">
                            <i class="fa fa-phone phoneicon"></i>
                        </div>
                        <div class="card-text text-center">
                            <p class="phone_font fw-bold">Email</p>
                        </div>
                        <div class="card-text text-center">
                            <p class="emailid">consultantcube123@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="card contact_card">
                    <div class="card-body mb-5">
                        <div class="phone text-center">
                            <i class="fa fa-phone phoneicon"></i>
                        </div>
                        <div class="card-text text-center">
                            <p class="phone_font fw-bold">Address</p>
                        </div>
                        <div class="card-text text-center">
                            <p class="address">1017 , Shilp Epitome, behind Rajpath club, off Sindhu bhavan road, Ahmedabad
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
