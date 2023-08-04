@extends('layouts.visitorApp')
@section('content')
    <div class="" style="position: relative;">
        <img src="{{ asset('visitors/images/home.png') }}" class="img-fluid w-100" height="700px" width="100%" alt="">
        {{-- Consultant Category --}}
        <div class="consultantcategory p-5 mb-5">
            <h2 class="text-center categorytext text-white mt-5">Consultant Categories</h2>
        </div>

        <div class="card countrycard">
            <div class="card-body ">
                <form action="">
                    <div class="d-flex justify-content-evenly gap-3 pt-3 p-3 flex-lg-nowrap flex-wrap">
                        <div class="w-100">
                            <select name="cars" id="cars" class="form-control">
                                <option value="category">Category</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="w-100">
                            <select name="cars" id="cars" class="form-control">
                                <option value="contry">Country</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="w-100">
                            <select name="cars" id="cars" class="form-control">
                                <option value="state">State</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="w-100">
                            <select name="cars" id="cars" class="form-control ">
                                <option value="city">City</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select>
                        </div>
                        <div class="w-100 ">
                            <button type="submit" class="btn searchnowbtn">{{ _('SEARCH NOW') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>



        <div class="container slidertop">
            <section class="slider">
                <div class="slider__container" data-multislide="false" data-step="4">
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>
                    <div class="slider__item">
                        <div class="card catcard ">
                            <div class="card-img">
                                <img src="{{ asset('visitors/images/career_transition.png') }}" alt=""
                                    width="230px" height="188px">
                            </div>
                            <h5 class="mt-3">Career Transition</h5>
                        </div>
                    </div>

                </div>
                <div class="prevnext mt-3 mb-3">
                    <button class="slider__control prev fw-bold text-white"><i class="fa fa-angle-left"></i></button>
                    <button class="slider__control next fw-bold text-white"><i class="fa fa-angle-right"></i></button>
                </div>
            </section>
        </div>

        {{-- How Consultant Cube Works --}}
        <div class="mb-2" style="height: 150px;">
        </div>
    </div>
    <div class="cube_orange">
        <div class="cube_purple">
            <h3 class="text-center text-white mt-5">How Consultant Cube Works</h3>
            <p class="text-center text-white mt-3">A platform to find right consultant</p>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-4 person_section">
                        <div class="person_img_circle">
                            <img src="{{ asset('visitors/images/1-1.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="text-white mt-4">Find your consulta</h5>
                        <p class="text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                    <div class="col-lg-4  person_section">
                        <div class="person_img_circle">
                            <img src="{{ asset('visitors/images/2.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="text-white mt-4">Find your consulta</h5>
                        <p class="text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                    <div class="col-lg-4  person_section">
                        <div class="person_img_circle">
                            <img src="{{ asset('visitors/images/3.png') }}" alt="" width="60"
                                height="50">
                        </div>
                        <h5 class="text-white mt-4">Find your consulta</h5>
                        <p class="text-white mt-2">We will enlist just the right
                            ones based on your choices.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

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
@endsection
