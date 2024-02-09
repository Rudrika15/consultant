@extends('layouts.app')

@section('header', 'Terms & Condition')
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
            <h4 class="">Update Terms & Condition</h4>
        </div>
        <div class="">
            <a href="{{ route('terms.index') }}" class="btn btn-info btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="termsForm" enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" id="termsId" name="termsId" value="{{$terms->id}}">
            <div class="form-label-group mt-3">
                <label for="terms" class="fw-bold">Terms & Condition Details<sup class="text-danger">*</sup></label>
                <textarea id="terms" rows="10" name="terms" class="form-control">{!!$terms->terms!!}</textarea>
                @if ($errors->has('terms'))
                <span class="error">{{ $errors->first('terms') }}</span>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
            .create(document.querySelector('#terms'))
            .then(editor => {
                // console.log(inquiry );
            })
            .catch(error => {
                console.error(error);
            });
</script>
<script type="text/javascript">
    $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#termsForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
    
            $.ajax({
                type: 'POST',
                url: "{{ route('terms.update') }}",
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
                        // $('#termsForm').trigger("reset");
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