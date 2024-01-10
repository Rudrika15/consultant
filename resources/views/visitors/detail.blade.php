@extends('layouts.visitorApp')
@section('content')
    <div style="background-color: #F7F8FA;">
        <div class="container">
            <div class="row pt-5 pb-5">
                @foreach ($profile as $profileData)
                        <div class="col-md-6">
                            <a href="{{ route('visitors.review') }}/{{ $profileData->profile->id }}" class="text-decoration-none text-dark">
                                <div class="card ps-3 pt-3 pe-3 pb-3" style="background-color: #F5F5F5; border:0">
                                    <div class="row">
                                        <div class="col-md-3 pt-5 pb-5">
                                            <img src="{{ url('profile') }}/{{ $profileData->profile->photo }}" class="img-fluid"
                                                alt="...">

                                        </div>
                                        <div class="col-md-8 pt-3" style="line-height: 25px;">
                                            <div style="color: #C8C8C8">
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <div class="pt-3">
                                                <h5 style="font-weight: 700;">{!! $profileData->profile->about !!}</h5>
                                                <button style="background-color: #FF650D; color: white;"
                                                    class="border-0 ps-2 pe-2 border-radius-10">{{ $profileData->catName }} </button>
                                                <p class="pt-2">Dr. Saleel Bhatt
                                                    - Doctorate - combination of Management & Experiential Learning
                                                    - Corporate experience of close to 25 years [...]</p>
                                            </div>
                                        </div>
                                        <div class="col-md-1 text-center ">
                                            <i class="text-decoration-none fa fa-gear" style="color: #FEC2B4;"></i>
                                            <hr style="margin-top: 10px">
                                            <i class="text-decoration-none fa fa-list-alt" style="color: #819AF4;"></i>
                                            <hr style="margin-top: 10px">
                                            <i class="text-decoration-none fa fa-file-o" style="color: #70BB4F;"></i>
                                            <hr style="margin-top: 10px">
                                            <i class="text-decoration-none fa fa-heart-o" style="color: #3BC6FB;"></i>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                    {{-- @endforeach --}}
                @endforeach
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </div>
@endsection
