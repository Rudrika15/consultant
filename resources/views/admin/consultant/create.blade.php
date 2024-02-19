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

                        <div class="col-md-12 pt-4">
                            <input id="about" type="longtext" class="form-control register-form  " name="about"
                                placeholder="About">

                            @error('about')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="col-md-12 pt-4">
                            <input id="skypeId" type="text" class="form-control register-form  " name="skypeId"
                                placeholder="Skype Id">

                            @error('skypeId')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="col-md-12 pt-4">
                            <input id="webSite" type="text" class="form-control register-form  " name="webSite"
                                placeholder="Website">

                            @error('webSite')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 pt-4">
                            <input id="map" type="text" class="form-control register-form  " name="map"
                                placeholder="Map">
                            @error('map')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-12 pt-4">
                            <input id="address" type="text" class="form-control register-form  " name="address"
                                placeholder="Address">

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-md-6 pt-4" id="packagediv">
                            <select class="form-select register-form" aria-label="Default select example" id="packageId"
                                name="packageId">
                                <option value="">-- Select Package --</option>
                                @foreach ($adminpackages as $data)
                                <option value={{ $data->id }}>{{ $data->title }}</option>
                                @endforeach
                            </select>
                            @error('packageId')
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


                        <div class="col-md-12 pt-4">
                            <input id="company" type="text" class="form-control register-form  " name="company"
                                placeholder="Company Name">

                            @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>




                    </div>


            </div>


            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Achievement Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold"> Achievement Image <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img id="preview-photo" src="achievement/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">

                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
                @endif
            </div>


            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Attachment Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="file" class="fw-bold">Attachment File <sup class="text-danger">*</sup></label>
                <input id="file" type="file" name="file" class="form-control" placeholder="file">
                <img id="preview-file" src="attachment/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">

                @if ($errors->has('file'))
                <span class="error">{{ $errors->first('file') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Certificate Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold">Certificate Photo <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img id="preview-photo" src="certificate/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">

                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
                @endif
            </div>



            <div class="form-label-group mt-3">
                <label for="title" class="fw-bold">Gallery Image Title <sup class="text-danger">*</sup></label>
                <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </div>

            <div class="form-label-group mt-3">
                <label for="photo" class="fw-bold">Gallery Photo <sup class="text-danger">*</sup></label>
                <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                <img id="preview-photo" src="gallery/default.jpg" name="preview-photo" class="mt-3" width="100px"
                    height="100px">

                @if ($errors->has('photo'))
                <span class="error">{{ $errors->first('photo') }}</span>
                @endif
            </div>


            <div class="form-label-group mt-3">
                <div class="form-group">
                    <strong>Language Master Name:</strong>
                    <select class="form-control" data-error='Language Field is required' required name="languageId"
                        id="languageId">
                        <option value="" selected disabled> Select Language Master </option>
                        @foreach ($languageMaster as $languageMasterData)
                        <option value="{{ $languageMasterData->id }}">{{ $languageMasterData->language }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                    @error('languageId')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-label-group mt-3">
                    <label for="title" class="fw-bold">Package Title <sup class="text-danger">*</sup></label>
                    <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                    @if ($errors->has('title'))
                    <span class="error">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-label-group mt-3">
                    <label for="price" class="fw-bold">Package Price <sup class="text-danger">*</sup></label>
                    <input id="price" type="text" name="price" class="form-control" placeholder="Price">
                    @if ($errors->has('price'))
                    <span class="error">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <div class="form-label-group mt-3">
                    <label for="detail" class="fw-bold">Package Detail <sup class="text-danger">*</sup></label>
                    <input id="detail" type="text" name="detail" class="form-control" placeholder="Detail">
                    @if ($errors->has('detail'))
                    <span class="error">{{ $errors->first('Detail') }}</span>
                    @endif
                </div>

                <div class="form-label-group mt-3">
                    <label for="validUpTo" class="fw-bold">Package Valid Up To <sup class="text-danger">*</sup></label>
                    <input id="validUpTo" type="text" name="validUpTo" class="form-control" placeholder="Valid Up To">
                    @if ($errors->has('validUpTo'))
                    <span class="error">{{ $errors->first('validUpTo') }}</span>
                    @endif
                </div>


                <div class="form-label-group mt-3">
                    <div class="form-group">
                        <strong>Social Media Master:</strong>
                        <select class="form-control" data-error='Social Media Master Field is required' required
                            name="socialMediaMasterId" id="socialMediaMasterId">
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



                    <div class="form-label-group mt-3">
                        <label for="start_time" class="fw-bold">Start Time <sup class="text-danger">*</sup></label>
                        <input id="start_time" type="time" name="start_time" class="form-control"
                            placeholder="Start Time" required>
                        @if ($errors->has('start_time'))
                        <span class="error">{{ $errors->first('start_time') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mt-3">
                        <label for="end_time" class="fw-bold">End Time <sup class="text-danger">*</sup></label>
                        <input id="end_time" type="time" name="end_time" class="form-control" placeholder="End Time"
                            required>
                        @if ($errors->has('end_time'))
                        <span class="error">{{ $errors->first('end_time') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mt-3">
                        <label for="day" class="fw-bold">Day <sup class="text-danger">*</sup></label>
                        <select class="form-control" data-error='State Name Field is required' required name="day"
                            id="day">
                            <option value="" selected disabled> Select Day </option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                        <div class="help-block with-errors"></div>
                        @if ($errors->has('day'))
                        <span class="error">{{ $errors->first('day') }}</span>
                        @endif
                    </div>


                    <div class="form-label-group mt-3">
                        <label for="url" class="fw-bold">Video Url <sup class="text-danger">*</sup></label>
                        <input id="url" type="text" name="url" class="form-control" placeholder="url">
                        @if ($errors->has('url'))
                        <span class="error">{{ $errors->first('url') }}</span>
                        @endif
                    </div>


                    <div class="form-label-group mt-3">
                        <label for="title" class="fw-bold">Workshop Title <sup class="text-danger">*</sup></label>
                        <input id="title" type="text" name="title" class="form-control" placeholder="Title">
                        @if ($errors->has('title'))
                        <span class="error">{{ $errors->first('title') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mt-3">
                        <label for="price" class="fw-bold">Workshop Price <sup class="text-danger">*</sup></label>
                        <input id="price" type="text" name="price" class="form-control" placeholder="Price">
                        @if ($errors->has('price'))
                        <span class="error">{{ $errors->first('price') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mt-3">
                        <label for="photo" class="fw-bold">Workshop Photo <sup class="text-danger">*</sup></label>
                        <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                        <img id="preview-photo" src="gallery/default.jpg" name="preview-photo" class="mt-3"
                            width="100px" height="100px">

                        @if ($errors->has('photo'))
                        <span class="error">{{ $errors->first('photo') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mt-3">
                        <label for="detail" class="fw-bold">Workshop Detail <sup class="text-danger">*</sup></label>
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
                                    <input class="form-check-input" type="radio" name="workshopType" id="Online"
                                        value="Online">
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
                        <label for="link" class="fw-bold">Workshop Link</label>
                        <input id="link" type="text" name="link" class="form-control" placeholder="link">

                    </div>
                    <div class="form-label-group mt-3" id="address" style="display:none;">
                        <label for="address" class="fw-bold">Workshop Address </label>
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

                    <div class="form-label-group mt-3">
                        <label for="photo" class="fw-bold"> Profile Photo <sup class="text-danger">*</sup></label>
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