@extends('layouts.visitorApp')
@section('content')

<div class="card text-center border" style="width: auto; height: 60px; background-color: #3498db; color: #fff;">
    <div class="mt-3">
        <h4>Our Workshops</h4>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        @foreach ($workshop as $workshopData)
        @php
        $workshopDate = \Carbon\Carbon::parse($workshopData->workshopDate);
        $today = \Carbon\Carbon::today();
        @endphp
        @if ($workshopDate->isFuture())
        <div class="col-md-3">
            <div class="card mb-4">
                @if(isset($workshopData->photo))
                <img src="{{ url('workshop') }}/{{ $workshopData->photo }}" class="img-fluid" alt="workshop img">
                @else
                <!-- Provide a fallback image or handle the case when $profile->photo is not set -->
                <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid" alt="Default Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $workshopData->title }}</h5>
                    {{-- Format the date as 'd-m-y' --}}
                    <p class="card-text">{{ $workshopDate->format('d-m-y') }}</p>
                    <a href="{{ route('visitor.workshopDetails', $workshopData->id) }}" class="btn btn-primary">Show
                        Details</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@endsection