@extends('layouts.visitorApp')
@section('content')

@if(session('successMessage'))
<div class="alert alert-success">
    {{ session('successMessage') }}
</div>
@endif

@if(session('errorMessage'))
<div class="alert alert-danger">
    {{ session('errorMessage') }}
</div>
@endif

<div class="main_page">
    <div class="membership">
        <h3 class="membertext ms-lg-5">Membership Plan</h3>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="500">
            <div class="carousel-inner">
                @foreach ($slidermember as $slider)
                <div class="carousel-item">
                    <img src="{{ url('/slider/' . $slider->photo) }}" class="d-block w-100 img" height="300px"
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
            <a href="{{ route('visitors.membershipPlan') }}" class="membership_link">MEMBERSHIP PLAN</a>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row mb-5">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            {{-- <th>Features</th> --}}
                            @foreach ($adminpackage as $package)
                            <th>{{ $package->title }}</th>

                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($adminpackage as $package)
                            <td>{!! $package->details !!}</td>
                            @endforeach

                        </tr>
                        @foreach ($adminpackage as $package)
                        <td><button class="btn btn-primary">
                                {{$package->title}}</button></td>
                        @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="container allplan">
        <div class="text-center mt-5">
            <h1>All Plans Include</h1>
            <h5>Bring your people together under your brand on your terms!</h5>
        </div>
        <div class="row cardgap gap-lg-4 mt-lg-5 ms-lg-5 flex-wrap">
            <div class="col-md-2 card allplancard shadow p-lg-3 mb-5 bg-gray rounded mt-5" id="allpanlcard-with">
                <div class="card-body text-center">
                    <a href="{{ route('visitor.profile') }}" style="text-decoration: none;color:black;">
                        <img class="text-center profile-access-user-img"
                            src="{{ asset('visitors/images/profile_access_user.png') }}">
                        <h5 class="card-text text-center">Profile Access</h5>
                    </a>
                </div>
            </div>
            <!-- Repeat the pattern for the other plans -->
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" class="btn text-white mt-lg-5 mb-lg-5">Apply Now</a>
        </div>
    </div>

    <div class="getstarted mt-5">
        <h1 class="text-center text-white pt-5">Get Started For Free</h1>
        <p class="text-center text-white pt-2">Our forever Free Plan is a great place to start, and you can upgrade to
            our Premium Plans whenever you’re ready</p>
        <div class="d-flex justify-content-center">
            <button class="btn bg-white text-center mt-4 mb-5">Start With Free</button>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myCarousel').find('.carousel-item').first().addClass('active');
    });
</script>
@endsection