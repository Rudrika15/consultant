@extends('layouts.app')

@section('header','Social Master')
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
            <h4 class="">Create Social Master</h4>
        </div>
        <div class="">
            <a href="{{ route('socialMaster.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="socialForm" enctype="multipart/form-data" method="post">
            @csrf


            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="logo" class="fw-bold">Logo <sup class="text-danger">*</sup></label>
                <input id="logo" type="file" name="logo" class="form-control" placeholder="logo">
                <img id="preview-logo" width="100px" height="100px"  class="mt-3">

                @if ($errors->has('logo'))
                <span class="error" id="image-input-error">{{ $errors->first('logo') }}</span>
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
    /*------------------------------------------
    --------------------------------------------
    File Input Change Event
    --------------------------------------------
    --------------------------------------------*/
    $('#logo').change(function() {
        let reader = new FileReader();

        reader.onload = (e) => {
            $('#preview-logo').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

    /*------------------------------------------
    --------------------------------------------
    Form Submit Event
    --------------------------------------------
    --------------------------------------------*/
    $('#socialForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        $('#image-input-error').text('');

        $.ajax({
            type: 'POST',
            url: "{{ route('socialMaster.store') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Created',
                            text: response.message,
                        });
                        $('#socialForm').trigger("reset");

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
</script>

@endsection