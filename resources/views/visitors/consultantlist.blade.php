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
    {{-- <h1>{{$consultant->categories->catName}}</h1> --}}
    {{-- <img src="{{ url('category')}}/{{$consultantData->categories->photo}}" alt=""> --}}

    
    <div class="Top_div_of_consultant d-lg-none">

    </div>

    {{-- background-image: url('{{ asset('category/')}}/{{$consultantData->categories->photo}}');         --}}

    <div class="back-img d-lg-block" style="
        background-image:url('category/1692356352.jpg');
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
            <div class="row p-0 m-0">
                <div class="col-md-3">
                    <p class="" id="matches_found">Matches Found</p>
                    {{-- <h1>{{$countconsultant->id}}</h1> --}}
                </div>
                @foreach ($consultant as $consultantData)
                
                    <div class="col-2  image-for-consul-list">
                        {{-- /admin_img/{{$gallerys->photo}} --}}
                        <img src="/profile/{{$consultantData->photo}}" id="card_matches_img" class="" alt="" widht="50px" height="50px">
                    </div>
                @endforeach
            </div>

        </div>
        <div class="card-body">
            <p class="text-center">What Is Your Location ?</p>
            <form>
                {{-- <div class="">
                    <input type="text" name="" id="searchInputCity" class="searchCategory" placeholder="&#xF002; What Do You Want To Learn ?" style="font-family:Arial, FontAwesome" class="mt-3 mb-3">
                    <button type="submit" value="" class="btn" id="searchbuttonofcategory">Search</button>
                    <div id="citySuggestions" class="citySuggestions" style="display:none;"></div>
                    <input type="hidden" id="selectedCityId" name="cityId">
                </div> --}}
                <div class="">
                    <input type="text" id="searchInputCity"  class="form-control mt-5" placeholder="Enter Your Lovation Or Pincode">
                    <div id="citySuggestions" class="citySuggestions" style="display:none;"></div>
                    <input type="hidden" id="selectedCityId" name="cityId">
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

        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#searchInputCity').keyup(function() {
                    var searchQuery = $(this).val();
        
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('visitors.searchCity') }}',
                        data: { search: searchQuery },
                        success: function(data) {
                            $('#citySuggestions').show();
                            var suggestions = $('#citySuggestions');
                            suggestions.empty();
                            
                            $.each(data, function(index, city) {
                                suggestions.append(
                                    '<div class="city-suggestion" data-id="' + city.id + '">' + city.cityName + '</div>');
                            });
                        }
                    });
                });
        
                $(document).on('click', '.city-suggestion', function() {
                    var cityId = $(this).data('id');
                    var cityName = $(this).text();
        
                    $('#searchInputCity').val(cityName);
                    $('#selectedCityId').val(cityId);
        
                    if($('#citySuggestions').empty()){
                        $('#citySuggestions').hide();
                    }
        
                });
            });
        </script>


</body>
</html>
    
{{-- @endsection --}}