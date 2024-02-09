@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="about">
        <h3 class="us ms-lg-5">About us</h3>
        {{-- sliderinner --}}
        {{-- <img class="img" src="{{ asset('visitors/images/Backgroung-Web-banner-.png') }}" alt="" width="100%"
            height="300px"> --}}
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="500">
            <div class="carousel-inner">
                @foreach ($sliderabout as $sliderabout)
                <div class="carousel-item">
                    <img src="{{url('/slider/'.$sliderabout->photo)}}" class="d-block w-100 img" height="300px"
                        alt="...">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
            <span class="span_arrow">/</span>
            <a href="{{ route('visitors.aboutus') }}" class="about_us_link">ABOUT US</a>
        </div>
    </div>
    <div class="container mt-5 p-5">
        <div class="ms-lg-5 me-lg-5">
            @foreach ($about as $aboutData)
            <p class="pcolor">{!!$aboutData->about!!}</p>
            @endforeach
        </div>
    </div>
</div>

{{--
<div class="trusted_porple mt-5">
    <div class="trusted_orange">
        <div class="trusted_white"> --}}

            <div class="cube_orange">
                <div class="cube_purple text-center">
                    <h3 class="text-center text-white mt-5">How Consultant Cube Works</h3>
                    <p class="text-center text-white mt-3">A platform to find right consultant</p>
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-lg-4 person_section">
                                <div class="person_img_circle position-relative">
                                    <i class="fa fa-circle text-white"></i>
                                    <img src="{{ asset('visitors/images/1-1.png') }}" alt="" width="60" height="50">
                                </div>
                                <h5 class="person-text text-white mt-4">Find Your Consultant</h5>
                                <p class=" person-text text-white mt-2">
                                    "We will enlist just the right
                                    ones based on your choices."</p>
                            </div>
                            <div class="col-lg-4  person_section">
                                <div class="person_img_circle position-relative">
                                    <i class="fa fa-circle text-white"></i>
                                    <img src="{{ asset('visitors/images/2.png') }}" alt="" width="60" height="50">
                                </div>
                                <h5 class="person-text text-white mt-4">Connect with Your Consultant</h5>
                                <p class="person-text text-white mt-2">"Locate guidance, then forge a powerful
                                    connection with
                                    your consultant for growth."</p>
                            </div>
                            <div class="col-lg-4  person_section">
                                <div class="person_img_circle position-relative">
                                    <i class="fa fa-circle text-white"></i>
                                    <img src="{{ asset('visitors/images/3.png') }}" alt="" width="60" height="50">
                                </div>
                                <h5 class="person-text text-white mt-4">Connect for Success</h5>
                                <p class="person-text text-white mt-2">"Identify your mentor, then establish a
                                    transformative
                                    connection for mutual development."</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            {{-- Why Choose Us Start --}}
            <div class="chooseus_orange">
                <h3 class="text-center pt-5 text-white">
                    Why Choose us
                </h3>
                <p class="text-center text-white pt-3">
                    Best Service Deals
                </p>
                {{-- commu.png
                help (1).png
                1-3.png --}}
                <div class="container p-5">
                    <div class="row choose_us">
                        <div class="col-md-4 col-sm-4 be_part">
                            <div class="text-center">
                                <img src="{{ asset('visitors/images/commu.png') }}" alt="" width="90px" height="90px">
                            </div>
                            <div class="text-center text-white mt-4">
                                <p class="fw-bold">
                                    Be part of a generous community
                                </p>
                                <p class="">
                                    Consultant Cube provides a win-win platform,
                                    where individuals prosper in their respective domains.
                                    Be a part of a generous community as a mentor or mentee and lead towards better
                                    EVERYTHING.
                                </p>
                            </div>
                        </div>
                        <div class=" col-md-4 col-sm-4 be_part">
                            <div class="text-center">
                                <img src="{{ asset('visitors/images/helping.png') }}" alt="" width="90px" height="90px">
                            </div>
                            <div class="text-center text-white mt-4">
                                <p class="fw-bold">
                                    Serve the help, Get the help
                                </p>
                                <p class="">
                                    Each of us was born raw, shaped gradually with the help of
                                    our parents and teachers. Consultant Cube offers a platform
                                    for everyone who wishes to serve help,
                                    out of his or her experiences or receive help in any arena.</p>
                            </div>
                        </div>
                        <div class=" col-md-4  col-sm-4 be_part">
                            <div class="text-center">
                                <img src="{{ asset('visitors/images/persona.png ') }}" alt="" width="90px"
                                    height="90px">
                            </div>
                            <div class="text-center text-white mt-4">
                                <p class="fw-bold">
                                    Amplify your persona
                                </p>
                                <p class="">
                                    Knowledge, Wisdom and Information when received from the right individual,
                                    results in amplification of your persona. Consultant Cube bridges one
                                    with consistent learning in one or another way, as either a mentor or a mentee.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Why Choose Us End --}}



            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#myCarousel').find('.carousel-item').first().addClass('active');
                });
            </script>
            @endsection