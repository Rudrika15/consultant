@extends('layouts.app')

@section('header','Gallery')
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
            <h4 class="">Edit Gallery</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('gallery.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('gallery.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" action="{{route('gallery.update')}}" enctype="multipart/form-data" method="post">
            @csrf

            <input type="hidden" name="id" id="id" value="{{$gallery->id}}">
            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" value="{{$gallery->title}}" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold">Photo <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img src="{{ url('/gallery/' . $gallery->photo) }}" alt="" style="height:100px; width: 100px;">

                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
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