@extends('layouts.visitorApp')
@section('content')
    <div class="main_page">
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
            <div class="phone-email-address  p-5">
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="card contact_card ">
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
                    </div>
                    <div class="col-md-4">
                        <div class="card contact_card ">
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
                    </div>
                    <div class="col-md-4">
                        <div class="card contact_card ">
                            <div class="card-body">
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
        </div>
       
        <div class="container mb-5">
            <div class="contact-location">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contact Us</h4>
                        <form class="contact-form mt-5 mb-5">
                            <div class="row">
                                <div class="col-md-6 pt-4 input-container">
                                    <i class="fa fa-user icon text-center"></i>
                                    <input type="text" name="name" class="form-control input-field" placeholder="{{_('Name')}}">
                                </div>
                                <div class="col-md-6 pt-4 input-container">
                                    <i class="fa fa-envelope icon text-center"></i>
                                    <input type="text" name="name" class="form-control input-field" placeholder="{{_('Email')}}">
                                </div>
                                <div class="col-md-12 pt-4 input-container">
                                    <i class="fa fa-phone icon text-center"></i>
                                    <input type="text" name="name" class="form-control input-field" placeholder="{{_('Email')}}">
                                </div>
                                <div class="col-md-12 pt-4 input-container">
                                    <i class="fa fa-edit icon text-center"></i>
                                    <textarea name="comments" id="comments" class="form-control input-field" cols="30" rows="4">{{_('Comments')}}</textarea>
                                </div>
                                <div class="col-md-12 pt-4 input-container">
                                    <i class="fa fa-edit icon text-center"></i>
                                    <input type="text" name="name" class="form-control input-field" placeholder="{{_('Enter the code above here')}}">
                                </div>
                                <div class="col-2 pt-3">
                                    <button type="submit" class="btn contact-submit-button fw-bold">Submit</button>
                                </div>
                                <div class="col-2 pt-3">
                                    <button type="submit" class="btn contact-submit-reset fw-bold">Reset</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4>Our Location</h4>
                        <div id="googleMap" style="width:100%;height:400px;" class="mt-5"></div>

                            <script>
                            function myMap() {
                            var mapProp= {
                            center:new google.maps.LatLng(51.508742,-0.120850),
                            zoom:5,
                            };
                            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            }
                            </script>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
   
@endsection
