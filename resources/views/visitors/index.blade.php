@extends('layouts.visitorApp')
@section('content')
    <div class="conatainer-fluid mb-5">
        <img src="{{ asset('visitors/images/home.png') }}" class="img-fluid" height="700px" width="100%" alt="">
        {{-- Consultant Category --}}

        <div class="card countrycard">
            <div class="card-body">
                <form action="">
                    <div class="d-flex justify-content-evenly gap-3 pt-3 flex-lg-nowrap flex-wrap">
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
                        <div class="w-100">
                            <button type="submit" class="btn searchnowbtn">{{ _('SEARCH NOW') }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="consultantcategory p-5 mb-5">
            <h2 class="text-center categorytext text-white mt-5">Consultant Categories</h2>
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
                <div class="prevnext">
                    <button class="slider__control prev"><i class="fa fa-angle-left"></i></button>
                    <button class="slider__control next"><i class="fa fa-angle-right"></i></button>
                </div>
            </section>
        </div>


        {{-- How Consultant Cube Works --}}
        <div class="" style="height: 200px;">

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
