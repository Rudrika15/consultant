@extends('layouts.visitorApp')
@section('content')
    <div class="main_page">
        <div class="container">
            <div class="row">
                @foreach ($consultant as $consultantData)
                <div class="col-md-3 mt-5">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="rounded-circle" src="{{url('/profile')}}/{{$consultantData->photo}}" alt="" widht="100" height="100">
                            </div>
                            <div class="card-title fw-bold text-center pt-2">
                                @foreach ($consultantData->user as $user)
                                <p >{{$user->name}} &nbsp;{{$user->lastName}}</p>
                                 @endforeach
                            </div>
                            <div class="card-text">
                                @foreach ($consultantData->categories as $categories)
                                    <p class="categorytext">{{$categories->catName}}</p>
                                @endforeach
                            </div>
                            @foreach ($consultantData->states as $state)
                            <p>{{$state->stateName}}</p>
                            @endforeach
                            @foreach ($consultantData->cities as $city)
                            <p>{{$city->cityName}}</p>
                            @endforeach
                            
                        </div>
                    </div>
                   
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection