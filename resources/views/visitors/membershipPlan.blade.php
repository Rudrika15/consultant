@extends('layouts.visitorApp')
@section('content')
    <div class="membership mt-5">
        <div class="container">
            <h3 class="us">Membership Plan</h3>
        </div>
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}">HOME</a>
            <span style="color:#005555">/</span>
            <a href="{{ route('visitors.aboutus') }}" style="color:gray">MEMBERSHIP PLAN</a>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row mb-5">
            <div class="col-lg-4">
                <div class="card membercard shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title text-center">Free</h3>
                        <p class="card-text mt-5"><i class="fa fa-check"></i>Profile Name</p>
                        <p class="card-text"><i class="fa fa-check"></i>Coaching/Category</p>
                        <p class="card-text"><i class="fa fa-check"></i>Add Your Services</p>
                        <p class="card-text"><i class="fa fa-check"></i>Maximum 5 Quotations</p>
                        <p class="card-text"><i class="fa fa-check"></i>Full profile</p>
                        <p class="card-text"><i class="fa fa-check"></i>Certificate update</p>
                        <a href="#" class="btn btn-primary mb-5 mt-5">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card membercard shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title text-center">Silver</h3>

                        <p class="card-text mt-5"><i class="fa fa-check"></i>Profile Name</p>
                        <p class="card-text"><i class="fa fa-check"></i>Consulting Call Booking (Per Booking 10%
                            Administration Fee)</p>
                        <p class="card-text"><i class="fa fa-check"></i>Coaching/Category</p>
                        <p class="card-text"><i class="fa fa-check"></i>Full Profile Page</p>
                        <p class="card-text"><i class="fa fa-check"></i>video on profile page</p>
                        <p class="card-text"><i class="fa fa-check"></i>Upload of certificates & awards</p>

                        <p class="card-text"><i class="fa fa-check"></i>Part of Elite Networking community</p>
                        <p class="card-text"><i class="fa fa-check"></i>Show as Featured coach on home page & other relevant
                            pages</p>
                        <p class="card-text"><i class="fa fa-check"></i>Determine Your Services</p>
                        <p class="card-text"><i class="fa fa-check"></i>Social Media Promotion</p>
                        <p class="card-text"><i class="fa fa-check"></i>Unlimited Quotations</p>


                        <a href="#" class="btn btn-primary mt-5 mb-5">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card membercard shadow p-3 mb-5 bg-body rounded">
                    <div class="card-body text-center">
                        <h3 class="card-title text-center">Gold</h3>
                        <p class="card-text mt-5"><i class="fa fa-check"></i>Profile Name</p>
                        <p class="card-text"><i class="fa fa-check"></i>Consulting Call Booking
                            (Per Booking 5% Administration Fee)</p>
                        <p class="card-text"><i class="fa fa-check"></i>Coaching/Category</p>
                        <p class="card-text"><i class="fa fa-check"></i>Full Profile Page</p>
                        <p class="card-text"><i class="fa fa-check"></i>video on profile page</p>
                        <p class="card-text"><i class="fa fa-check"></i>Upload of certificates & awards</p>
                        <p class="card-text"><i class="fa fa-check"></i>Part of Elite Networking community</p>
                        <p class="card-text"><i class="fa fa-check"></i>Show as Featured coach on home page & other relevant
                            pages</p>
                        <p class="card-text"><i class="fa fa-check"></i>Determine Your Services</p>
                        <p class="card-text"><i class="fa fa-check"></i>Feature in Promotion & Publicity Campaign on social
                            media and other platforms</p>
                        <p class="card-text"><i class="fa fa-check"></i>Publish unlimited events/news</p>
                        <p class="card-text"><i class="fa fa-check"></i>Publish unlimited Article/Blogs</p>
                        <p class="card-text"><i class="fa fa-check"></i>Available For Webinar and WorkShop Promotion</p>
                        <p class="card-text"><i class="fa fa-check"></i>Paid Promotions</p>
                        <p class="card-text"><i class="fa fa-check"></i>Staff Members</p>
                        <p class="card-text"><i class="fa fa-check"></i>Unlimited Quotations</p>

                        <a href="#" class="btn btn-primary mt-5 mb-5">Apply Now</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- All Panls Include --}}
    <div class="container allplan">
        <div class="text-center mt-5">
            <h1>All Plans Include</h1>
            <h5>Bring your people together under your brand on your terms !</h5>
        </div>
        <div class="d-flex justify-content-center gap-3 mt-5 flex-wrap">
            <div class="card allplancard shadow p-3 mb-5 bg-gray rounded mt-5">
                <div class="card-body">
                    <h5 class="text-center "><i class=" fa fa-user"></i></h5>
                    <h5 class="card-text text-center">Profile Access</h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-gray rounded mt-5">
                <div class="card-body">
                    <h5 class="text-center "><i class="fa fa-windows"></i></i></h5>
                    <h5 class="card-text text-center">Add Your Category</h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-5">
                <div class="card-body">
                    <h5 class="text-center "><i class="fa fa-handshake-o"></i></i></h5>
                    <h5 class="card-text text-center">Add Your Services</h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-5">
                <div class="card-body">
                    <h5 class="text-center "><i class="fa fa-quote-left"></i></h5>
                    <h5 class="card-text text-center">Get Quotations
                    </h5>
                </div>
            </div>
            <div class="card allplancard shadow p-3 mb-5 bg-body rounded mt-5">
                <div class="card-body">
                    <h5 class="text-center"><i class="fa fa-certificate"></i></h5>
                    <h5 class="card-text text-center">Add Your Certificates</h5>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn btn-primary text-center mt-5 mb-5">Apply Now</a>
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
@endsection
