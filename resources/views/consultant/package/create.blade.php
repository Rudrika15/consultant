@extends('layouts.app')

@section('header','Package')
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
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Create Package</h4>
        </div>
        <div class="">
            <a href="{{ route('package.index') }}" class="btn btn-info btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="packageForm" name="packageForm" enctype="multipart/form-data">
            @csrf

            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="price" class="fw-bold">Price <sup class="text-danger">*</sup></label>
                <input id="price" type="text" name="price" class="form-control" placeholder="Price">
                @if ($errors->has('price'))
                <span class="error">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="detail" class="fw-bold">Detail <sup class="text-danger">*</sup></label>
                <input id="detail" type="text" name="detail" class="form-control" placeholder="Detail">
                @if ($errors->has('detail'))
                <span class="error">{{ $errors->first('Detail') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="validUpTo" class="fw-bold">Valid Up To <sup class="text-danger">*</sup></label>
                <input id="validUpTo" type="text" name="validUpTo" class="form-control" placeholder="Valid Up To">
                @if ($errors->has('validUpTo'))
                <span class="error">{{ $errors->first('validUpTo') }}</span>
                @endif
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
            </div>

        </form>

        <!-- </div> -->
    </div>

    <!-- Collapsable Card Example -->

</div>

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
                data: $('#packageForm').serialize(),
                url: "{{ route('package.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    // window.open("/time-index", "_self");
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        $('#packageForm').trigger("reset");
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