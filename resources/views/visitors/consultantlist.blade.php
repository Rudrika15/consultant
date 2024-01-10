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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    {{-- Font Awsome Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('visitors/css/visitor.css') }}">
    <link rel="stylesheet" href="{{ asset('visitors/css/consultantlist.css') }}">

    <style>
        .citySuggestions {

            cursor: pointer;
            /* Add this line to set the cursor style */
        }

        .selectedCityId:hover {
            background-color: #f15a29 !important;
            /* Add your desired background color */
            color: green;
            /* greenAdd your desired text color */
        }

        .city-suggestion:hover {
            background-color: red !important;
            /* Add your desired background color for hover state */
            color: white;

        }
    </style>
</head>

<body>
    {{-- <h1>{{$consultant->categories->catName}}</h1> --}}
    {{-- <img src="{{ url('category')}}/{{$consultantData->categories->photo}}" alt=""> --}}


    <div class="Top_div_of_consultant d-lg-none">

    </div>

    {{-- background-image: url('{{ asset('category/')}}/{{$consultantData->categories->photo}}'); --}}


    @if (isset($categoryphoto->photo))
    <div class="back-img d-lg-block" style="
        /* background-image:url('category/1692356352.jpg'); */
        background-image: url('{{ asset('category/') }}/{{ $categoryphoto->photo }}');

        height:100vh;width:100vw;background-size:cover;
        background-position:center;
        opacity: 0.5;z-index:-1;">
    </div>
    @else
    <div class="back-img d-lg-block" style="
        height:100vh;width:100vw;background-size:cover;
        background-position:center;
        opacity: 0.5;z-index:-1;">
    </div>
    @endif

    <div class="cube-logo">
        <a class="" href="{{ route('visitors.index') }}"><img class=""
                src="{{ asset('visitors/images/ConsultantLogo.jpg') }}" width="150px" height="50px"></a>
    </div>
    <a href="{{ route('visitors.index') }}" class="fa fa-arrow-circle-left" id="fa-arrow-circle-left"></a>
    <div class="card consultant-list-card text-center" id="consultant_list_card">
        <div class="p-0 m-0" id="card_macthed_grid">
            <div class="d-flex jistify-content-center">
                <div class="">
                    <p class="" id="matches_found">Matches Found</p>
                    {{-- <h1>{{$countconsultant->id}}</h1> --}}
                </div>
                @foreach ($consultant as $consultantData)
                <div class="image-for-consul-list">
                    {{-- /admin_img/{{$gallerys->photo}} --}}
                    <img src="/profile/{{ $consultantData->photo }}" id="card_matches_img" class="" alt="" widht="40px"
                        height="40px">

                </div>
                @endforeach
                <div class="fw-bold d-flex justify-content-end">
                    <div id="countconsultant">
                        <p class="fa fa-arrow-left">&nbsp;<span style="font-size: 20px;">{{ $countconsultant }}</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-body">
            <h3 class="text-center"><u>{{ $categoryphoto->catName }}</u></h3>
            @if (isset(Auth::user()->id))
            <span id="loginUser" style="display:none;">{{ Auth::user()->id }}</span>
            @endif
            <form class="">
                @csrf

                <div class="">
                    <input type="hidden" value="{{ $categoryphoto->catName }}" name="catName">
                    <input type="hidden" value="{{ $categoryphoto->id }}" name="categoryId">
                    <input type="text" id="searchInputCity" name="pincodeId" class="form-control mt-5"
                        placeholder="Enter Your Location Or Pincode" autocomplete="off">

                    <div id="citySuggestions" class="citySuggestions" style="display:none;">

                    </div>

                    <input type="hidden" id="selectedCityId" name="cityId">
                </div>
                <div class="mt-2">
                    <a href="" class="card-link" style="text-decoration: none;">Are You Inside India ?</a>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn next" id="btn_card_next">Submit</button>
                </div>
            </form>
            <div class="mt-5 mb-0">
                <p>Are you a Tutor?</p>
                <a href="" style="text-decoration: none;">Create Free Profile</a>
            </div>

            {{-- <a class="text-end">End aligned text on all viewport sizes.</a> --}}
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function(){
          $("#btn_card_next").click(function(){
            $(".registratinform").show();
            $(".consultant-list-card").hide();
          });
          $("#show").click(function(){
            $("p").show();
          });
        });
    </script> --}}


    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            loginUser = $('#loginUser').text();
            // console.log("login user",loginUser);
            // console.log('hello');
            $('.register').hide();
            $('#searchInputCity').keyup(function() {
                var searchQuery = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('visitors.searchCity') }}',
                    data: {
                        search: searchQuery
                    },
                    success: function(data) {
                        $('#citySuggestions').show();
                        var suggestions = $('#citySuggestions');
                        suggestions.empty();

                        $.each(data, function(index, pincode) {
                            suggestions.append(
                                '<div class="city-suggestion" data-id="' + pincode
                                .id + '">' + '<p>' + '(' + pincode.pincode +
                                ')&nbsp;,&nbsp;&nbsp;' + pincode.areaName +
                                '&nbsp;,&nbsp;&nbsp;' + pincode.cityName + '</p>' +
                                '</div>');

                        });
                        $('#btn_card_next').click(function(e) {
                            e.preventDefault();
                            // console.log($('#catName').text());
                            // var catName = $('#catName').val();
                            var catName = $('input[name="catName"]').val();
                            var searchInputCity = $('#searchInputCity').val();
                            var categoryId =
                                {{ $categoryphoto->id }}; // Assuming you have the category ID
                            var pincodeId = $('#selectedCityId')
                                .val(); // You can set cityId here if needed

                            if (pincodeId === '') {
                                alert(
                                    'Please select a area or city from the suggestions.'
                                );
                                return false;
                            }

                            if (loginUser) {

                                // console.log("login user", loginUser);
                                window.location.href =
                                    "{{ route('visitors.detail') }}?searchInputCity=" +
                                    encodeURIComponent(searchInputCity) +
                                    "&categoryId=" + categoryId +
                                    "&pincodeId=" + encodeURIComponent(pincodeId) +
                                    "&userId=" + loginUser +
                                    "&catName=" + encodeURIComponent(catName);
                            } else {

                                // console.log("Not login user");
                                window.location.href =
                                    "{{ route('visitors.visitorsRegister') }}?searchInputCity=" +
                                    encodeURIComponent(searchInputCity) +
                                    "&categoryId=" + categoryId +
                                    "&pincodeId=" + encodeURIComponent(pincodeId) +
                                    "&catName=" + encodeURIComponent(catName);

                            }

                            // window.location.href =
                            //     "{{ route('visitors.visitorsRegister') }}?searchInputCity=" +
                            //     encodeURIComponent(searchInputCity) +
                            //     "&categoryId=" + categoryId +
                            //     "&pincodeId=" + encodeURIComponent(pincodeId);

                        });
                    }
                });
            });

            $(document).on('click', '.city-suggestion', function() {
                var pincodeId = $(this).data('id');
                var pincode = $(this).text();
                //var cityId = $(this).text();


                $('#searchInputCity').val(pincode);
                $('#selectedCityId').val(pincodeId);

                if ($('#citySuggestions').empty()) {
                    $('#citySuggestions').hide();
                }

            });
            $(document).ready(function() {

            });
        });
    </script>


</body>

</html>

{{-- @endsection --}}