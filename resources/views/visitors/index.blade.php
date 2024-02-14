@extends('layouts.visitorApp')
@section('content')
{{--
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"> --}}


<style>
    .category-suggestion {
        padding-left: 10px;
        cursor: pointer;
        /* Add this line to set the cursor style */
    }

    .selected-category {
        background-color: #f15a29;
        /* Add your desired background color */
        color: #fff;
        /* Add your desired text color */
    }

    .category-suggestion:hover {
        background-color: #f15a29;
        /* Add your desired background color for hover state */
        color: #fff;
        width: 95%
            /* Add your desired text color for hover state */

    }

    .select2-container {
        width: 300px !important;
    }

    /* Increase the height of select2 dropdown */
    .select2-container--default .select2-selection--single {
        height: 30px;
        /* Adjust the height as needed */
    }

    .select2-container--default .select2-selection--single,
    .btn-primary {
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        /* Adjust the height as needed */
    }

    .select2-container {
        width: 100% !important;
        /* Full width for smaller screens */
    }

    /* Center align the search button on all screen sizes */
    #searchButton {
        width: 100%;
    }

    /* Add some margin to the top of the form */
    .search-form {
        margin-top: 20px;
    }
</style>
<div class="main_page">

    <div class="" style="position: relative;">
        {{-- <img src="{{ asset('visitors/images/home.png') }}" class="img-fluid  w-100" height="700px" width="100%"
            alt="" style="opacity: 0.5;"> --}}
        {{-- Consultant Category --}}
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="1000">
            <div class="carousel-inner">
                @foreach ($sliderhome as $sliderhome)
                <div class="carousel-item">
                    <img src="{{ url('/slider/' . $sliderhome->photo) }}" class="d-block w-100" height="700px"
                        alt="...">
                </div>
                @endforeach
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                    $('#myCarousel').find('.carousel-item').first().addClass('active');
                });
        </script>

        {{-- <form class="form-inline" action="{{ route('visitors.findConsultantList') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                    <select class="form-control" name="categoryId" id="categoryId" class="">
                        @foreach ($category as $categoryData )
                        <option value="{{ $categoryData->id}}">{{$categoryData->catName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select class="form-control" placeholder="First name" aria-label="First name">
                        @foreach ($cities as $city )
                        <option value="{{ $city->id}}">{{$city->cityName}}</option>

                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form> --}}




        <div class="container mt-3">
            <form class="form-inline" action="{{ route('visitors.findConsultantList') }}" method="get">
                @csrf
                <input type="hidden" value="{{ request('categoryId') }}">
                <input type="hidden" value="{{ request('cityId') }}">
                <div class="row">
                    <div class="col-md-4 mb-3" style="padding-left: 30px; width: 40%;">
                        <select class="form-control select2" name="categoryId" id="categoryId" style="">
                            <option value="" selected> Select Category</option>
                            @foreach ($category as $categoryData)
                            <option value="{{ $categoryData->id }}">{{ $categoryData->catName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3" style="padding-left: 50px; width: 40%;">
                        <select class="form-control select2" name="cityId" id="cityId">
                            <option value="" selected> Select City</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-3" style="padding-left: 100px;">
                        <button type="submit" class="btn text-white" id="searchButton"
                            style="width: 200px">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="consultantcategory p-5 mb-5">

            {{-- <form action="{{ route('visitors.findConsultantList') }}" method="POST" id="categoryForm">
                @csrf
                <div class="">
                    <input type="text" name="searchInput" id="searchInput" class="searchCategory"
                        placeholder="&#xF002; What Do You Want To Learn ?" style="font-family:Arial, FontAwesome"
                        class="mt-3 mb-3" autocomplete="off">
                    <button type="submit" value="" class="btn btn-info" id="searchbuttonofcategory">Search</button>
                    <div id="categorySuggestions" class="categorySuggestions" style="display:none;"></div>
                    <input type="hidden" id="selectedCategoryId" name="categoryId">
                </div>


            </form> --}}







            <h2 class="text-center  text-white py-3">Consultant Categories</h2>
        </div>
        {{-- <form action="{{route('visitors.findConsultantList')}}" method="POST">
            @csrf
            <div class="">
                <input type="text" name="searchInput" id="searchInput" class="searchCategory"
                    placeholder="&#xF002; What Do You Want To Learn ?" style="font-family:Arial, FontAwesome"
                    class="mt-3 mb-3" autocomplete="off">
                <button type="submit" value="" class="btn" id="searchbuttonofcategory">Search</button>
                <div id="categorySuggestions" class="categorySuggestions" style="display:none;"></div>
                <input type="hidden" id="selectedCategoryId" name="categoryId">

            </div>
        </form> --}}




        {{-- County Card Live Search End --}}

        {{-- Career Slider Start --}}
        <div class="container slidertop pt-4">
            <section class="slider">
                <div class="slider__container" data-multislide="false" data-step="4">
                    @foreach ($category as $categories)
                    <div class="slider__item">
                        <div class="card catcard ">
                            <a href="{{route('visitors.categoryDetail')}}/{{$categories->id}}"
                                class="text-decoration-none text-dark">
                                <div class="card-img">
                                    <img src="{{ url('category') }}/{{ $categories->photo }}" alt="" width="200px"
                                        height="188px">
                                </div>
                                <h5 class="mt-3">{{ $categories->catName }}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="prevnext mt-3 mb-3">
                    <button class="slider__control prev fw-bold text-white"><i class="fa fa-angle-left"></i></button>
                    <button class="slider__control next fw-bold text-white"><i class="fa fa-angle-right"></i></button>
                </div>
            </section>
        </div>
        {{-- Career Slider End --}}
        <div class="mb-2" style="height: 150px;">
        </div>
    </div>

    {{-- Display Workshop Start--}}







    {{-- How Consultant Cube Works Start --}}

    {{-- How Consultant Cube Works End --}}

    {{-- Featured Consultants Start --}}
    <div class="featured_consultants mt-5">
        <h3 class="text-center">Featured Coaches</h3>
        <p class="text-center mt-3">Best Consulting Services</p>

        <div class="row">
            @forelse ($FeaturedConsultants as $FeaturedConsultantsData)
            <div class="col-md-3">
                <div class="card">
                    <div class="rounded-image mx-auto mt-3">
                        <img src="{{ url('profile') . '/' . $FeaturedConsultantsData->photo }}" class="card-img-top"
                            style="height: 200px; object-fit: cover;">
                    </div>
                    <div class="card-body text-center">
                        <p class="card-text">{{ $FeaturedConsultantsData->user[0]->name ?? '-' }} {{
                            $FeaturedConsultantsData->user[0]->lastName ?? '-' }} </p>
                        {{-- <p class="card-text">{!! $FeaturedConsultantsData->about ?? '-' !!}</p> --}}
                        <p class="card-text">{{ $FeaturedConsultantsData->map ?? '-' }}</p>
                        <p class="card-text">{{ $FeaturedConsultantsData->categories[0]->catName ?? '-' }}</p>
                        <a href="{{ route('visitors.consultantDetail', $FeaturedConsultantsData->userId) }}"
                            class="btn text-white btn-show" style="width: 150px;">Show Profile</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12 text-center">
                <p>No Consultants found.</p>
            </div>
            @endforelse
        </div>
    </div>


    <br>


    {{-- Featured Consultants End --}}


    <style>
        .btn-register {

            margin-left: 10px;
        }

        .btn-show {

            margin-left: 10px;

        }
    </style>

    <div class="trusted_porple mt-5">
        <div class="trusted_orange">
            <div class="trusted_white">

                <div class="workshops mt-5 ml-5 mr-5">
                    <h3 class="text-center">Our Workshops</h3>
                    <div class="row">
                        @forelse ($workshop as $workshopData)
                        @php
                        $workshopDate = \Carbon\Carbon::parse($workshopData->workshopDate);
                        $today = \Carbon\Carbon::today();
                        @endphp

                        {{-- Check if the event date is greater than today's date --}}
                        @if ($workshopDate->greaterThanOrEqualTo($today))
                        <div class="col-md-4">
                            <div class="card">
                                <div class="rounded-image mx-auto mt-3">
                                    <img src="{{ url('workshop') . '/' . $workshopData->photo }}" class="card-img-top"
                                        style="height: 200px; object-fit: cover;">
                                </div>
                                <div class="card-body text-center">
                                    <p class="card-text">{{ $workshopData->title ?? '-' }} </p>
                                    <p class="card-text">{{ $workshopDate->format('d-m-y') }}</p>
                                    {{-- <p class="card-text">{{ $workshopData-> ?? '-' }}</p> --}}
                                    <a href="{{ route('visitor.workshopDetails', $workshopData->id) }}"
                                        class="btn text-white btn-register" style="width: 130px">Register Now</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @empty
                        <div class="col-md-12 text-center">
                            <p>No Workshops Right Now.</p>
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>








    {{-- Be a consultant --}}


    {{-- <div class="get_started-purple">
        <div class="get_text">
            <h2 class="text-center text-white pt-5">Be a Consultant</h2>
            <br>
            <h2 class="text-center text-white">Get Started For Free</h2>
        </div>
        <br>


        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn text-center fw-bold start_with_me bg-white">Register
                Now</a> --}}
            {{-- <button class="btn text-center fw-bold start_with_me bg-white">
                Start With Free
            </button> --}}
            {{--
        </div> --}}

        {{--
    </div> --}}

    {{-- Be a consultant end --}}


    {{-- Trust ed by thousands of people all over the world Start --}}

    <br>
    {{-- <div class="trusted_porple">

    </div> --}}
    {{-- <div class="trusted_porple mt-5">
        <div class="trusted_orange">
            <div class="trusted_white">
                <h3 class="text-center mt-5">
                    Trusted by thousands of people all over the world
                </h3>
                <p class="text-center pt-2">
                    Best Service Deals
                </p>
                <div class="service_details d-flex justify-content-center flex-wrap mt-5 gap-4">
                    <div class="card providers">
                        <div class="card-body">
                            <div class="card-text text-white text-center">
                                <h1>75</h1>
                                <h3>Providers</h3>
                            </div>
                            <div class="mt-4 provider w-100"></div>
                        </div>

                    </div>
                    <div class="card providers">
                        <div class="card-body">
                            <div class="card-text text-white text-center">
                                <h1>8</h1>
                                <h3>Customer</h3>
                            </div>
                            <div class="mt-4 customer w-100"></div>
                        </div>
                    </div>
                    <div class="card providers">
                        <div class="card-body">
                            <div class="card-text text-white text-center">
                                <h1>0</h1>
                                <h3>Jobs</h3>
                            </div>
                            <div class="mt-4 job w-100"></div>
                        </div>
                    </div>
                    <div class="card providers">
                        <div class="card-body">
                            <div class="card-text text-white text-center">
                                <h1>35</h1>
                                <h3>Categories</h3>
                            </div>
                            <div class="mt-4 category w-100"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
    {{-- Trusted by thousands of people all over the world End --}}

    {{-- Get Started Start --}}
    <div class="get_started-purple">
        <div class="get_text">
            <h2 class="text-center text-white pt-5">Are You Consultant ?</h2>
            <h2 class="text-center text-white">Get Started For Free</h2>
            <p class="text-center text-white pt-3">
                Our forever Free Plan is a great place to start, and you can upgrade
                to our Premium Plans whenever you’re ready
            </p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{ route('register') }}" class="btn text-center fw-bold start_with_me bg-white">Register
                Now</a>
            {{-- <button class="btn text-center fw-bold start_with_me bg-white">
                Start With Free
            </button> --}}
        </div>

    </div>
    {{-- Get Started Start --}}




</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

<script>
    const sliders = [...document.querySelectorAll(".slider__container")];
        const sliderControlPrev = [...document.querySelectorAll(".slider__control.prev")];
        const sliderControlNext = [...document.querySelectorAll(".slider__control.next")];

        sliders.forEach((slider, i) => {
            let isDragStart = false,
                isDragging = false,
                isSlide = false,
                prevPageX,
                prevScrollLeft,
                positionDiff;

            const sliderItem = slider.querySelector(".slider__item");
            var isMultislide = (slider.dataset.multislide === 'true');

            sliderControlPrev[i].addEventListener('click', () => {
                if (isSlide) return;
                isSlide = true;
                let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
                slider.scrollLeft += -slideWidth;
                setTimeout(function() {
                    isSlide = false;
                }, 700);
            });

            sliderControlNext[i].addEventListener('click', () => {
                if (isSlide) return;
                isSlide = true;
                let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
                slider.scrollLeft += slideWidth;
                setTimeout(function() {
                    isSlide = false;
                }, 700);
            });

            function autoSlide() {
                if (slider.scrollLeft - (slider.scrollWidth - slider.clientWidth) > -1 || slider.scrollLeft <= 0)
                    return;
                positionDiff = Math.abs(positionDiff);
                let slideWidth = isMultislide ? slider.clientWidth : sliderItem.clientWidth;
                let valDifference = slideWidth - positionDiff;
                if (slider.scrollLeft > prevScrollLeft) {
                    return slider.scrollLeft += positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
                }
                slider.scrollLeft -= positionDiff > slideWidth / 5 ? valDifference : -positionDiff;
            }

            function dragStart(e) {
                if (isSlide) return;
                isSlide = true;
                isDragStart = true;
                prevPageX = e.pageX || e.touches[0].pageX;
                prevScrollLeft = slider.scrollLeft;
                setTimeout(function() {
                    isSlide = false;
                }, 700);
            }

            function dragging(e) {
                if (!isDragStart) return;
                e.preventDefault();
                isDragging = true;
                slider.classList.add("dragging");
                positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
                slider.scrollLeft = prevScrollLeft - positionDiff;
            }

            function dragStop() {
                isDragStart = false;
                slider.classList.remove("dragging");
                if (!isDragging) return;
                isDragging = false;
                autoSlide();
            }

            addEventListener("resize", autoSlide);
            slider.addEventListener("mousedown", dragStart);
            slider.addEventListener("touchstart", dragStart);
            slider.addEventListener("mousemove", dragging);
            slider.addEventListener("touchmove", dragging);
            slider.addEventListener("mouseup", dragStop);
            slider.addEventListener("touchend", dragStop);
            slider.addEventListener("mouseleave", dragStop);
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

            $('#stateId').on('change', function() {
                var idState = this.value;
                $("#cityId").html('');
                $.ajax({
                    url: "{{ url('/fetchcityhome') }}",
                    type: "POST",
                    data: {
                        stateId: idState,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#cityId').html('<option value="">City</option>');
                        $.each(res.cities, function(key, value) {
                            $("#cityId").append('<option value="' + value
                                .id + '">' + value.cityName + '</option>');
                        });
                    }
                });

            });
        });
</script>

{{-- <script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url : '{{URL::to('search')}}',
            data:{'search':$value},
            success:function(data){
            $('select').html(data);
            $('#search').
            }
        });
    })
</script> --}}

{{-- <script>
    $(document).ready(function() {
        $('#searchInput').keyup(function() {
            var searchQuery = $(this).val();

            $.ajax({
                type: 'GET',
                url: '{{ route('visitors.search') }}',
                data: { search: searchQuery },
                success: function(data) {
                    $('#categorySuggestions').show();
                    var suggestions = $('#categorySuggestions');
                    suggestions.empty();
                    
                    $.each(data, function(index, category) {
                        suggestions.append(
                            '<div class="category-suggestion" data-id="' + category.id + '">' + category.catName + '</div>');
                    });
                }
            });
        });

        $(document).on('click', '.category-suggestion', function() {
            var categoryId = $(this).data('id');
            var categoryName = $(this).text();

            $('#searchInput').val(categoryName);
            $('#selectedCategoryId').val(categoryId);

            if($('#categorySuggestions').empty()){
                $('#categorySuggestions').hide();
            }

        });
    });
</script> --}}


{{--
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}

<script>
    $(document).ready(function() {
        // Initialize Select2 for categoryId
        $('#categoryId').select2();

        // Initialize Select2 for cityId
        $('#cityId').select2();

        // Submit form on button click
        $('#searchButton').click(function() {
            $('#searchForm').submit();
        });
    });
</script>



<script>
    $(document).ready(function() {
            $('#searchInput').keyup(function() {
                var searchQuery = $(this).val();

                $.ajax({
                    type: 'GET',
                    url: '{{ route('visitors.search') }}',
                    data: {
                        search: searchQuery
                    },
                    success: function(data) {
                        $('#categorySuggestions').show();
                        var suggestions = $('#categorySuggestions');
                        suggestions.empty();

                        $.each(data, function(index, category) {
                            suggestions.append(
                                '<div class="category-suggestion" data-id="' +
                                category.id + '">' + category.catName + '</div>');
                        });
                    }
                });
            });

            $(document).on('click', '.category-suggestion', function() {
                var categoryId = $(this).data('id');
                var categoryName = $(this).text();

                $('#searchInput').val(categoryName);
                $('#selectedCategoryId').val(categoryId);

                if ($('#categorySuggestions').empty()) {
                    $('#categorySuggestions').hide();
                }
            });

            // Intercept form submission
            $('#categoryForm').submit(function(event) {
                // Check if a category is selected
                if ($('#selectedCategoryId').val() === '') {
                    // Prevent form submission if no category is selected
                    event.preventDefault();
                    alert('Please select a category from the suggestions.');
                    return false;
                } else {

                }

                // If a category is selected, allow the form submission
                return true;
            });
        });
</script>

<script type="text/javascript">
    $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#createNewProduct').click(function() {
                $('#saveBtn').val("create-product");
                $('#product_id').val('');
                $('#productForm').trigger("reset");
                $('#modelHeading').html("Create New Product");
                $('#ajaxModel').modal('show');
            });


        });
</script>
@endsection