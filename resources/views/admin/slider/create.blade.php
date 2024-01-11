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
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Create Slider</h4>
        </div>
        <div class="">
            <a href="{{ route('slider.index') }}" class="btn btn-info btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="sliderForm" name="sliderForm" action="{{route('gallery.store')}}"
            enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>Type</strong>
                    <select class="form-control" required name="type" id="type">
                        <option value="" selected disabled> Select Type </option>
                        <option value="Home">Home</option>
                        <option value="About Us">About Us</option>
                        <option value="Find Consultant">Find Consultant</option>
                        <option value="Membership Plan">Membership Plan</option>
                        <option value="Corporate Inquiry">Corporate Inquiry</option>
                        <option value="Contact Us">Contact Us</option>

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
                <img id="preview-photo" src="slider/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('slider-store')}}",
                data: formData,
                cache: false,
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
                        $('#sliderForm').trigger("reset");
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

{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
@endsection