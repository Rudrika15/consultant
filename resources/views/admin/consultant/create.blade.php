@extends('layouts.app')

@section('header','Consultant')
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
            <h4 class="">Create Consultant</h4>
        </div>
        <div class="">
            <a href="{{ route('consultant.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <form class="form-group" id="consultantForm" enctype="multipart/form-data"
            action="{{ route('consultant.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 pt-4">
                    <input id="name" type="text" class="form-control register-form  @error('name') is-invalid @enderror"
                        name="name" placeholder="First Name" value="{{ old('name') }}" required autocomplete="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <input id="lastName" type="text"
                        class="form-control register-form  @error('lastName') is-invalid @enderror" name="lastName"
                        placeholder="Last Name" value="{{ old('lastName') }}" required autocomplete="lastName">
                    @error('lastName')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <input id="email" type="email"
                        class="form-control register-form @error('email') is-invalid @enderror" name="email"
                        placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 pt-4">
                    <input id="password" type="password"
                        class="form-control register-form  @error('password') is-invalid @enderror" name="password"
                        placeholder="Password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-3 pt-4">
                    <input id="password-confirm" type="password" class="form-control register-form"
                        name="password_confirmation" placeholder="Confirm Password" required
                        autocomplete="new-password">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <select class="form-select register-form" aria-label="Default select example" id="stateId"
                        name="stateId" required autocomplete="stateId">
                        <option value="">-- Select State --</option>
                        @foreach($states as $data)
                        <option value="{{$data->id}}">{{$data->stateName}}</option>
                        @endforeach
                    </select>
                    @error('stateId')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
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
                    <div id="otherCityDiv" style="display: none;">
                        <input id="otherCity" type="text" class="form-control register-form" name="otherCity"
                            placeholder="Enter City">
                    </div>
                    @error('cityId')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <input id="contactNo" type="text"
                        class="form-control register-form @error('contactNo') is-invalid @enderror" name="contactNo"
                        placeholder="Contact No" value="{{ old('contactNo') }}" required autocomplete="contactNo">
                    @error('contactNo')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <label for="gender">Gender</label>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Male" value="Male"
                                    checked>
                                <label class="form-check-label" for="flexRadioDefault1">Male</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                                <label class="form-check-label" for="flexRadioDefault2">Female</label>
                            </div>
                        </div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6 pt-4">
                    <input id="birthdate" type="date"
                        class="form-control register-form  @error('birthdate') is-invalid @enderror" name="birthdate"
                        placeholder="BirthDate" value="{{ old('birthdate') }}" required autocomplete="birthdate">
                    @error('birthdate')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div id="become_consultant" class="row" style="display: none">
                    <div class="col-md-12 pt-4">
                        <input id="company" type="text" class="form-control register-form  " name="company"
                            placeholder="Company Name">
                        @error('company')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 pt-4">
                        <select class="form-select register-form" aria-label="Default select example" id="categoryId"
                            name="categoryId">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $data)
                            <option value={{$data->id}}>{{$data->catName}}</option>
                            @endforeach
                        </select>
                        @error('categoryId')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 pt-4" id="packagediv">
                        <select class="form-select register-form" aria-label="Default select example" id="packageId"
                            name="packageId">
                            <option value="">-- Select Package --</option>
                            @foreach ($adminpackages as $data)
                            <option value={{$data->id}}>{{$data->title}}</option>
                            @endforeach
                        </select>
                        @error('packageId')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center pt-5">
                <button type="submit" class="btn btnsignup">Register</button>
                <button type="submit" class="btn btncancel">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#cityId').on('change', function () {
            var selectedCity = $(this).val();
            if (selectedCity === 'other') {
                $("#otherCityDiv").show();
            } else {
                $("#otherCityDiv").hide();
            }
        });

        $('#consultantForm').submit(function(e) {

            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ route('consultant.store')}}",
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
                        $('#consultantForm').trigger("reset");
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