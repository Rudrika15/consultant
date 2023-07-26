@extends('layouts.app')

@section('header','Category')
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
            <h4 class="">Edit Category</h4>
        </div>
        <div class="">
            <a href="{{ route('category.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="categoryForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$category->id}}">


            <div class="form-label-group mt-3">
                <label for="catName" class="fw-bold">Category Name <sup class="text-danger">*</sup></label>
                <input id="catName" type="text" name="catName" class="form-control" placeholder="Category Name" value="{{$category->catName}}">
                @if ($errors->has('catName'))
                <span class="error">{{ $errors->first('catName') }}</span>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary" id="">Submit</button>
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
        $(document).ready(function() {
            // Get the values you want to update
            $("#categoryForm").submit(function(event) {
                event.preventDefault();
                var id = $('#id').val();
                var catName = $('#catName').val();

                $.ajax({
                    url: "{{ route('category.update') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include the CSRF token for Laravel security
                        id: id,
                        catName: catName
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

@endsection