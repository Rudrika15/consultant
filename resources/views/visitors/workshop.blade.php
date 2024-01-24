<!-- show.blade.php -->

@extends('layouts.visitorApp')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    .banner {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
    }

    .event-card {
        margin: 20px 0;
    }

    .countdown {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
        color: #007bff;
    }

    .map {
        width: 100%;
        height: 300px;
    }
</style>

<div class="container">

    <!-- Title Card -->
    <div class="card event-card">
        <div class="card-body">
            @foreach ($workshop as $workshopData)
            <h1 class="card-title">{{ $workshopData->title }}</h1>
            {{-- <p class="card-text">Organized by: {{ $workshopData->organizer }}</p> --}}
        </div>
    </div>

    <!-- Banner Card with Logo and Slogan -->
    <div class="card event-card">
        {{-- <img src="{{ asset($workshopData->photo) }}" alt="Workshop Logo" class="card-img-top banner"> --}}
        <div class="card-body">
            <p class="card-text"> Countdown for Workshop </p>
            <div class="countdown" id="countdown"></div>
        </div>
    </div>

    <!-- Workshop Details Card with Image -->
    <div class="card event-card">
        <img src="{{ asset($workshopData->photo) }}" alt="Workshop Image" class="card-img-top">
        <div class="card-body">
            <h2 class="card-title">Workshop Details</h2>
            <p class="card-text"><strong>Online or Offline:</strong> {{ $workshopData->workshopType }}</p>
            <p class="card-text"><strong>Date:</strong> {{ $workshopData->workshopDate }}</p>
            {{-- <p class="card-text"><strong>Time:</strong> {{ $workshopData->time }}</p> --}}
            <p class="card-text"><strong>Location:</strong> {{ $workshopData->address ?? 'Workshop is streming Online'
                }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $workshopData->price }}</p>
        </div>
    </div>

    <!-- Workshop Map Card -->
    {{-- <div class="card event-card">
        <div class="card-body">
            <h2 class="card-title">Workshop Map</h2>
            <div class="map">
                <!-- Embed a map or use an image of the map -->
                <!-- Example: <iframe src="{{ $workshop->map }}" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
        </div>
    </div> --}}
</div>
@endforeach

<!-- Bootstrap JS and Popper.js (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Countdown Timer Script -->
<script>
    // Set the date we're counting down to
    var countDownDate = new Date("{{ $workshopData->workshopDate }}").getTime();

    // Update the countdown every 1 second
    var x = setInterval(function() {
        // Get the current date and time
        var now = new Date().getTime();

        // Calculate the remaining time
        var distance = countDownDate - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
@endsection