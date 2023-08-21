{{-- @extends('layouts.visitorApp')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

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
    <div class="Top_div_of_consultant d-lg-none">

    </div>
    <div class="back-img d-lg-block" style="
        background-image: url('category/1692356352.jpg');
        height:100vh;width:100vw;background-size:cover;
        background-position:center;
        opacity: 0.5;z-index:-1;">
    </div>
    <div class="cube-logo">
        <a class="" href="{{ route('visitors.index') }}"><img class=""
            src="{{ asset('visitors/images/ConsultantLogo.jpg') }}" width="150px" height="50px"></a>
    </div>
        <a href="{{ route('visitors.index') }}" class="fa fa-arrow-circle-left" id="fa-arrow-circle-left"></a>
    <div class="card text-center" id="consultant_list_card">
        <div class="p-0 m-0" id="card_macthed_grid">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="">
                    <p class="" id="matches_found">Matches Found</p>
                </div>
                <div class="">
                    <img src="{{asset('category/1692356352.jpg')}}" id="card_matches_img" alt="" widht="50px" height="50px">
                </div>
                <div class="">
                    <img src="{{asset('category/1692356352.jpg')}}" id="card_matches_img" alt="" widht="50px" height="50px">
                </div>
                <div class="">
                    <img src="{{asset('category/1692356352.jpg')}}" id="card_matches_img" alt="" widht="50px" height="50px">
                </div>
            </div>

        </div>
        <div class="card-body">
            <p class="text-center">What Is Your Location ?</p>
            <form action="">
                <div class="">
                    <input type="text" class="form-control mt-5" placeholder="Enter Your Lovation Or Pincode">
                </div>
                <div class="mt-2">
                    <a href="" class="card-link" style="text-decoration: none;">Are You Inside India ?</a>
                </div>
                <div class="mt-5">
                    <button class="" id="btn_card_next">Next</button>
                </div>
            </form>
            <div class="mt-5 mb-0">
                <p>Are you a Tutor?</p>
                <a href="" style="text-decoration: none;">Create Free Profile</a>
            </div>
            
            {{-- <a class="text-end">End aligned text on all viewport sizes.</a> --}}
        </div>
      </div>

        
        {{-- <img src="{{asset('category/1692356352.jpg')}}" alt="" class="img-fluid" width="100%" height="730px"> --}}
        {{-- <div class="container">
            
            @foreach ($consultant as $consultantData)
            <h1>{{$consultantData->id}}</h1>
            <h1>{{$consultantData->categories->catName[1]}}</h1>
            @endforeach
            
        </div> --}}
    
</body>
</html>
    
{{-- @endsection --}}