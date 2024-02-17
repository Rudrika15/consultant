@extends('layouts.app')

@section('header','Consultant')
@section('content')



<div class="main_page">
    <div class="grid pt-4">

    </div>
    <div class="container mt-5">
        <div class="card-header"
            style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

            <div class="">
                <h4 class="">Add Consultant</h4>
            </div>
            <div class="">
                <a href="{{ route('consultant.index') }}" class="btn btnback btn-sm btn-info">BACK</a>

                <!-- /.sub-menu -->
            </div>
        </div>
        <div class="tab-content register-page" id="myTabContent">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register">
                <!-- Outer Row -->

                <form action="{{route('consultant.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="userType" value="Consultant">
                    <div class="row">
                        <div class="col-md-6 pt-4">
                            <input id="name" type="text"
                                class="form-control register-form  @error('name') is-invalid @enderror" name="name"
                                placeholder="First Name" value="{{ old('name') }}" required autocomplete="name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 pt-4">
                            <input id="lastName" type="text"
                                class="form-control register-form  @error('lastName') is-invalid @enderror"
                                name="lastName" placeholder="Last Name" value="{{ old('lastName') }}" required
                                autocomplete="lastName">

                            @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 pt-4">
                            <input id="email" type="email"
                                class="form-control register-form @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="col-md-3 pt-4">
                            <input id="password" type="password"
                                class="form-control register-form  @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-3 pt-4">
                            <input id="password-confirm" type="password" class="form-control register-form"
                                name="password_confirmation" placeholder="Confirm Password" required
                                autocomplete="new-password">

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> --}}


                        <div class="col-md-6 pt-4">
                            <select class="form-select register-form" aria-label="Default select example" id="stateId"
                                name="stateId" value="{{ old('stateId') }}" required autocomplete="stateId">
                                <option value="">-- Select State --</option>
                                @foreach($states as $data)
                                <option value="{{$data->id}}">{{$data->stateName}}</option>
                                @endforeach

                            </select>
                            @error('stateId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-6 pt-4">
                            <select class="form-select register-form" aria-label="Default select example" id="cityId"
                                name="cityId" required>
                                <option value="">-- Select City --</option>
                                @foreach($cities as $data)
                                <option value="{{$data->id}}">{{$data->cityName}}</option>
                                @endforeach
                                <option value="other">Other</option>
                            </select>

                            <!-- Hidden text box for other city -->
                            <div id="otherCityDiv" style="display: none; margin-top: 20px">
                                <input id="otherCity" type="text" class="form-control register-form" name="otherCity"
                                    placeholder="Enter City">
                            </div>

                            @error('cityId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                        <div class="col-md-6 pt-4">
                            <input id="contactNo" type="text"
                                class="form-control register-form @error('contactNo') is-invalid @enderror"
                                name="contactNo" placeholder="Contact No" value="{{ old('contactNo') }}" required
                                autocomplete="contactNo">

                            @error('contactNo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 pt-4">
                            <label for="gender">Gender</label>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Male"
                                            value="Male" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="Female"
                                            value="Female">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-6 pt-4">
                            <input id="birthdate" type="date"
                                class="form-control register-form  @error('birthdate') is-invalid @enderror"
                                name="birthdate" placeholder="BirthDate" value="{{ old('birthdate') }}" required
                                autocomplete="birthdate">

                            @error('birthdate')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>






                        {{-- <div id="become_consultant" class="row" style="display: none"> --}}
                            <div class="col-md-12 pt-4">
                                <input id="company" type="text" class="form-control register-form  " name="company"
                                    placeholder="Company Name">

                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pt-4">
                                <select class="form-select register-form" aria-label="Default select example"
                                    id="categoryId" name="categoryId">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $data)
                                    <option value="{{$data->id}}">{{$data->catName}}</option>
                                    @endforeach
                                    <option value="other">Other</option>
                                </select>
                                <div id="otherCategoryDiv" style="display: none; margin-top: 20px">
                                    <input type="text" class="form-control register-form" id="otherCategory"
                                        name="otherCategory" placeholder="Enter Other Category">
                                </div>
                                @error('categoryId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 pt-4" id="packagediv">
                                <select class="form-select register-form" aria-label="Default select example"
                                    id="packageId" name="packageId">
                                    <option value="">-- Select Package --</option>
                                    @foreach ($adminpackages as $data)
                                    <option value={{$data->id}}>{{$data->title}}</option>
                                    @endforeach
                                </select>
                                @error('packageId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-label-group mt-3">
                            <label for="photo" class="fw-bold">Photo <sup class="text-danger">*</sup></label>
                            <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                            <img id="preview-photo" src="gallery/default.jpg" name="preview-photo" class="mt-3"
                                width="100px" height="100px">

                            @if ($errors->has('photo'))
                            <span class="error">{{ $errors->first('photo') }}</span>
                            @endif
                        </div>



                        <div class="col-md-12 text-center pt-5">
                            <button type="submit" class="btn btn-primary">
                                Add
                            </button>
                            <button type="submit" class="btn btn-danger">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $("#categoryId").on('change', function() {
            var selectedCategory = $(this).val();
            if (selectedCategory === 'other') {
                $("#otherCategoryDiv").show();
            } else {
                $("#otherCategoryDiv").hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#stateId').on('change', function() {
            var idState = this.value;
            $("#cityId").html('');
            $.ajax({
                url: "{{url('fetchCityAdmin')}}",
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

                    // Append the "Other" option after fetching the cities
                        $("#cityId").append('<option value="other">Other</option>');
                }
            });
        });

        $('#cityId').on('change', function () {
        var selectedCity = $(this).val();
        
        // Show or hide the text box based on the selected city
        if (selectedCity === 'other') {
        $('#otherCityDiv').show();
        } else {
        $('#otherCityDiv').hide();
        }
        });
        });
</script>



@endsection