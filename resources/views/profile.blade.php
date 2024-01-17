@extends('layouts.app')

@section('header','Profile')
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
            <h4 class="">Update Profile</h4>
        </div>

    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="profileForm" name="profileForm" action="{{route('profile.update')}}"
            enctype="multipart/form-data" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$profile->id}}">

            <div class="form-label-group mt-3">
                <label for="about" class="fw-bold">About</label>
                <textarea id="about" name="about" class="form-control">{!!$profile->about!!}</textarea>
                @if ($errors->has('about'))
                <span class="error">{{ $errors->first('about') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="contactNo2" class="fw-bold">Mobile Number</label>
                <input id="contactNo2" type="text" name="contactNo2" class="form-control" placeholder="contactNo"
                    value="{{$profile->contactNo2}}">
                @if ($errors->has('contactNo2'))
                <span class="error">{{ $errors->first('contactNo2') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="skypeId" class="fw-bold">SkypeId</label>
                <input id="skypeId" type="text" name="skypeId" class="form-control" placeholder="skypeId"
                    value="{{$profile->skypeId}}">
                @if ($errors->has('skypeId'))
                <span class="error">{{ $errors->first('skypeId') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="webSite" class="fw-bold">Web Site</label>
                <input id="webSite" type="text" name="webSite" class="form-control" placeholder="webSite"
                    value="{{$profile->webSite}}">
                @if ($errors->has('webSite'))
                <span class="error">{{ $errors->first('webSite') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="map" class="fw-bold">Map</label>
                <input id="map" type="text" name="map" class="form-control" placeholder="map" value="{{$profile->map}}">
                @if ($errors->has('map'))
                <span class="error">{{ $errors->first('map') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="address" class="fw-bold">Address</label>
                <textarea id="address" name="address" class="form-control">{!!$profile->address!!}</textarea>
                @if ($errors->has('address'))
                <span class="error">{{ $errors->first('address') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">

                <div class="col-auto">
                    <label for="name" class="col-form-label text-md-end fw-bold">{{ __('State') }}</label>

                    <select class="form-select" aria-label="Default select example" id="stateId" name="stateId"
                        value="{{ old('stateId') }}" autocomplete="stateId" autofocus>
                        <option value="">-- Select State --</option>
                        @foreach($states as $data)
                        <option value="{{ $data->id }}" {{ old('stateId', $data->id ) == $data->id ? 'selected' :
                            '' }}>
                            {{ $data->stateName }} </option>
                        {{-- <option value="{{$data->id}}">{{$data->stateName}}</option> --}}
                        @endforeach
                    </select>
                    @error('stateId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="col-auto">
                    <label for="name" class="col-form-label text-md-end fw-bold">{{ __('City') }}</label>
                    <input type="hidden">
                    <select class="form-select" aria-label="Default select example" id="cityId" name="cityId"
                        value="{{ old('cityId') }}" autocomplete="cityId" autofocus>
                        <option value="">-- Select City --</option>
                        @foreach($cities as $data)
                        <option value="{{ $data->id }}" {{ old('cityId', $data->id ) == $data->id ? 'selected' :
                            '' }}>
                            {{ $data->cityName }} </option>
                        @endforeach
                    </select>
                    @error('cityId')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-label-group mt-3">
                <label for="pincode" class="fw-bold">Pin Code</label>
                <input id="pincode" type="text" name="pincode" class="form-control" placeholder="pincode"
                    value="{{$profile->pincode}}">
                @if ($errors->has('pincode'))
                <span class="error">{{ $errors->first('pincode') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <div class="row">
                    <div class="col-6">
                        <label for="photo" class="fw-bold">Photo</label>
                        <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                        @if ($errors->has('photo'))
                        <span class="error">{{ $errors->first('photo') }}</span>
                        @endif
                    </div>
                    <div class="col-6">

                        <img id="preview-photo" src="{{ asset('profile/' . $profile->photo) }}" alt="" width="70px"
                            height="70px" class="img mt-3">
                    </div>
                </div>



            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-5 text-center">
                <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
            </div>

        </form>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#about'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#address'))
        .then(editor => {
            // console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    $(document).ready(function() {

        $('#stateId').on('change', function() {
            var idState = this.value;
            $("#cityId").html('');
            $.ajax({
                url: "{{url('city')}}",
                type: "POST",
                data: {
                    stateId: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    $('#cityId').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function(key, value) {
                        $("#cityId").append('<option value="' + value
                            .id + '">' + value.cityName + '</option>');
                    });
                }
            });

        });
    });
</script>

<!--  -->

@endsection