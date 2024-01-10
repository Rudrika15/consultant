@extends('layouts.app')

@section('header','Time')
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
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Create Time</h4>
        </div>
        <div class="">
            <a href="{{ route('time.index') }}" class="btn btn-info btn-sm">BACK</a>
        </div>
    </div>

    <div class="card-body">
        <form class="form-group" id="timeForm" name="timeForm" enctype="multipart/form-data">
            @csrf

            <div class="form-label-group mt-3">
                <label for="start_time" class="fw-bold">Start Time <sup class="text-danger">*</sup></label>
                <input id="start_time" type="time" name="start_time" class="form-control" placeholder="Start Time"
                    required>
                @if ($errors->has('start_time'))
                <span class="error">{{ $errors->first('start_time') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="end_time" class="fw-bold">End Time <sup class="text-danger">*</sup></label>
                <input id="end_time" type="time" name="end_time" class="form-control" placeholder="End Time" required>
                @if ($errors->has('end_time'))
                <span class="error">{{ $errors->first('end_time') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="day" class="fw-bold">Day <sup class="text-danger">*</sup></label>
                <select class="form-control" data-error='State Name Field is required' required name="day" id="day">
                    <option value="" selected disabled> Select Day </option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
                <div class="help-block with-errors"></div>
                @if ($errors->has('day'))
                <span class="error">{{ $errors->first('day') }}</span>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
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
                data: $('#timeForm').serialize(),
                url: "{{ route('time.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        });
                        $('#timeForm').trigger("reset");
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred!',
                        });
                    }
                },
                error: function(xhr, status, error) {
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