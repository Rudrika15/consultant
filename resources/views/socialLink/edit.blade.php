@extends('layouts.app')

@section('header','Social Link')
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
            <h4 class="">Edit Social Link</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('socialLink.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('socialLink.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
<<<<<<< HEAD
        <form class="form-group" action="{{route('socialLink.update')}}" enctype="multipart/form-data" method="post">
            @csrf
    <input type="hidden" name="id" id="id" value="{{$socialLink->id}}">

            <div class="form-label-group mt-3">
                <div class="form-group">
                
=======
        <form class="form-group" id="socialLinkForm" name="socialLinkForm" action="{{route('socialLink.update')}}" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$socialLink->id}}">

            <div class="form-label-group mt-3">
                <div class="form-group">

>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                    <strong>Social Media Master:</strong>
                    <select class="form-control" data-error='Social Media Master Field is required' required name="socialMediaMasterId" id="socialMediaMasterId">
                        <option value="" selected disabled> Select Social Media Master </option>
                        @foreach ($socialMaster as $socialMasterdata)
                        <option value="{{ $socialMasterdata->id }}" {{$socialMasterdata->id == old('socialMediaMasterId',$socialLink->socialMediaMasterId)? 'selected':''}}>{{ $socialMasterdata->title }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('socialMediaMasterId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-label-group mt-3">
                <label for="url" class="fw-bold">Url <sup class="text-danger">*</sup></label>
                <input id="url" type="text" name="url" class="form-control" placeholder="url" value="{{$socialLink->url}}">
                @if ($errors->has('url'))
                <span class="error">{{ $errors->first('url') }}</span>
                @endif
            </div>
<<<<<<< HEAD
        
           
=======


>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
            <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
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
        $("#socialLinkForm").submit(function(event){
            event.preventDefault();
            var id = $('#id').val();
            var socialMediaMasterId = $('#socialMediaMasterId').val();
            var url = $('#url').val();
            $.ajax({
                url: '{{ route('socialLink.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include the CSRF token for Laravel security
                    id: id,
                    socialMediaMasterId: socialMediaMasterId,
                    url: url
                },
                success: function(response) {
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        },200);
                    } else {
                        // Error message using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred!',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred!',
                    });
                }
            });
        });
    });
  });
</script>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1


@endsection