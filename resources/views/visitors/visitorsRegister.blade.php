{{-- @extends('layouts.visitorApp')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultant Cube</title>

    {{-- Bootstrap Links --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    {{-- Font Awsome Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('visitors/css/visitor.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/consultantlist.css')}}">

</head>
<body>
    {{-- <h1>{{$consultant->categories->catName}}</h1> --}}
    {{-- <img src="{{ url('category')}}/{{$consultantData->categories->photo}}" alt=""> --}}

    
    <div class="Top_div_of_consultant d-lg-none">

    </div>

    {{-- background-image: url('{{ asset('category/')}}/{{$consultantData->categories->photo}}');         --}}

    <div class="back-img d-lg-block" style="
        /* background-image:url('category/1692356352.jpg'); */
        background-image: url('{{ asset('category/')}}/{{$categoryphoto->photo}}');

        height:100vh;width:100vw;background-size:cover;
        background-position:center;
        opacity: 0.5;z-index:-1;">
    </div>
    
    <div class="cube-logo">
        <a class="" href="{{ route('visitors.index') }}"><img class=""
            src="{{ asset('visitors/images/ConsultantLogo.jpg') }}" width="150px" height="50px"></a>
    </div>
        <a href="{{ route('visitors.index') }}" class="fa fa-arrow-circle-left" id="fa-arrow-circle-left"></a>
    
    <div class="card registratinform text-center" id="consultant_list_card">
        <div class="p-0 m-0" id="card_macthed_grid">
            <h3 class="text-center pt-2"><u>Registation</u></h3>
        </div>
       
        <div class="card-body">
            <form action="{{route('visitors.regitrationStore')}}" method="POST">
                @csrf
                <input type="hidden" name="pincodeId" id="pincodeId" value="{{request()->pincodeId}}">
                <input type="hidden" name="categoryId" id="categoryId" value="{{request()->categoryId}}">
                    
                <div class="row">
                    <div class="col-md-6 mt-5">
                        <input type="text" name="name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="col-md-12 mt-5">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="col-md-6 mt-5">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    
                    <div class="text-center mt-5">
                        <button type="submit" class="btn text-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        
        
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

       

</body>
</html>
    
