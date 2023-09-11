@extends('layouts.app')

@section('header','Pincode')
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
            <h4 class="">Create Pincode</h4>
        </div>
        <div class="">
            <a href="{{ route('pincode.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="pincodeForm" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>City Name:</strong>
                    <select class="form-control" data-error='State Name Field is required' required name="cityId" id="cityId">
                        <option value="" selected disabled> Select User Name </option>
                        @foreach ($city as $city)
                        <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('stateId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="form-label-group mt-3">
                <label for="areaName" class="fw-bold">Area Name <sup class="text-danger">*</sup></label>
                <input id="areaName" type="text" name="areaName" class="form-control" placeholder="Area Name">
                @if ($errors->has('areaName'))
                <span class="error">{{ $errors->first('areaName') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="pincode" class="fw-bold">Pincode <sup class="text-danger">*</sup></label>
                <input id="pincode" type="text" name="pincode" class="form-control" placeholder="Pincode">
                @if ($errors->has('pincode'))
                <span class="error">{{ $errors->first('pincode') }}</span>
                @endif
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>

<script type="text/javascript">
    $(document).ready(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#pincodeForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('pincode-store')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        },200);
                        $('#pincodeForm').trigger("reset");
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

@endsection