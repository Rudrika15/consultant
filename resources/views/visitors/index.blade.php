@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="" style="position: relative;">
        <img src="{{ asset('visitors/images/home.png') }}" class="img-fluid  w-100" height="700px" width="100%" alt="" style="opacity: 0.5;">
        {{-- Consultant Category --}}
        <div class="consultantcategory p-5 mb-5">
            <h2 class="text-center categorytext text-white mt-3">Consultant Categories</h2>
        </div>
        {{-- County Card Live Search Start --}}
        {{-- <div class="card countrycard"> 
            <div class="searchCategory w-50">
                <input type="text" id="searchInput" placeholder="Search for categories">
                <div id="categorySuggestions"></div>
                <input type="hidden" id="selectedCategoryId">
                    
            </div>
        </div> --}}
        <div class="">
            <input type="text" id="searchInput" class="searchCategory" placeholder="Search for categories" class="mt-3 mb-3">
                <button class="btn" id="searchbuttonofcategory">Search</button>
                <div id="categorySuggestions" class="categorySuggestions" style="display:none;"></div>
                <input type="hidden" id="selectedCategoryId">
        </div>
         	
        
        {{-- County Card Live Search End --}}

        {{-- Career Slider Start --}}
        <div class="container slidertop">
            <section class="slider">
                <div class="slider__container" data-multislide="false" data-step="4">
                    @foreach ($category as $categories)
                        <div class="slider__item">
                            <div class="card catcard ">
                                <div class="card-img">
                                    <img src="{{ url('category')}}/{{$categories->photo}}" alt=""
                                        width="230px" height="188px">
                                </div>
                                <h5 class="mt-3">{{$categories->catName}}</h5>
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

    {{-- How Consultant Cube Works Start --}}
    <div class="cube_orange">
        <div class="cube_purple">
            <h3 class="text-center text-white mt-5">How Consultant Cube Works</h3>
            <p class="text-center text-white mt-3">A platform to find right consultant</p>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4 person_section">
                        <div class="person_img_circle position-relative">
                            <i class="fa fa-circle text-white"></i>
                            <img src="{{ asset('visitors/images/1-1.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="person-text text-white mt-4">Find your consulta</h5>
                        <p class=" person-text text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                    <div class="col-lg-4  person_section">
                        <div class="person_img_circle position-relative">
                            <i class="fa fa-circle text-white"></i>
                            <img src="{{ asset('visitors/images/2.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="person-text text-white mt-4">Find your consulta</h5>
                        <p class="person-text text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                    <div class="col-lg-4  person_section">
                        <div class="person_img_circle position-relative">
                            <i class="fa fa-circle text-white"></i>
                            <img src="{{ asset('visitors/images/3.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="person-text text-white mt-4">Find your consulta</h5>
                        <p class="person-text text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- How Consultant Cube Works End --}}

    {{-- Featured Consultants Start --}}
    <div class="featured_consultants mt-5">
        <h3 class="text-center">Featured Consultants</h3>
        <p class="text-center mt-3">Best Consulting Services</p>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center">
                        <div class="card featured_card">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 ">
                                    <img src="{{ asset('visitors/images/sandhay.jpg') }}" class="featured_profile"
                                        alt="" width="90px" height="70px">
                                </div>
                                <div class="col-lg-7 mt-4">
                                    <div class="image_constant">
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>

                                        <h5>Sandhya Anantani</h5>
                                        <a href="" class="featured_link">IMAGE CONSULTANT</a>
                                        <p class="featured_pre mt-1">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit. Dolores, repudiandae delectus.
                                        </p>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="featured_menu ms-4">
                                        <div class="setting">
                                            <a href="" class="fa fa-gear text-center"></a>
                                        </div>
                                        <div class="comment">
                                            <a href="" class="fa fa-comment-o text-center"></a>
                                        </div>
                                        <div class="file">
                                            <a href="" class="fa fa-file-text-o text-center"></a>
                                        </div>
                                        <div class="heart">
                                            <a href="" class="fa fa-heart-o text-center"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <div class="card featured_card">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 ">
                                    <img src="{{ asset('visitors/images/sandhay.jpg') }}" class="featured_profile"
                                        alt="" width="90px" height="70px">
                                </div>
                                <div class="col-lg-7 mt-4">
                                    <div class="image_constant">
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>

                                        <h5>Sandhya Anantani</h5>
                                        <a href="" class="featured_link">IMAGE CONSULTANT</a>
                                        <p class="featured_pre mt-1">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit. Dolores, repudiandae delectus.
                                        </p>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="featured_menu ms-4">
                                        <div class="setting">
                                            <a href="" class="fa fa-gear text-center"></a>
                                        </div>
                                        <div class="comment">
                                            <a href="" class="fa fa-comment-o text-center"></a>
                                        </div>
                                        <div class="file">
                                            <a href="" class="fa fa-file-text-o text-center"></a>
                                        </div>
                                        <div class="heart">
                                            <a href="" class="fa fa-heart-o text-center"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="d-flex justify-content-center">
                        <div class="card featured_card">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 ">
                                    <img src="{{ asset('visitors/images/sandhay.jpg') }}" class="featured_profile"
                                        alt="" width="90px" height="70px">
                                </div>
                                <div class="col-lg-7 mt-4">
                                    <div class="image_constant">
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>
                                        <a href="" class="fa fa-star featured_star"></a>

                                        <h5>Sandhya Anantani</h5>
                                        <a href="" class="featured_link">IMAGE CONSULTANT</a>
                                        <p class="featured_pre mt-1">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit. Dolores, repudiandae delectus.
                                        </p>
                                    </div>

                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="featured_menu ms-4">
                                        <div class="setting">
                                            <a href="" class="fa fa-gear text-center"></a>
                                        </div>
                                        <div class="comment">
                                            <a href="" class="fa fa-comment-o text-center"></a>
                                        </div>
                                        <div class="file">
                                            <a href="" class="fa fa-file-text-o text-center"></a>
                                        </div>
                                        <div class="heart">
                                            <a href="" class="fa fa-heart-o text-center"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" d-flex justify-content-center">
                <div class="previous_next_btn">
                    <button class="border-0 bg-white" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="fa fa-angle-left carousel_previous"></span>
                    </button>
                    <button class="border-0 bg-white" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="fa fa-angle-right carousel_next"></span>
                    </button>
                </div>
            </div>        
        </div>

    </div>

    {{-- Featured Consultants End --}}

    {{-- Trusted by thousands of people all over the world Start --}}

    <div class="trusted_porple mt-5">
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
    </div>
    {{-- Trusted by thousands of people all over the world End --}}

    {{-- Why Choose Us Start --}}
    <div class="chooseus_orange">
        <h3 class="text-center pt-5 text-white">
            Why Choose us
        </h3>
        <p class="text-center text-white pt-3">
            Best Service Deals
        </p>
        {{-- commu.png
                help (1).png
                1-3.png --}}
        <div class="container p-5">
            <div class="row choose_us">
                <div class="col-md-4 col-sm-4 be_part">
                    <div class="text-center">
                        <img src="{{ asset('visitors/images/commu.png') }}" alt="" width="90px"
                            height="90px">
                    </div>
                    <div class="text-center text-white mt-4">
                        <p class="fw-bold">
                            Be part of a generous community
                        </p>
                        <p class="">
                            Consultant Cube provides a win-win platform,
                            where individuals prosper in their respective domains.
                            Be a part of a generous community as a mentor or mentee and lead towards better EVERYTHING.
                        </p>
                    </div>
                </div>
                <div class=" col-md-4 col-sm-4 be_part">
                    <div class="text-center">
                        <img src="{{ asset('visitors/images/helping.png') }}" alt="" width="90px"
                            height="90px">
                    </div>
                    <div class="text-center text-white mt-4">
                        <p class="fw-bold">
                            Serve the help, Get the help
                        </p>
                        <p class="">
                            Each of us was born raw, shaped gradually with the help of
                            our parents and teachers. Consultant Cube offers a platform
                            for everyone who wishes to serve help,
                            out of his or her experiences or receive help in any arena.</p>
                    </div>
                </div>
                <div class=" col-md-4  col-sm-4 be_part">
                    <div class="text-center">
                        <img src="{{ asset('visitors/images/persona.png ') }}" alt="" width="90px"
                            height="90px">
                    </div>
                    <div class="text-center text-white mt-4">
                        <p class="fw-bold">
                            Amplify your persona
                        </p>
                        <p class="">
                            Knowledge, Wisdom and Information when received from the right individual,
                            results in amplification of your persona. Consultant Cube bridges one
                            with consistent learning in one or another way, as either a mentor or a mentee.
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Why Choose Us End --}}

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
            <button class="btn text-center fw-bold start_with_me bg-white">
                Start With Free
            </button>
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
            url: "{{url('/fetchcityhome')}}",
            type: "POST",
            data: {
                stateId: idState,
                _token: '{{csrf_token()}}'
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

<script>
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
                        suggestions.append('<div class="category-suggestion" data-id="' + category.id + '">' + category.catName + '</div>');
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
</script>

@endsection
