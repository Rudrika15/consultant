@extends('layouts.app')

@section('header', 'Privacy Policy')
@section('content')

{{-- Message --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Success!</strong> {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Error!</strong> {{ session('error') }}
</div>
@endif

<div class="card">
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div>
            <h4>Create Privacy Policy</h4>
        </div>
        <div>
            <a href="{{ route('policy.index') }}" class="btn btn-info btn-sm">BACK</a>
        </div>
    </div>

    <div class="card-body">
        <form class="form-group" id="policyForm" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-label-group mt-3">
                <label for="policy" class="fw-bold">Privacy Policy Details<sup class="text-danger">*</sup></label>
                <textarea id="policy" rows="10" name="policy" class="form-control"></textarea>
                @error('policy')
                <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary" id="saveBtn">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#policy'))
        .then(editor => {
            // console.log(inquiry );
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#policyForm').submit(function (e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('policy-store')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        }).then(() => {
                            $('#policyForm').trigger("reset");
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred!',
                        });
                    }
                },
                error: function (xhr, status, error) {
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