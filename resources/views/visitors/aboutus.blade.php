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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
                    $('#myCarousel').find('.carousel-item').first().addClass('active');
                });
</script>
@endsection