@extends('layouts.visitorApp')
@section('content')
    <div class="main_page">
        <div class="container">
            <div class="row">
                @foreach ($consultant as $consultantData)
                <div class="col-md-3 mt-5">
                    <div class="card bg-white">
                        <div class="card-body">
                            @foreach ($consultantData->user as $user)
                            <p>{{$user->name}}</p>
                            @endforeach
                            @foreach ($consultantData->states as $state)
                            <p>{{$state->stateName}}</p>
                            @endforeach
                            @foreach ($consultantData->cities as $city)
                            <p>{{$city->cityName}}</p>
                            @endforeach
                            @foreach ($consultantData->categories as $category)
                            <p>{{$category->catName}}</p>
                            @endforeach
                        </div>
                    </div>
                   
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection