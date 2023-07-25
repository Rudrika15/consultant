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
    <!-- /.box-title -->
    <div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Create Time</h4>
        </div>
        <div class="">
            <a href="{{ route('time.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group"id="timeForm" name="timeForm" action="{{route('time.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            
            <div class="form-label-group mt-3">
                <label for="time" class="fw-bold">Time <sup class="text-danger">*</sup></label>
                <input id="time" type="time" name="time" class="form-control" placeholder="time">
                @if ($errors->has('time'))
                <span class="error">{{ $errors->first('time') }}</span>
                @endif
            </div>
        
            <div class="form-label-group mt-3">
                <label for="day" class="fw-bold">Day <sup class="text-danger">*</sup></label>
                <input id="day" type="text" name="day" class="form-control" placeholder="day">
                @if ($errors->has('day'))
                <span class="error">{{ $errors->first('day') }}</span>
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
  $(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
     $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
          data: $('#timeForm').serialize(),
          url: "{{ route('time.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
                    window.open("/time-index", "_self");  
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
});     
</script>
@endsection