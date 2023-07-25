@extends('layouts.app')

@section('header','Social Link')
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
            <h4 class="">Create Social Link</h4>
        </div>
        <div class="">
            <a href="{{ route('socialLink.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="socialLinkForm" name="socialLinkForm" action="{{route('socialLink.store')}}" enctype="multipart/form-data" method="post">
            @csrf


            <div class="form-label-group mt-3">
                <div class="form-group">

                    <strong>Social Media Master:</strong>
                    <select class="form-control" data-error='Social Media Master Field is required' required name="socialMediaMasterId" id="socialMediaMasterId">
                        <option value="" selected disabled> Select Social Media Master </option>
                        @foreach ($socialMaster as $socialMaster)
                        <option value="{{ $socialMaster->id }}">{{ $socialMaster->title }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('socialMediaMasterId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="form-label-group mt-3">
                <label for="url" class="fw-bold">Url <sup class="text-danger">*</sup></label>
                <input id="url" type="text" name="url" class="form-control" placeholder="url">
                @if ($errors->has('url'))
                <span class="error">{{ $errors->first('url') }}</span>
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
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            $.ajax({
                data: $('#socialLinkForm').serialize(),
                url: "{{ route('socialLink.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    window.open("/socialLink-index", "_self");
                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
    });
</script>



@endsection