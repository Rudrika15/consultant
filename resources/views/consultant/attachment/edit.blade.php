@extends('layouts.app')

@section('header','Attachment')
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
            <h4 class="">Create Attachment</h4>
        </div>
        <div class="">
            <a href="{{ route('attachment.index') }}" class="btn btn-info btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="attachmentForm" name="attachmentForm" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" id="id" value="{{$attachment->id}}">
            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" value="{{$attachment->title}}" class="form-control"
                    placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="file" class="fw-bold">File <sup class="text-danger">*</sup></label>
                <input id="file" type="file" name="file" class="form-control" placeholder="file">
                <img id="preview-file" class="mt-3" src="{{ url('/attachment/' . $attachment->file) }}" alt=""
                    style="height:100px; width: 100px;">

                @if ($errors->has('file'))
                <span class="error">{{ $errors->first('file') }}</span>
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
    $('#file').change(function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-file').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    $('#attachmentForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        
        $.ajax({
            type: 'POST',
            url: "{{ route('attachment.update') }}",
            data: formData,
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
                        $('#attachmentForm').trigger("reset");
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