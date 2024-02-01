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
            max-width: 300px;
            /* Adjusted card width for better alignment */
            max-height: 450px;
            /* Adjusted card height for better alignment */
            margin-bottom: 20px;
            /* Added margin-bottom to create space between cards */
        }

        .select2-container {
            width: 300px !important;
        }

        /* Increase the height of select2 dropdown */
        .select2-container--default .select2-selection--single {
            height: 30px;
            /* Adjust the height as needed */
        }

        .select2-container--default .select2-selection--single,
        .btn-primary {
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Adjust the height as needed */
        }

        /* .btn-primary {} */

        /* Improved responsiveness for smaller screens */
        @media (max-width: 576px) {
            .card {
                max-width: 100%;
                max-height: none;
            }

            .select2-container {
                width: 100% !important;
                /* Full width for smaller screens */
            }
        }

        /* Center align the search button on all screen sizes */
        #searchButton {
            width: 100%;
        }

        /* Add some margin to the top of the form */
        .search-form {
            margin-top: 20px;
        }
    </style>

    <div class="" style="position: relative">
        <div class="findconsultant">
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

        <div class="container mt-3">
            <form class="form-inline" action="{{ route('visitors.findConsultantList') }}" method="get">
                @csrf
                <input type="hidden" value="{{ request('categoryId') }}">
                <input type="hidden" value="{{ request('cityId') }}">
                <div class="row">
                    <div class="col-md-4" style="padding-left: 50px">
                        <select class="form-control select2" name="categoryId" id="categoryId">
                            <option value="" selected> Select Category</option>
                            @foreach ($category as $categoryData)
                            <option value="{{ $categoryData->id }}">{{ $categoryData->catName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4" style="padding-left: 70px">
                        <select class="form-control select2" name="cityId" id="cityId">
                            <option value="" selected> Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2" style="padding-left: 100px">
                        <button type="submit" class="btn btn-primary" id="searchButton"
                            style="width: 150px">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <br>

        @if ($selectedCategory)
        @if ($selectedCity)
        <h4>List of Consultants > {{ $selectedCategory->catName }} > {{ $selectedCity->cityName }} </h4>
        @else
        <h4>List of Consultants > {{ $selectedCategory->catName }} > All City </h4>
        @endif
        @else
        <h2>List of All Consultants</h2>
        @endif

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
                        <p class="card-text">Not Available</p>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

@endsection