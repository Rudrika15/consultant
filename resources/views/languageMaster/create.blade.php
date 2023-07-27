@extends('layouts.app')

@section('header','Language Master')
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
            <h4 class="">Create Language Master</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('languageMaster.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('languageMaster.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
<<<<<<< HEAD
        <form class="form-group" id="languageForm" enctype="multipart/form-data" method="post">
=======
        <form class="form-group" action="{{route('languageMaster.store')}}" enctype="multipart/form-data" method="post">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            @csrf


            <div class="form-label-group mt-3">
                <label for="language" class="fw-bold">Language Master <sup class="text-danger">*</sup></label>
                <input id="language" type="text" name="language" class="form-control" placeholder="language">
                @if ($errors->has('language'))
                <span class="error">{{ $errors->first('language') }}</span>
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
                data: $('#languageForm').serialize(),
                url: "{{ route('languageMaster.store') }}",
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
                        $('#languageForm').trigger("reset");

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