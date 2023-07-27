@extends('layouts.app')

@section('header','Video')
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
            <h4 class="">Edit Video</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('video.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('video.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
<<<<<<< HEAD
        <form class="form-group" action="{{route('video.update')}}" enctype="multipart/form-data" method="post">
=======
        <form class="form-group" id="videoForm" name="videoForm" action="{{route('video.update')}}" enctype="multipart/form-data" method="post">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            @csrf

            <input type="hidden" id="id" name="id" value="{{$video->id}}">
            <div class="form-label-group mt-3">
                <label for="url" class="fw-bold">Url <sup class="text-danger">*</sup></label>
                <input id="url" type="text" name="url" value="{{$video->url}}" class="form-control" placeholder="url">
                @if ($errors->has('url'))
                <span class="error">{{ $errors->first('url') }}</span>
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
<<<<<<< HEAD

=======
<script type="text/javascript">
  $(function () {
     
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $(document).ready(function() {
        // Get the values you want to update
        $("#videoForm").submit(function(event){
            var id = $('#id').val();
            var url = $('#url').val();
            
            $.ajax({
                url: '{{ route('video.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include the CSRF token for Laravel security
                    id: id,
                    url: url,
                },
                success: function (response) {
                    window.open("/video-index", "_self"); 
                },
                error: function (error) {
                    // Handle error response
                    alert('Error updating video.'); // You can replace this with any error message handling
                }
            });
        });
    });
  });
</script>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1


@endsection