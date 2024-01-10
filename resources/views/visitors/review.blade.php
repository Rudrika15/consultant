@extends('layouts.visitorApp')
@section('content')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .tabbable-panel {
            border: 1px solid #eee;
            padding: 10px;
        }

        .tabbable-line>.nav-tabs {
            border: none;
            margin: 0px;
        }

        .tabbable-line>.nav-tabs>li {
            margin-right: 2px;
        }

        .tabbable-line>.nav-tabs>li>a {
            border: 0;
            margin-right: 0;
            color: #737373;
        }

        .tabbable-line>.nav-tabs>li>a>i {
            color: #a6a6a6;
        }

        .tabbable-line>.nav-tabs>li.open,
        .tabbable-line>.nav-tabs>li:hover {
            border-bottom: 4px solid rgb(80, 144, 247);
        }

        .tabbable-line>.nav-tabs>li.open>a,
        .tabbable-line>.nav-tabs>li:hover>a {
            border: 0;
            background: none !important;
            color: #333333;
        }

        .tabbable-line>.nav-tabs>li.open>a>i,
        .tabbable-line>.nav-tabs>li:hover>a>i {
            color: #a6a6a6;
        }

        .tabbable-line>.nav-tabs>li.open .dropdown-menu,
        .tabbable-line>.nav-tabs>li:hover .dropdown-menu {
            margin-top: 0px;
        }

        .tabbable-line>.nav-tabs>li.active {
            border-bottom: 4px solid #32465B;
            position: relative;
        }

        .tabbable-line>.nav-tabs>li.active>a {
            border: 0;
            color: #333333;
        }

        .tabbable-line>.nav-tabs>li.active>a>i {
            color: #404040;
        }

        .tabbable-line>.tab-content {
            margin-top: -20px;
            background-color: #fff;
            border: 0;
            border-top: 1px solid #eee;
            padding: 15px 0;
        }

        .portlet .tabbable-line>.tab-content {
            padding-bottom: 0;
        }

        /* my css */
        .mainTitle {
            font-weight: 700;
            font-family: "Quicksand";
            font-size: 26px;
        }

        .textSize {
            width: 100%;
            display: block;
            padding: 5px 0px;
            font-weight: 400;
            font-size: 18px;
            font-family: Poppins !important;
            line-height: 1.8;
            color: #767676;
            word-spacing: 4px;
        }

        img {
            float: right;
            opacity: 0.6;
        }

        .sectionTitle {
            position: relative;
        }

        .bottomleft {
            position: absolute;
            bottom: 420px;
            left: 890px;
            font-size: 18px;
            color: white;
            font: bold;
        }

        .icon {
            padding: 15px;
            font-size: 20px;
        }

        .facebook {
            border: 2px solid #3B5998;
            border-radius: 5px;
            color: #3B5998;
        }

        .facebook:hover {
            background-color: #3B5998;
            color: white !important;
        }

        .twitter {
            border: 2px solid #1DA1F2;
            border-radius: 5px;
            color: #1DA1F2;
        }

        .twitter:hover {
            background-color: #1DA1F2;
            color: white !important;
        }

        .linkedin {
            border: 2px solid #0073B1;
            border-radius: 5px;
            color: #0073B1;
        }

        .linkedin:hover {
            background-color: #0073B1;
            color: white !important;
        }

        .instagram {
            border: 2px solid #688DAA;
            border-radius: 5px;
            color: #688DAA;
        }

        .instagram:hover {
            background-color: #688DAA;
            color: white !important;
        }

        .cancelBtn {
            background-color: #F0F0F0 !important;
        }

        .informactionBtn {
            background-color: #F15A29 !important;
            color: white;
        }
    </style>

    {{-- start About --}}
    <div class="container-fluid">

        <div class="tabbable-line container">
            <ul class="nav nav-tabs "
                style="
                        font-size: 20px;
                        padding: 20px 5px;
                        color: #c1c1c1;">
                <li class="active">
                    <a href="#about">
                        About </a>
                </li>
                <li>
                    <a href="#gallery">
                        Gallery </a>
                </li>
                <li>
                    <a href="#contact">
                        Contact </a>
                </li>
                <li>
                    <a href="#services">
                        Services </a>
                </li>
                <li>
                    <a href="#review">
                        Review </a>
                </li>
            </ul>
        </div>
        {{-- start About --}}

        <div class="container pb-5" id="about">
            <div class="tab-content pt-5">
                <div class="tab-pane active">
                    <h2 class="fw-bold mainTitle">{{$profile->company}}</h2>
                    <div class="row">
                        <div class="col-md-8 pt-5 sectionTitle">
                            <span class="textSize">{!! $profile->about !!}</span>
                            <span class="textSize"><span class="fw-bold">Categories:</span> {{$profile->catName}}</span>
                            <hr style="border: 1px solid black">
                            <p class="textSize">Dr. Saleel Bhatt</p>
                            <p class="textSize">- Doctorate – combination of Management & Experiential Learning
                            </p>
                            <p class="textSize">- Corporate experience of close to 25 years (including posting
                                in
                                USA)</p>
                            <p class="textSize">- Extensively traveled across the globe</p>
                            <p class="textSize">- Business development consultant in Textiles (Fabrics, Garments
                                &
                                Yarns) for Indian & Global market</p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ url('profile') }}/{{ $profile->photo }}" class="img-fluid"
                            alt="...">
                            {{-- <img src="{{ asset('asset/images/Saleel2-514x600.jpg') }}" class="img-fluid" height="100%"> --}}
                            <div class="icon d-flex justify-content-between">
                                <i class="fa fa-gear" style="color: #FEC2B4;"></i>
                                <i class="fa fa-list-alt" style="color: #819AF4;"></i>
                                <i class="fa fa-file-o" style="color: #70BB4F;"></i>
                                <i class="fa fa-heart-o" style="color: #3BC6FB;"></i>
                            </div>
                        </div>

                        <p class="textSize">-Visiting faculty at PDPU (Executive Programme), EDII
                            (Entrepreneurship Development Institute of India), AMA (Diploma programme in
                            association with California University), Ganpat University, GLS Uni., Gujarat Uni.,
                            H.A., Oakbrooks etc. in subjects like International Business, Marketing Management,
                            Consumer Behavior, Marketing-Mix, Branding & other marketing / strategy topics</p>
                        <p class="textSize">- Expert’s sessions on interesting subjects like “Classroom to
                            Corporate”, International branding,</p>
                        <p class="textSize">- Specialization in connecting theoretical concepts with corporate
                            practices with live examples / real-life case-studies – So, Experiential Education
                            in Management</p>
                        <p class="textSize">- Co-Founder of Experiential Science & Math initiative
                            “SciKnowTech”, handling overall administration (including maintaining the base line)
                            & branding.</p>
                        <p class="textSize">- Wide Industry connects</p>
                        <div class="row">
                            <div class="col-md-2 pt-3">
                                <p class="textSize fw-bold" style="font-size: 25px">Share with</p>
                            </div>
                            <div class="col-md-10 mt-3">
                                <ul>
                                    <li style="list-style-type: none; font-size: 20px;">
                                        <a href="" class="text-decoration-none">
                                            <i class="fa fa-facebook pt-3 pb-3 ps-4 pe-4 facebook"></i>
                                            <i class="fa fa-twitter pt-3 pb-3 ps-3 pe-3 twitter"></i>
                                            <i class="fa fa-linkedin pt-3 pb-3 ps-3 pe-3 linkedin"></i>
                                            <i class="fa fa-instagram pt-3 pb-3 ps-3 pe-3 instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Button trigger modal -->
                        <div> <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                <i class="fa fa-file-text-o" style="color: white"></i>
                                <span class="fw-bold">REQUEST A QUOTE</span>
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2E3192">
                                        <h4 class="modal-title text-white fw-bold" id="exampleModalLongTitle">
                                            Request a Quote</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="row g-3">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Name"
                                                        aria-label="Name">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Email"
                                                        aria-label="Email">
                                                </div>
                                            </div><br>
                                            <div class="row ps-2 pe-2">
                                                <input type="text" class="form-control" placeholder="Phone"
                                                    aria-label="Phone">
                                            </div><br>
                                            <div class="row ps-2 pe-2">
                                                <textarea name="" id=""></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn cancelBtn" data-dismiss="modal">
                                            Cancel </button>
                                        <button type="button" class="btn informactionBtn fw-bold">SEND
                                            INFORMACTION</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end About --}}

        {{-- start gallery --}}
        <div class="container-fluid" style="background-color: #2E3192;" id="gallery">
            <div class="container">
                <div class="section-head text-center">
                    <h2 class="text-white">Photo Gallery</h2>
                </div>
                <style>
                    .heading-text {
                        margin-bottom: 2rem;
                        font-size: 2rem;
                    }

                    .heading-text span {
                        font-weight: 100;
                    }

                    ul {
                        list-style: none;
                    }

                    /* Responsive image gallery rules begin*/

                    .image-gallery {
                        display: flex;
                        flex-wrap: wrap;
                        gap: 10px;
                    }

                    .image-gallery>li {
                        flex: 1 1 auto;
                        /* or flex: auto; */
                        height: 300px;
                        cursor: pointer;
                        position: relative;
                    }

                    .image-gallery::after {
                        content: "";
                        flex-grow: 999;
                    }

                    .image-gallery li img {
                        object-fit: cover;
                        width: 100%;
                        height: 100%;
                        vertical-align: middle;
                        border-radius: 5px;
                    }

                    .overlay {
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        background: rgba(57, 57, 57, 0.502);
                        top: 0;
                        left: 0;
                        transform: scale(0);
                        transition: all 0.2s 0.1s ease-in-out;
                        color: #fff;
                        border-radius: 5px;
                        /* center overlay content */
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    /* hover */
                    .image-gallery li:hover .overlay {
                        transform: scale(1);
                    }
                </style>

                <div class="container">
                    <ul class="image-gallery">
                        <li>
                            <img src="{{ asset('asset/images/WhatsApp-Image-2021-05-19-at-17.47.20.jpeg') }}"
                                alt="" class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                        <li>
                            <img src="{{ asset('asset/images/WhatsApp-Image-2021-05-19-at-17.47.21-1000x700.jpeg') }}"
                                alt="" class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                        <li>
                            <img src="{{ asset('asset/images/SciKnowTech-Logo-1-1000x700.jpg') }}" alt=""
                                class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                        <li>
                            <img src="{{ asset('asset/images/SciKnowMath-6-980x700.jpeg') }}" alt=""
                                class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                        <li>
                            <img src="{{ asset('asset/images/Year-Long-2021-22-2-1000x700.jpeg') }}" alt=""
                                class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                        <li>
                            <img src="{{ asset('asset/images/59772418_10219398375536107_5237544817394712576_n-2-751x700.jpg') }}"
                                alt="" class="img-fluid" />
                            <div class="overlay"><span>Image title</span></div>
                        </li>
                    </ul>
                </div>
                {{-- <div class="section-content">
                    <img src="{{asset('asset/images/WhatsApp-Image-2021-05-19-at-17.47.20.jpeg')}}" alt="">
                </div> --}}
            </div>

        </div>
        {{-- end gallery --}}

        {{-- start Contact --}}
        <div class="container pt-5" id="contact">
            <div class="row">
                <div class="col-md-1">
                    <i class="fa fa-calendar"
                        style="color: #7748EC; border: 1px solid #D4D4D4; border-radius: 50%; padding : 20px; font-size: 30px;"></i>
                </div>
                <div class="col">
                    <h3 class="fw-bold">Business Hours</h3>

                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Monday </span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00 pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Tuesday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00
                            pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Wednesday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00
                            pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Thursday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00
                            pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Friday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00
                            pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Saturday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">08:00 am to
                            06:00
                            pm</span>
                    </div>
                    <div class="" style="line-height: 40px;">
                        <span style="font-size: 16px; text-align: left;">Sunday</span>
                        <span><b>:</b></span>
                        <span class="fw-bold" style="font-size: 16px;
                    color: #555757;">Closed</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- end Contact --}}

        {{-- start services --}}
        <div class="container-fluid pt-5 pb-5" style="background-color: #F7F8FA">

            <div class="container pt-5 pb-5">
                <div class="model card">
                    <div class="d-flex justify-content-between pt-3 pb-3 ps-3 pe-3" id="categories"
                        style="border: 1px solid #ddd;">
                        <h4 class="fw-bold">Language</h4>
                        <i class="fa fa-close pt-3 ps-3 pe-3 text-white" id="leftMenuCard"
                            style="border-radius: 50%; background-color: #555555; padding-bottom: 0% !important;"></i>
                        <i class="fa fa-plus pt-3 ps-3 pe-3 text-white" id="listMenuCard"
                            style="border-radius: 50%; background-color: #555555;"></i>
                    </div>
                    <div class="p-5" id="mainMenuCard">
                        <div id="mainMenu">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ asset('asset/images/gujrati.png') }}" alt="">
                                </div>
                                <div class="col-md-2">
                                    <span>Gujarati</span>
                                </div>
                                <div class="col-md-1">
                                    <img src="{{ asset('asset/images/gujrati.png') }}" alt="">
                                </div>
                                <div class="col-md-2">
                                    <span>Hindi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end services --}}

        {{-- services start --}}
        <div class="container-fluid pt-5 pb-5" id="services" style="background-color: #F15A29;">
            <div class="container pt-5 pb-5">
                <h3 class="text-white fw-bold text-center"><i class="fa fa-file-o"></i><span> Documents</span></h3>
                <hr>
                <table class="table borderless margin-0">
                    <tbody>
                        <tr>
                            <td>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a download="SciKnowTech-Round-Logo-1.jpg"
                                            href="https://consultantcube.com/wp-content/uploads/2021/05/SciKnowTech-Round-Logo-1.jpg">
                                            <strong class="price-bx"><i class="fa fa-download"></i></strong>
                                            <span class="service-title">SciKnowTech-Round-Logo-1.jpg</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a download="SciKnowMath-3.jpeg"
                                            href="https://consultantcube.com/wp-content/uploads/2021/05/SciKnowMath-3.jpeg">
                                            <strong class="price-bx"><i class="fa fa-download"></i></strong>
                                            <span class="service-title">SciKnowMath-3.jpeg</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a download="Year-Long-2021-22-1.jpeg"
                                            href="https://consultantcube.com/wp-content/uploads/2021/05/Year-Long-2021-22-1.jpeg">
                                            <strong class="price-bx"><i class="fa fa-download"></i></strong>
                                            <span class="service-title">Year-Long-2021-22-1.jpeg</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a download="15578520_10211777834027332_3093029135521488837_n-1.jpg"
                                            href="https://consultantcube.com/wp-content/uploads/2021/05/15578520_10211777834027332_3093029135521488837_n-1.jpg">
                                            <strong class="price-bx"><i class="fa fa-download"></i></strong>
                                            <span
                                                class="service-title">15578520_10211777834027332_3093029135521488837_n-1.jpg</span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- services end --}}

        {{-- contectus start --}}

        <div class="container-fluid pt-5 pb-5" id="review" style="background-color: #555757;">
            <div class="tabbable-line container">
                <ul class="nav nav-tabs "
                    style="
                    font-weight: bold;
                            font-size: 20px;
                            padding: 20px 5px;
                            color: #AAABAB;">
                    <li class="active">
                        <a href="#review" data-toggle="tab">
                            Review </a>
                    </li>
                    <li>
                        <a href="#qa" data-toggle="tab">
                            Q & A </a>
                    </li>
                    <li>
                        <a href="#askQuestion" data-toggle="tab">
                            Ask Question </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="review">
                        <p>
                            Tab 1.
                        </p>
                        <p>
                            lorem
                        </p>
                    </div>
                    <div class="tab-pane" id="qa">
                        <p>
                            Tab 2.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </p>

                    </div>
                    <div class="tab-pane" id="askQuestion">
                        <p>
                            Tab 3.
                        </p>
                        <p>
                            Consectetur deleniti quisquam natus eius commodi.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        {{-- contectus end --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#categories").show();
            $("#submenu").hide();
            $("#title").hide();
            $(".dash1").hide();
            $(".dash2").hide();
            $(".plus1").show();
            $("#leftMenuCard").show();
            $("#listMenuCard").hide();
            $("#mainMenu").click(function() {
                $("#submenu").toggle();
                $(".dash1").toggle();
                $(".plus1").toggle();
            });
            $("#submenu").click(function() {
                $("#title").toggle();
                $(".dash2").toggle();
                $(".plus2").toggle();
            });
            $("#categories").click(function() {
                $("#mainMenuCard").toggle();
                $("#listMenuCard").toggle();
                $("#leftMenuCard").toggle();
            });
        });
    </script>
@endsection
