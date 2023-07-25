@extends('layouts.app')

@section('header','City')
@section('content')

{{-- Message --}}
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Success !</strong> {{ session('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Error !</strong> {{ session('error') }}
</div>
@endif



<div class="card">
    <!-- /.box-title -->
    <div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Edit City</h4>
        </div>
        <div class="">
            <a href="{{ route('city.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" action="{{route('city.update')}}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$city->id}}">

            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>State Name:</strong>
                    <select class="form-control" data-error='State Name Field is required' required name="stateId" id="stateId">
                        <option value="" selected disabled> Select User Name </option>
                        @foreach ($state as $statedata)
                        <option value="{{ $statedata->id }}" {{$statedata->id == old('stateId',$city->stateId)? 'selected':''}}>{{ $statedata->stateName }}</option>
                        @endforeach
                        
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('stateId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-label-group mt-3">
                <label for="cityName" class="fw-bold">City Name <sup class="text-danger">*</sup></label>
                <input id="cityName" type="text" name="cityName" class="form-control" placeholder="City Name" value="{{$city->cityName}}">
                @if ($errors->has('cityName'))
                <span class="error">{{ $errors->first('cityName') }}</span>
                @endif
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>



@endsection