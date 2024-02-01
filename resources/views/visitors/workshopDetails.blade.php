@extends('layouts.VisitorApp')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

<div class="container mt-5">

    <div class="card shadow mt-5 p-2">
        <div class="row">
            <div class="col-sm-1 col-md-1 col-6">

                @if(isset($workshop->photo))
                <img src="{{ url('workshop') }}/{{ $workshop->photo }}" class="img-fluid" alt="workshop img"
                    class="img-fluid rounded p-2" style="max-width: 100px; height: 90px;">
                @else
                <!-- Provide a fallback image or handle the case when $profile->photo is not set -->
                <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid" alt="Default Profile Image"
                    class="img-fluid rounded p-2" style="max-width: 90px; height: 90px;">
                @endif

                {{-- <img src="https://cdn2.allevents.in/thumbs/thumb65b7a8998dad3.jpg" alt="event img"
                    class="img-fluid rounded p-2" style="max-width: 90px; height: 90px;"> --}}
            </div>

            <input type="hidden" value="{{ request('id') }}">
            {{-- <input type="hidden" value="{{ request('userId') }}"> --}}


            <div class="col-sm-8 col-md-8 col-6 mx-auto">
                <p class="font-weight-bold mt-3">{{$workshop->title}}</p>
            </div>

            <div class="col-sm-3 col-md-3 col-6">
                <div class="btn btn-primary mt-4">Register Now</div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow ">
                    <div class="row">
                        <div class="col-md-12 mt-3 text-center">

                            @if(isset($workshop->photo))
                            <img src="{{ url('workshop') }}/{{ $workshop->photo }}" class="img-fluid"
                                alt="workshop img">
                            @else
                            <!-- Provide a fallback image or handle the case when $profile->photo is not set -->
                            <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid"
                                alt="Default Profile Image">
                            @endif

                            {{-- <img itemprop="image" class="event-banner-image img-fluid p-2 mx-auto d-block"
                                src="https://cdn2.allevents.in/thumbs/thumb65b7a8998dad3.jpg" alt="event img"
                                title="Event Name"> --}}
                        </div>
                        <div class="mt-3 p-4">
                            <h5 class="font-weight-bold">Event Details</h5>
                            <p>
                            <p>{{ \Carbon\Carbon::parse($workshop->workshopDate)->format('d-m-y') }}</p>
                            </p>
                            <p>{!!$workshop->detail!!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">
               <div class="card mb-3 shadow" style="max-height: 120px; overflow: hidden;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Date</h5>
                    <div class="text-center">
                        <i class="icon-time"></i>
                        <p>
                            {{ \Carbon\Carbon::parse($workshop->workshopDate)->format('d-m-y') }}
                        </p>
                        <br>
                        <small></small>
                    </div>
                </div>
            </div>

                <div class="card shadow ">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Location</h5>
                        <div class="text-center">
                            <i class="icon-map-marker"></i>
                            @if(isset($workshop->address) && !empty($workshop->address))
                            <p><span class="full-venue">{{ $workshop->address }}</span></p>
                            @else
                            <p>Event is Online</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card mt-3 shadow ">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Event Link</h5>
                        <div class="text-center">
                            <i class="icon-map-marker"></i>
                            <p><button class="btn btn-primary copy-button" data-clipboard-target="#linkToCopy">Copy
                                    Link</button></p>
                            @if(isset($workshop->link) && !empty($workshop->link))
                            <p><span id="linkToCopy" class="mt-2">{{ $workshop->link }}</span></p>
                            @else
                            <p>Event is Offline</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var clipboard = new ClipboardJS('.copy-button');
    });
</script>

@endsection