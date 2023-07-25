@extends('layouts.app')

@section('header','Language')
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
            <h4 class="">Create Language</h4>
        </div>
        <div class="">
            <a href="{{ route('language.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" action="{{route('language.store')}}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>Language Master Name:</strong>
                    <select class="form-control" data-error='State Name Field is required' required name="languageId" id="languageId">
                        <option value="" selected disabled> Select Language Master </option>
                        @foreach ($languageMaster as $languageMasterData)
                        <option value="{{ $languageMasterData->id }}">{{ $languageMasterData->language }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('languageId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
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