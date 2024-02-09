@extends('layouts.app')

@section('header', 'Consultant')
@section('content')

<div class="card">
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Consultant Details</h4>
        </div>
        <div class="">
            <a href="{{ route('consultant.index') }}" id="back" class="btn btnback btn-sm">BACK</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Name:</strong> {{ $user->name }}
                <br>
                <br>
                <strong>Email: </strong> {{ $user->email }}
                <br>
                <br>
                <strong>Contact No: </strong> {{ $user->contactNo }}
                <br>
                <br>
                <strong>Plan Type: </strong> {{ $user->planType }}
                <br>
                <br>
                <strong>About: </strong> {{ $user->profile->about ?? '-' }}
                <br>
                <br>
                <strong>Type: </strong> {{ $user->profile->type ?? '-' }}
                <br>
                <br>
                <strong>Company Name: </strong> {{ $user->profile->company ?? '-' }}
                <br>
                <br>
                <strong>Category: </strong> {{ $user->profile->category->catName ?? '-' }}
                <br>
                <br>
                <strong>Package: </strong> {{ $user->profile->packages->title ?? '-' }}
                <br>
                <br>
                <strong>Is Featured: </strong> {{ $user->profile->isFeatured ?? '-' }}
                <br>
                <br>
                <strong>Status: </strong> {{ $user->status ?? '-' }}
                <br>
                <br>
                <strong>Photo:</strong>
                @if(isset($user->profile->photo))
                <img src="{{ url('/profile') . '/' . $user->profile->photo }}" width="150px" height="150px">
                @else
                <img src="{{ url('/placeholder-image.jpg') }}" width="150px" height="150px" alt="Placeholder Image">
                @endif
            </div>
            <div class="col-md-6">

                <div>

                </div>
            </div>
        </div>

        {{-- <div class="mt-4">
            <a href="{{ route('consultant.view', $user->id) }}" class="btn btn-success btn-sm edit">View</a>
        </div> --}}
    </div>
</div>

@endsection