<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <link href="{{ asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">


</head>




<!--    <img src="" alt="img" height="760px" width="1500px"> -->



<body>


    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 d-flex justify-content-center" style="height: 100vh; display:flex; justify-content: center; align-items: center;">
                <div class="card o-hidden border-0 shadow-lg" style="width: 60%;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12 d-none d-lg-block">
                                <h1 class="text-center">
                                    <!-- <div class=""><img class="w-25" src="{{ asset('asset/images/shreeved.png')}}" alt="logo"></div> -->
                                </h1>
                            </div>


                            <div class="container">
                                <div class="row py-2 px-4">
                                    <h4 class="text-center py-2 bluetext">Register</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                                @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="row g-2 mb-3" style="margin-left: 200px;">
                                            <div class="col-auto">
                                                <label for="name" class="col-form-label text-md-end">{{ __('State') }}</label>

                                                <select class="form-select" aria-label="Default select example" id="stateId" name="stateId" value="{{ old('stateId') }}" required autocomplete="stateId" autofocus>
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
                                            <div class="col-auto">
                                                <label for="name" class="col-form-label text-md-end">{{ __('City') }}</label>

                                                <select class="form-select" aria-label="Default select example" id="cityId" name="cityId" value="{{ old('cityId') }}" required autocomplete="cityId" autofocus>
                                                <option value="">-- Select City --</option>
                                                </select>
                                                @error('cityId')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label for="contactNo" class="col-md-4 col-form-label text-md-end">{{ __('Contact No') }}</label>

                                            <div class="col-md-6">
                                                <input id="contactNo" type="text" class="form-control @error('contactNo') is-invalid @enderror" name="contactNo" value="{{ old('contactNo') }}" required autocomplete="contactNo" autofocus>

                                                @error('contactNo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="Male" value="Male">
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        {{ __('Male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender" id="Female" value="Female">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        {{ __('Female') }}
                                                    </label>
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                                            <div class="col-md-6">
                                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>

                                                @error('birthdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="mb-3 text-center">
                                        @if (Route::has('password.request'))
                                        <a class="small bluetext" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


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
</body>

</html>