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
            <input type="hidden" name="id" id="id" value="{{$package->id}}">
            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" value="{{$package->title}}" class="form-control"
                    placeholder="title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="price" class="fw-bold">Price <sup class="text-danger">*</sup></label>
                <input id="price" type="text" name="price" value="{{$package->price}}" class="form-control"
                    placeholder="price">
                @if ($errors->has('price'))
                <span class="error">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="detail" class="fw-bold">Detail <sup class="text-danger">*</sup></label>
                <input id="detail" type="text" name="detail" value="{{$package->detail}}" class="form-control"
                    placeholder="detail">
                @if ($errors->has('detail'))
                <span class="error">{{ $errors->first('Detail') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="validUpTo" class="fw-bold">ValidUpTo <sup class="text-danger">*</sup></label>
                <input id="validUpTo" type="text" name="validUpTo" value="{{$package->validUpTo}}" class="form-control"
                    placeholder="validUpTo">
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
    $(function () {
     
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $(document).ready(function() {
        // Get the values you want to update                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
        $("#packageForm").submit(function(event){
            event.preventDefault();
            var id = $('#id').val();
            var title = $('#title').val();
            var price = $('#price').val();
            var detail = $('#detail').val();
            var validUpTo = $('#validUpTo').val();
            $.ajax({
                url: '{{ route('package.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Include the CSRF token for Laravel security
                    id: id,
                    title: title,
                    price: price,
                    detail: detail,
                    validUpTo: validUpTo,
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

@endsection