@extends('layouts.app')

@section('header', 'Admin Workshop')
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
            <h4 class="">Create Workshop</h4>
        </div>
        <div class="">
            <a href="{{ route('adminworkshop.index') }}" class="btn btn-info btn-sm">BACK</a>
        </div>
    </div>

    <div class="card-body">
        <form class="form-group" action="{{ route('adminworkshop.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">

            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="price" class="fw-bold">Price <sup class="text-danger">*</sup></label>
                <input id="price" type="text" name="price" class="form-control" placeholder="Price">
                @if ($errors->has('price'))
                <span class="error">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold">Photo <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img id="preview-photo" src="gallery/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">
                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="detail" class="fw-bold">Detail <sup class="text-danger">*</sup></label>
                <textarea id="detail" rows="10" name="detail" class="form-control"></textarea>
                @if ($errors->has('detail'))
                <span class="error">{{ $errors->first('detail') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="price" class="fw-bold">Workshop Type <sup class="text-danger">*</sup></label>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="workshopType" id="Online" value="Online">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ __('Online') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="workshopType" id="Offline"
                                value="Offline">
                            <label class="form-check-label" for="flexRadioDefault2">
                                {{ __('Offline') }}
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('workshopType'))
                    <span class="error">{{ $errors->first('workshopType') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-label-group mt-3" id="link" style="display:none;">
                <label for="link" class="fw-bold">Link</label>
                <input id="link" type="text" name="link" class="form-control" placeholder="link">
            </div>

            <div class="form-label-group mt-3" id="address" style="display:none;">
                <label for="address" class="fw-bold">Address </label>
                <input id="address" type="text" name="address" class="form-control" placeholder="address">
            </div>

            <div class="form-label-group mt-3">
                <label for="workshopDate" class="fw-bold">Workshop Date <sup class="text-danger">*</sup></label>
                <input id="workshopDate" type="date" name="workshopDate" class="form-control"
                    placeholder="workshopDate">
                @if ($errors->has('workshopDate'))
                <span class="error">{{ $errors->first('workshopDate') }}</span>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#detail'))
        .then(editor => {
            // console.log(inquiry );
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#Online").click(function () {
            $("#link").show();
            $("#address").hide();
        });
        $("#Offline").click(function () {
            $("#address").show();
            $("#link").hide();
        });
    });
</script>

@endsection