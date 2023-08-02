@extends('layouts.visitorApp')
@section('content')
    <div class="conatainer-fluid mb-5">
        <img src="{{ asset('visitors/images/home.png') }}" height="700px" width="100%" alt="">
        {{-- Consultant Category --}}
        <div class="consultantcategory p-5 mb-5">
            <h2 class="text-center text-white mt-3">Consultant Categories</h2>
            <div class="container mb-5">
                <div class="section ms-5 me-5 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="property-slider-wrap">
                                    <div class="property-slider">
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <!-- .item -->
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>
                                        <div class="property-item">
                                            <div class="card catcard ">
                                                <div class="card-img">
                                                    <img src="{{ asset('visitors/images/career_transition.png') }}"
                                                        alt="" width="230px" height="188px">
                                                </div>
                                                <h5 class="mt-3">Career Transition</h5>
                                            </div>
                                        </div>

                                        <!-- .item -->
                                    </div>

                                    <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                                        <span class="prev" data-controls="prev" aria-controls="property"
                                            tabindex="-1">Prev</span>
                                        <span class="next" data-controls="next" aria-controls="property"
                                            tabindex="-1">Next</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- How Consultant Cube Works --}}

        <div class="cubeworks bg-white w-100" style="height: 600px;">

        </div>
    </div>
@endsection
