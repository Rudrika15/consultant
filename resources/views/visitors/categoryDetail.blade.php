@extends('layouts.visitorApp')
@section('content')
    <div class="main_page">

        <div class="">
            <div class="container pt-5">
                <section class="slider">
                    <div class="slider__container" data-multislide="false" data-step="4">
                        @foreach ($consultant as $consultantData)
                            <div class="slider__item">
                                <div class="card catcard ">
                                    <a href="{{ route('visitors.consultantDetail') }}/{{ $consultantData->id }}"
                                        class="text-decoration-none text-dark">
                                        <div class="card-img">
                                            <img src="{{ url('profile') }}/{{ $consultantData->photo }}" alt=""
                                                width="200px" height="188px">
                                        </div>
                                        @foreach ($consultantData->user as $userData)
                                            <h5 class="mt-3">{{ $userData->name }}</h5>
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="prevnext mt-3 mb-3">
                        <button class="slider__control prev fw-bold text-white"><i class="fa fa-angle-left"></i></button>
                        <button class="slider__control next fw-bold text-white"><i class="fa fa-angle-right"></i></button>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
