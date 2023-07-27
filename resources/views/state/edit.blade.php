@extends('layouts.app')

@section('header','Fair')
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



<div class="box-content card">
    <!-- /.box-title -->
    <div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Edit State</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('state.index') }}" class="btn btnback btn-sm">BACK</a>
=======
            <a href="{{ route('state.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
<<<<<<< HEAD
        <form class="form-group" id="sateForm" enctype="multipart/form-data">
=======
        <form class="form-group" action="{{route('state.update')}}" enctype="multipart/form-data" method="post">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            @csrf

            <input type="hidden" name="id" id="id" value="{{$state->id}}">

            <div class="form-label-group mt-3">
                <label for="stateName" class="fw-bold">State Name <sup class="text-danger">*</sup></label>
                <input id="stateName" type="text" name="stateName" class="form-control" placeholder="State Name" value="{{$state->stateName}}">
                @if ($errors->has('stateName'))
                <span class="error">{{ $errors->first('stateName') }}</span>
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
        $(document).ready(function() {
            // Get the values you want to update
            $("#sateForm").submit(function(event) {
                event.preventDefault();
                var id = $('#id').val();
                var stateName = $('#stateName').val();
                $.ajax({
                    url: "{{ route('state.update') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include the CSRF token for Laravel security
                        id: id,
                        stateName: stateName
                    },
                    success: function(response) {
                        if (response.success) {
                            // Success message using SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Updated',
                                text: response.message,
                            });

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
=======
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1


@endsection