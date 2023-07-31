@extends('layouts.visitorApp')
@section('content')
    <div class="about mt-5">
        <div class="container">
            <h3 class="us">About us</h3>
        </div>
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}">HOME</a>
            <span style="color:#005555">/</span>
            <a href="{{ route('visitors.aboutus') }}" style="color:gray">ABOUT US</a>
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
        <div class="row">
            <div class="col-6">

            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
@endsection
