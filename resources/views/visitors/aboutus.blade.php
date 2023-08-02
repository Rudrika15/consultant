@extends('layouts.visitorApp')
@section('content')
    <div class="about">
        <div class="container">
            <h3 class="us ms-5">About us</h3>
        </div>
        <img class="img" src="{{ asset('visitors/images/Backgroung-Web-banner-.png') }}" alt="" width="100%"
            width="300px">

    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="ms-5" style="text-decoration: none;">HOME</a>
            <span style="color:gray">/</span>
            <a href="{{ route('visitors.aboutus') }}" style="color:gray;text-decoration: none;">ABOUT US</a>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="ms-5 me-5">
            <p class="pcolor">Nothing but change is constant! In this constantly
                changing world, GROWTH is inevitable for everyone.
                From one who is already successful to one starting
                just now. Each of us needs a guiding factor in form
                of a mentor, coach, or a CONSULTANT.
            </p>
            <p class="pcolor">
                Consultant Cube provides the much-needed platform where
                individuals, businesses, start-ups, giants, or
                consultants themselves can have easy access to finding
                their respective Consultants from various domains.
            </p>
            <p class="pcolor">
                Our simple yet appealing global platform lets the
                clients connect with the respective Consultants and
                meet their precise requirements in their own cube.
            </p>
        </div>
    </div>
@endsection
