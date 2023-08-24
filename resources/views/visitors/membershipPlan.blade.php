@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="membership">
        <h3 class="membertext ms-lg-5">Membership Plan</h3>
        <img class="img" src="{{ asset('visitors/images/Backgroung-Web-banner-.png') }}" alt="" width="100%"
            height="300px">
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
            <span class="span_arrow">/</span>
            <a href="{{ route('visitors.membershipPlan') }}" class="membership_link">MEMBERSHIP PLAN</a>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row mb-5">
        @foreach ($adminpackage as $adminpackage)
        <div class="col-lg-4">
            <div class="card membercard shadow p-3 mb-5 bg-body rounded">
                <div class="card-body text-center">
                    <h3 class="card-title text-center" id="adminpackage-title">{{$adminpackage->title}}<hr></h3>
                    <h4 class="card-title text-center" id="adminpackage-price">{{$adminpackage->price}}</h4>

                    {{-- <i class="fa fa-check"></i> --}}
                    <p class="card-text mt-5">{!!$adminpackage->details!!}</p>
                    <a href="#" class="btn btn-primary mb-5 mt-5">Apply Now</a>
                </div>
            </div>
        </div>
        @endforeach
        
        </div>
    </div>
    {{-- All Panls Include --}}
    <div class="container allplan">
        <div class="text-center mt-5">
            <h1>All Plans Include</h1>
            <h5>Bring your people together under your brand on your terms !</h5>
        </div>
        <div class="d-flex justify-content-center cardgap gap-lg-3 mt-lg-5 flex-wrap">
            <div class="card allplancard shadow p-3 mb-5 bg-gray rounded mt-5">
                <div class="card-body">
                    <a href="{{route('visitor.profile')}}" style="text-decoration: none;color:black;">
                    <img  class="text-center profile-access-user-img" src="{{asset('visitors/images/profile_access_user.png')}}">
                    <h5 class="card-text text-center">Profile Access</h5>
                    </a>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-gray rounded mt-lg-5">
                <div class="card-body">
                    <img src="{{asset('visitors/images/windows_img.png')}}" alt="" class="category_img">
                    <h5 class="card-text text-center">Add Your Category</h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-lg-5">
                <div class="card-body">
                    <img src="{{asset('visitors/images/service_img.png')}}" alt="" class="service_img">
                    <h5 class="card-text text-center">Add Your Services</h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-lg-5">
                <div class="card-body">
                    <img src="{{asset('visitors/images/quotation_img.png')}}" alt="" class="quotation_img">
                    <h5 class="card-text text-center">Get Quotations
                    </h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-lg-5">
                <div class="card-body">
                    <img src="{{asset('visitors/images/cerificate_img.png')}}" alt="" class="certificate_img">
                    <h5 class="card-text text-center">Add Your Certificates</h5>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary text-center mt-lg-5 mb-lg-5">Apply Now</a>
        </div>
    </div>
    <div class="getstarted mt-5">
        <h1 class="text-center text-white pt-5">Get Started For Free</h1>
        <p class="text-center text-white pt-2">Our forever Free Plan is a great place to start, and you can upgrade to our
            Premium Plans
            whenever you’re ready
        </p>
        <div class="d-flex justify-content-center">
            <button class="btn bg-white text-center mt-4 mb-5">Start With Free</button>
        </div>
    </div>
</div>
   
@endsection
