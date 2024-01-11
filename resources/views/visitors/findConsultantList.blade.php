@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <style>
        .rounded-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
        }

        .rounded-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card {
            max-width: 400px;
            max-height: 600px;
        }
    </style>

    <div class="container py-3">

        <div class="findconsultant">
            {{-- <h3 class="findtext ms-lg-5">Find Consultant</h3> --}}
            <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="500">
                <div class="carousel-inner">
                    @foreach ($sliderfindconsultant as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ url('/slider/' . $slider->photo) }}" class="d-block w-100 img" height="500px"
                            alt="...">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <form class="form-inline" action="{{ route('visitors.findConsultantList') }}" method="get">
            @csrf
            <input type="hidden" value="{{ request('categoryId') }}">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="categoryId" id="categoryId">
                        <option value="" selected> Select Category</option>
                        @foreach ($category as $categoryData)
                        <option value="{{ $categoryData->id }}">{{ $categoryData->catName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="cityId" id="cityId">
                        <option value="" selected> Select City</option>
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>

        <br>

        <div class="row">
            @if ($countconsultant > 0)
            @foreach ($consultant as $consultantData)
            <div class="col-md-3">
                <div class="card">
                    <div class="rounded-image mx-auto mt-3">
                        <img src="{{ url('profile') . '/' . $consultantData->photo }}" class="card-img-top">
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">{{ isset($consultantData->userData->name) ? $consultantData->userData->name
                            : '-' }} {!! isset($consultantData->userData->lastName) ?
                            $consultantData->userData->lastName : '-' !!}</p>
                        <p class="card-text">{{ isset($consultantData->map) ? $consultantData->map : '-' }}</p>
                        @if (isset($consultantData->categoriesData->catName))
                        <p class="card-text">{{ $consultantData->categoriesData->catName }}</p>
                        @else
                        <p class="card-text">Category Name Not Available</p>
                        @endif
                        <a href="{{ route('visitors.consultantDetail', $consultantData->userId) }}"
                            class="btn btn-primary">Show Profile</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12 text-center">
                <p>No Consultants found.</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection