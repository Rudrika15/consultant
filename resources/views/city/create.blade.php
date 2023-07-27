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
            <h4 class="">Create City</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('city.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('city.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
<<<<<<< HEAD
        <form class="form-group" id="cityForm" enctype="multipart/form-data" method="post">
=======
        <form class="form-group" action="{{route('city.store')}}" enctype="multipart/form-data" method="post">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            @csrf

            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>State Name:</strong>
                    <select class="form-control" data-error='State Name Field is required' required name="stateId" id="stateId">
                        <option value="" selected disabled> Select User Name </option>
                        @foreach ($state as $state)
                        <option value="{{ $state->id }}">{{ $state->stateName }}</option>
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
                <input id="cityName" type="text" name="cityName" class="form-control" placeholder="City Name">
                @if ($errors->has('cityName'))
                <span class="error">{{ $errors->first('cityName') }}</span>
                @endif
            </div>



            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
<<<<<<< HEAD
                <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
=======
                <button type="submit" class="btn btn-primary">Submit</button>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>
<<<<<<< HEAD

<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Submit');
            $.ajax({
                data: $('#cityForm').serialize(),
                url: "{{ route('city.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Created',
                            text: response.message,
                        });
                        $('#cityForm').trigger("reset");

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
</script>

=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
@endsection