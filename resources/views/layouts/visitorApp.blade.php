<!-- /*
* Template Name: Property
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    {{-- Font Awsome Link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>


    <!-- For Sweet Alert  for css-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--  For Sweet Alert  for js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

    <!-- alert msg -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Option 1: Include in HTML -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" /> --}}

    <link rel="stylesheet" href="{{ asset('visitors/css/visitor.css') }}" />
    <link rel="stylesheet" href="{{asset('visitors/css/findconsultant.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/aboutus.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/membership.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/corporateinquiry.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/contactus.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('visitors/css/aboutus.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/aboutus.css')}}">
    <link rel="stylesheet" href="{{asset('visitors/css/aboutus.css')}}"> --}}

    {{-- <link rel="stylesheet" href="{{ asset('visitors/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('visitors/css/aos.css') }}" />
    --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- End of <body> -->

    <title>
        Consultant Cube
    </title>
</head>

<body>
    <div class="topcolor">
        <div class="container">
            <div class="d-flex justify-content-between flex-wrap p-3 gap-5">
                <div class="d-flex gap-1">
                    <i class="fa fa-envelope pt-1"></i>
                    <span>connect@consultantcube.com</span>
                    <i class="fa fa-phone pt-1"></i>
                    <span>7600891148</span>
                </div>
                <div class="d-flex toplinks gap-lg-3 gap-1">
                    <div class="d-flex gap-3 login_links">
                        <i class="fa fa-facebook-f pt-lg-1"></i>
                        <i class="fa fa-instagram pt-lg-1"></i>
                        <i class="fa fa-linkedin pt-lg-1"></i>
                    </div>
                   
                    <div class="d-flex gap-3 login_links">
                        <i class="fa fa-user-circle-o pt-lg-1">
                            {{-- <a href="{{ route('login') }}" class="text-white"
                                    style="text-decoration:none;">Login</a></i>
                                    <i class="fa fa-plus pt-lg-1"></i>
                                <a href="{{ route('register') }}" class="text-white" style="text-decoration:none;">Sign Up</a>
                                    </i> --}}
                            @if (Auth::user())
                                <a href="{{ route('visitor.profile') }}" class="text-white"
                                style="text-decoration:none;">{{Auth::user()->name}}</a></i>        
                            @else
                                <a href="{{ route('login') }}" class="text-white"
                                    style="text-decoration:none;">Login</a></i>
                                    <i class="fa fa-plus pt-lg-1"></i>
                                <a href="{{ route('register') }}" class="text-white" style="text-decoration:none;">Sign Up</a>
                                    </i>
                            @endif    
                    </div>
                    <div class="d-flex gap-3 login_links">
                        @if (Auth::user())
                            <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                @csrf
                                </form>
                        @else
                            <i class="fa fa-plus pt-lg-1"></i>
                            <span> Become a Consultant</span>
                        @endif
                        {{-- <i class="fa fa-plus pt-lg-1"></i>
                            <span> Become a Consultant</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="top: 0; position: sticky; z-index: 1000">

        <nav class="navbar navbar-expand-sm navbar-white bg-white">
            <div class="container">
                <a class="" href="{{ route('visitors.index') }}"><img class=""
                        src="{{ asset('visitors/images/ConsultantLogo.jpg') }}" width="150px" height="50px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto gap-3 mt-2 mb-2">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('visitors.index') }}">{{ _('HOME') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitors.aboutus') }}">{{ _('ABOUT US') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('visitors.membershipPlan') }}">{{ _('MEMBERSHIP PLAN') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                href="{{ route('visitors.corporateInquery') }}">{{ _('CORPORATE INQUIRY') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visitors.contactus') }}">{{ _('CONTACT US') }}</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


    </div>

    @yield('content')

    <div class="footer mt-5">
        <div class="site-footer mt-5">
            <div class="container">
                <div class="d-flex justify-content-between flex-wrap">
                    <div>
                        <img src="{{ asset('visitors/images/ConsultantLogo.jpg') }}" alt="" width="300px"
                            height="100px">
                    </div>
                    <div class="sitelink mt-lg-0 mt-2">
                        <ul class="footerul" style="list-style-type: none;">
                            <h5>Site Link</h5>
                            <li class="mt-lg-5 mt-3">
                                <i class="fa fa-caret-right"></i>
                                <a href="{{route('visitors.contactus')}}" class="footerlink">Contact Us</a>

                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="{{route('visitors.aboutus')}}" class="footerlink">About Us</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="" class="footerlink">How It’s Works</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="{{route('visitors.corporateInquery')}}" class="footerlink">Corporate Inquiry</a>
                            </li>
                        </ul>
                    </div>
                    <div class="policelink  mt-lg-0 mt-2">
                        <ul class="footerul mb-5" style="list-style-type: none;">
                            <h5>Police Link</h5>
                            <li class="mt-lg-5 mt-3">
                                <i class="fa fa-caret-right"></i>
                                <a href="" class="footerlink">Cancelation And Refund Policy</a>

                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="" class="footerlink">Terms & Conditions</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="" class="footerlink">Privacy Policy</a>
                            </li>
                            <li>
                                <i class="fa fa-caret-right"></i>
                                <a href="" class="footerlink">Workshop</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <div class="copyright">
            <div class="container d-flex justify-content-between flex-wrap pt-5">
                <div>
                    <p>Copyright © Consultant Cube 2022 Rights Reserve </br>
                        Developed by Aspireotech </p>
                </div>
                <div class="d-flex me-5 gap-3">
                    <i class="fa fa-facebook-f pt-1"></i>
                    <i class="fa fa-instagram pt-1"></i>
                    <i class="fa fa-linkedin pt-1"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- /.site-footer -->



    {{-- <script src="{{ asset('visitors/js/bootstrap.bundle.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

    

</body>

</html>
