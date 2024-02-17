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
                <h4 class="">Edit Consultant</h4>
            </div>
            <div class="">
                <a href="{{ route('consultant.index') }}" class="btn btnback btn-sm btn-info">BACK</a>

                <!-- /.sub-menu -->
            </div>
        </div>
        <div class="tab-content register-page" id="myTabContent">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register">
                <!-- Outer Row -->

                {{-- <form action="{{ route('consultant.update') }}" method="post"> --}}
                    <form action="{{ route('consultant.update') }}" method="post">

                        {{-- <form action="{{ route('consultant.update', $profile->user->id) }}" method="POST"> --}}
                            @csrf
                            <input type="hidden" id="userId" name="userId" value="{{$user->id}}">


                            <div class="row">
                                <div class="col-md-6 pt-4">
                                    <input id="name" type="text"
                                        class="form-control register-form @error('name') is-invalid @enderror"
                                        name="name" placeholder="First Name" value="{{ $user->name }}"
                                        autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 pt-4">
                                    <input id="lastName" type="text"
                                        class="form-control register-form @error('lastName') is-invalid @enderror"
                                        name="lastName" placeholder="Last Name" value="{{ $user->lastName }}"
                                        autocomplete="lastName">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 pt-4">
                                    <input id="email" type="email"
                                        class="form-control register-form @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" value="{{ $user->email }}"
                                        autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-3 pt-4">
                                    <input id="password" type="password"
                                        class="form-control register-form @error('password') is-invalid @enderror"
                                        name="password" placeholder="Password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-3 pt-4">
                                    <input id="password-confirm" type="password" class="form-control register-form"
                                        name="password_confirmation" placeholder="Confirm Password"
                                        autocomplete="new-password">
                                </div> --}}

                                <div class="col-md-3 pt-4">

                                </div>


                                <div class="col-md-6 pt-4">
                                    <select class="form-select register-form" aria-label="Default select example"
                                        id="stateId" name="stateId">
                                        <option value="">-- Select State --</option>
                                        @foreach($states as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $profile->stateId ? 'selected' :
                                            ''
                                            }}>{{$data->stateName}}
                                        </option>



                                        @endforeach
                                    </select>
                                    @error('stateId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 pt-4">
                                    <select class="form-select register-form" aria-label="Default select example"
                                        id="cityId" name="cityId">
                                        <option value="">-- Select City --</option>
                                        @foreach($cities as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $profile->cityId ? 'selected' : ''
                                            }}>
                                            {{$data->cityName}}</option>
                                        @endforeach
                                        <option value="other">Other</option>
                                    </select>

                                    <!-- Hidden text box for other city -->
                                    <div id="otherCityDiv" style="display: none; margin-top: 20px">
                                        <input id="otherCity" type="text" class="form-control register-form"
                                            name="otherCity" placeholder="Enter City" value="{{ $profile->cityId }}">
                                    </div>

                                    @error('cityId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 pt-4">
                                    <input id="about" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="about" placeholder="About" value="{{ $profile->about }}"
                                        autocomplete="about">

                                    @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 pt-4">
                                    <input id="skypeId" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="skypeId" placeholder="Skype Id" value="{{ $profile->skypeId }}"
                                        autocomplete="skypeId">

                                    @error('skypeId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 pt-4">
                                    <input id="webSite" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="webSite" placeholder="Website" value="{{ $profile->webSite }}"
                                        autocomplete="webSite">

                                    @error('webSite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 pt-4">
                                    <input id="map" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="map" placeholder="Map" value="{{ $profile->map }}" autocomplete="map">

                                    @error('map')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="col-md-6 pt-4">
                                    <input id="address" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="address" placeholder="Address" value="{{ $profile->address }}"
                                        autocomplete="address">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-label-group mt-3">
                                    {{-- <label for="photo" class="fw-bold">Photo <sup
                                            class="text-danger">*</sup></label> --}}
                                    <input id="photo" type="file" name="photo" class="form-control" placeholder="photo">
                                    <img id="preview-photo" src="{{ url('/profle/' . $profile->photo) }}"
                                        name="preview-photo" class="mt-3" width="100px" height="100px">

                                    @if ($errors->has('photo'))
                                    <span class="error">{{ $errors->first('photo') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 pt-4">
                                    <input id="contactNo" type="text"
                                        class="form-control register-form @error('contactNo') is-invalid @enderror"
                                        name="contactNo" placeholder="Contact No" value="{{ $user->contactNo }}"
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
                                                    value="Male" @if ($user->gender == "Male") checked @endif>
                                                <label class="form-check-label" for="Male">
                                                    Male
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="Female"
                                                    value="Female" @if ($user->gender == "Female") checked @endif>
                                                <label class="form-check-label" for="Female">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="col-md-6 pt-4">
                                    <input id="birthdate" type="date"
                                        class="form-control register-form @error('birthdate') is-invalid @enderror"
                                        name="birthdate" placeholder="BirthDate" value="{{ $user->birthdate }}"
                                        autocomplete="birthdate">

                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 pt-4">
                                    <input id="company" type="text"
                                        class="form-control register-form @error('company') is-invalid @enderror"
                                        name="company" placeholder="Company Name" value="{{ $profile->company }}">

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
                                        <option value="{{$data->id}}" {{ $data->id == $profile->categoryId ? 'selected'
                                            : ''
                                            }}>
                                            {{$data->catName}}</option>
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

                                <div class="col-md-6 pt-4">
                                    <select class="form-select register-form" aria-label="Default select example"
                                        id="packageId" name="packageId">
                                        <option value="">-- Select Package --</option>
                                        @foreach ($adminpackages as $data)
                                        <option value="{{$data->id}}" {{ $data->id == $profile->packageId ? 'selected' :
                                            ''
                                            }}>
                                            {{$data->title}}</option>
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
                                <label for="">Is Featured Selected ?</label>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="isFeatured" id="Yes" value="Yes">
                                    <label class="form-check-label" for="Yes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="radio" name="isFeatured" id="No" value="No">
                                    <label class="form-check-label" for="No">
                                        No
                                    </label>
                                </div>
                                @if ($errors->has('isFeatured'))
                                <span class="error">{{ $errors->first('isFeatured') }}</span>
                                @endif
                            </div>




                            <div class="col-md-12 text-center pt-5">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ route('consultant.index') }}" class="btn btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>

@endsection