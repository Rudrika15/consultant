@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
            <span class="span_arrow">/</span>
            <a href="{{ route('register') }}" class="about_us_link">SIGN UP</a>
        </div>
    </div>
    <div class="container mt-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="register" data-bs-toggle="tab" data-bs-target="#register"
                    type="button" role="tab" aria-controls="register" aria-selected="true">
                    <h4>Sign Up</h4>
                </button>
            </li>
        </ul>
        <div class="tab-content register-page" id="myTabContent">
            <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register">
                <!-- Outer Row -->

                <form action="{{route('register')}}" method="post">
                    @csrf
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
                        <div class="col-md-3 pt-4">
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
                        </div>

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
                                name="cityId" value="{{ old('cityId') }}" required autocomplete="cityId">
                                <option value="">-- Select City --</option>
                            </select>
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
                        <div class="col-md-6 pt-4">
                            <label for="type">Select User Type</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="user" value="User"
                                            checked>
                                        <label class="form-check-label" for="user">User</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="consultant"
                                            value="Consultant">
                                        <label class="form-check-label" for="consultant">Become Consultant</label>
                                    </div>
                                </div>
                            </div>
                            @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="become_consultant" class="row" style="display: none">
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
                                    <option value={{$data->id}}>{{$data->catName}}</option>
                                    @endforeach
                                </select>
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


                        <div class="col-md-12 text-center pt-5">
                            <button type="submit" class="btn btnsignup">
                                Register
                            </button>
                            <button type="submit" class="btn btncancel">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>






<!-- Bootstrap core JavaScript-->
<script src="{{ asset('asset/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>
<script>
    $(document).ready(function(){
        $("#becomecomsultanttype").click(function(){
            $("#user").hide();
        });
    });
</script>
<script>
    $(function () {
        $("#consultant").click(function () {
            if ($(this).is(":checked")) {
                $("#become_consultant").show();
                
            } else {
                $("#become_consultant").hide();
                
            }
        });
        $("#user").click(function () {
            if ($(this).is(":checked")) {
                $("#become_consultant").hide();
            }
        });
        $("#hide").click(function(){
            $("p").hide();
        });

        
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        $('#stateId').on('change', function() {
            var idState = this.value;
            $("#cityId").html('');
            $.ajax({
                url: "{{url('fetchCity')}}",
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
{{-- <script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#stateId').on('change', function () {
            var idState = this.value;
            $("#cityId").html('');
            $.ajax({
                url: "{{url('fetchCity')}}",
                type: "POST",
                data: {
                    stateId: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#cityId').html('<option value="">-- Select City --</option>');
                    $.each(res.cities, function (key, value) {
                        $("#cityId").append('<option value="' + value
                            .id + '">' + value.cityName + '</option>');
                    });
                }
            });
        });

    });
</script> --}}

@endsection