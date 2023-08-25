@extends('layouts.app')

@section('header','Slider')
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
            <h4 class="">Update Slider</h4>
        </div>
        <div class="">
            <a href="{{ route('slider.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="sliderForm" name="sliderForm" enctype="multipart/form-data">
            @csrf
            <input type="text" id="sliderId" name="sliderId" value="{{$slider->id}}">
            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>Type</strong>
                    <select class="form-control" required name="type" id="type">
                        <option value="{{ $slider->type }}">{{ $slider->type }}</option>
                        <option value="Home">Home</option>
                        <option value="Inner">Inner</option>  
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold">Photo <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img id="preview-photo" src="{{url('/slider/'.$slider->photo)}}" name="preview-photo"  class="mt-3" width="100px" height="100px">

                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
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
    $(document).ready(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#photo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-photo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
        $('#sliderForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('slider.update') }}",
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
                    }, 200);
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