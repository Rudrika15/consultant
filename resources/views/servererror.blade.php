<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('asset/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('asset/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body style="background-color: hsla(89, 43%, 51%, 0.3);">
    <div class="container-fluid d-flex justify-content-center" style="margin-top: 250px;">
        <div class="text-center">
            <div class="error mx-auto" data-text="500">500</div>
            <p class="lead text-gray-800">INTERNAL SERVER ERROR</p>
            <a href="{{ URL::previous() }}" class="btn btn-primary">&larr; Back to Home</a>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('asset/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('asset/js/sb-admin-2.min.js')}}"></script>
</body>

</html>