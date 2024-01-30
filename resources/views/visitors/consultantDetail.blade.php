@extends('layouts.visitorApp')
@section('content')

{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"> --}}

{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- Add this in the head section of your HTML file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<!-- Add this at the end of the body section, before your custom scripts -->

<style>
        /* Container styles */
        .container-fluid {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
        }

        /* Tab styles */
        .tabbable-line {
                border: 1px solid #eee;
                padding: 10px;
                background-color: #f8f8f8;
        }

        .nav-tabs {
                list-style: none;
                margin: 0;
                padding: 0;
                display: flex;
                background-color: #fff;
                border: 1px solid #eee;
                border-radius: 5px;
                overflow: hidden;
        }

        .nav-tabs li {
                flex: 1;
                text-align: center;
        }

        .nav-tabs a {
                display: block;
                padding: 15px;
                text-decoration: none;
                color: #666;
                font-weight: bold;
                transition: background-color 0.3s;
        }

        .nav-tabs a:hover {
                background-color: #eee;
        }

        .nav-tabs .active a {
                background-color: #3276b1;
                color: #fff;
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
                /* color: #767676; */
                word-spacing: 4px;
        }

        img {
                float: right;
                /* opacity: 0.6; */
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

        .tabbable-line.container {
                background-color: #ffffff;
                /* Replace #eaeaea with your desired background color */
                padding: 10px 5px 20px 10px;
                /* Add padding as needed */
        }
</style>

{{-- start About --}}
<div class="container-fluid">

        <div class="tabbable-line container">
                <ul class="nav nav-tabs " style="
                        font-size: 20px;
                        padding: 20px 5px 0px 30px;
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
                                <a href="#video">
                                        Video </a>
                        </li>
                        <li>
                                <a href="#contact">
                                        Contact </a>
                        </li>
                        <li>
                                <a href="#plans">
                                        Plans </a>
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
                                <h2 class="fw-bold mainTitle">{{ isset($profile->company) ? $profile->company : '-' }}
                                </h2>
                                {{-- <span class="textSize">{!! $profile->about !!}</span> --}}
                                <div class="row">
                                        <div class="col-md-8 pt-5 sectionTitle">
                                                <span class="textSize"><span class="fw-bold">Categories:</span>
                                                        {{ isset($profile->category->catName) ?
                                                        $profile->category->catName : '-' }}
                                                </span>

                                                <hr style="border: 1px solid black">
                                                <p class="textSize"><span class="fw-bold">Name: </span>
                                                        {{ isset($consultant->userData->name) ?
                                                        $consultant->userData->name : ' -' }}
                                                        {{ isset($consultant->userData->lastName) ?
                                                        $consultant->userData->lastName : '' }}
                                                </p>
                                                <p class="textSize"><span class="fw-bold">Email: </span>
                                                        {{ isset($consultant->userData->email) ?
                                                        $consultant->userData->email : ' -' }}
                                                </p>
                                                <!-- ... other code ... -->

                                                <p class="textSize"><span class="fw-bold"></span>
                                                        @if (isset($consultant->about))

                                                        {!! $consultant->about !!}
                                                        @endif
                                                </p>

                                                <style>
                                                        table {
                                                                border-collapse: collapse;
                                                                width: 100%;
                                                        }

                                                        th,
                                                        td {
                                                                border: 1px solid #ddd;
                                                                padding: 8px;
                                                                text-align: left;
                                                        }

                                                        th {
                                                                background-color: #f2f2f2;
                                                        }
                                                </style>

                                                <table>
                                                        <tr>
                                                                <th><span class="fw-bold">More Details</span></th>
                                                                {{-- <th><span class="fw-bold">Value</span></th> --}}
                                                        </tr>
                                                        {{-- <tr>
                                                                <td><span class="fw-bold">Map:</span></td>
                                                                <td>{!! isset($consultant->map) ? $consultant->map : '
                                                                        -' !!}</td>
                                                        </tr> --}}
                                                        <tr>
                                                                <td><span class="fw-bold">Address:</span></td>
                                                                <td>{!! isset($consultant->address) ?
                                                                        $consultant->address : ' -' !!}</td>
                                                        </tr>
                                                        <tr>
                                                                <td><span class="fw-bold">State:</span></td>
                                                                <td>{!! isset($consultant->stateData->stateName) ?
                                                                        $consultant->stateData->stateName : ' -' !!}
                                                                </td>
                                                        </tr>
                                                        <tr>
                                                                <td><span class="fw-bold">City:</span></td>
                                                                <td>{!! isset($consultant->cityData->cityName) ?
                                                                        $consultant->cityData->cityName : ' -' !!}</td>
                                                        </tr>
                                                        <tr>
                                                                <td><span class="fw-bold">Pin Code:</span></td>
                                                                <td>{!! isset($consultant->pincode) ?
                                                                        $consultant->pincode : ' -' !!}</td>
                                                        </tr>
                                                        <tr>
                                                                <td><span class="fw-bold">Type:</span></td>
                                                                <td>{!! isset($consultant->type) ? $consultant->type : '
                                                                        -' !!}</td>
                                                        </tr>
                                                        <tr>
                                                                <td><span class="fw-bold">Package Name:</span></td>
                                                                <td>{!! isset($consultant->packages->title) ?
                                                                        $consultant->packages->title : ' -' !!}</td>
                                                        </tr>
                                                        {{-- <tr>
                                                                <td><span class="fw-bold">isFeatured:</span></td>
                                                                <td>{!! isset($consultant->isFeatured) ?
                                                                        $consultant->isFeatured : ' -' !!}</td>
                                                        </tr> --}}
                                                        <tr>
                                                                <td><span class="fw-bold">Status:</span></td>
                                                                <td>{!! isset($consultant->status) ? $consultant->status
                                                                        : ' -' !!}</td>
                                                        </tr>
                                                </table>
                                                <!-- ... other code ... -->

                                        </div>
                                        <div class="col-md-4">
                                                @if(isset($profile->photo))
                                                <img src="{{ url('profile') }}/{{ $profile->photo }}" class="img-fluid"
                                                        alt="...">
                                                @else
                                                <!-- Provide a fallback image or handle the case when $profile->photo is not set -->
                                                <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid"
                                                        alt="Default Profile Image">
                                                @endif
                                                <div class="icon d-flex justify-content-between">
                                                        <a href="#gear-link">
                                                                <i class="fa fa-gear" style="color: #FEC2B4;"></i>
                                                        </a>
                                                        <a href="#list-alt-link">
                                                                <i class="fa fa-list-alt" style="color: #819AF4;"></i>
                                                        </a>
                                                        <a href="#file-o-link">
                                                                <i class="fa fa-file-o" style="color: #70BB4F;"></i>
                                                        </a>
                                                        <a href="#heart-o-link">
                                                                <i class="fa fa-heart-o" style="color: #3BC6FB;"></i>
                                                        </a>
                                                </div>
                                        </div>

                                        <!-- ... other code ... -->

                                </div>

                                <div class="row">
                                        <div class="col-md-2 pt-3">
                                                <p class="textSize fw-bold" style="font-size: 25px">Share with
                                                </p>
                                        </div>
                                        <div class="col-md-10 mt-3">
                                                <ul>
                                                        <li style="list-style-type: none; font-size: 20px;">
                                                                <a href="" class="text-decoration-none">
                                                                        <i
                                                                                class="fa fa-facebook pt-3 pb-3 ps-4 pe-4 facebook"></i>
                                                                        <i
                                                                                class="fa fa-twitter pt-3 pb-3 ps-3 pe-3 twitter"></i>
                                                                        <i
                                                                                class="fa fa-linkedin pt-3 pb-3 ps-3 pe-3 linkedin"></i>
                                                                        <i
                                                                                class="fa fa-instagram pt-3 pb-3 ps-3 pe-3 instagram"></i>
                                                                </a>
                                                        </li>
                                                </ul>
                                        </div>
                                </div>
                                <!-- Button trigger modal -->
                                <div> <button type="button" class="btn btn-primary" data-toggle="modal"
                                                datclass="razorpay-payment-button" a-target="#exampleModalCenter">
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
                                                                <h4 class="modal-title text-white fw-bold"
                                                                        id="exampleModalLongTitle">
                                                                        Request a Quote</h4>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <form>
                                                                        <div class="row g-3">
                                                                                <div class="col">
                                                                                        <input type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Name"
                                                                                                aria-label="Name">
                                                                                </div>
                                                                                <div class="col">
                                                                                        <input type="text"
                                                                                                class="form-control"
                                                                                                placeholder="Email"
                                                                                                aria-label="Email">
                                                                                </div>
                                                                        </div><br>
                                                                        <div class="row ps-2 pe-2">
                                                                                <input type="text" class="form-control"
                                                                                        placeholder="Phone"
                                                                                        aria-label="Phone">
                                                                        </div><br>
                                                                        <div class="row ps-2 pe-2">
                                                                                <textarea name="" id=""></textarea>
                                                                        </div>
                                                                </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn cancelBtn"
                                                                        data-dismiss="modal">
                                                                        Cancel </button>
                                                                <button type="button"
                                                                        class="btn informactionBtn fw-bold">SEND
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
                                /* color: #fff; */
                                border-radius: 5px;
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
                                @foreach($galleries as $gallery)
                                <li>
                                        <a href="{{ asset('gallery/' . $gallery->photo) }}" data-lightbox="gallery">
                                                <img src="{{ asset('gallery/' . $gallery->photo) }}" alt=""
                                                        class="img-fluid" />
                                        </a>
                                </li>
                                @endforeach
                        </ul>
                </div>
        </div>
</div>
{{-- end gallery --}}

{{-- start Contact --}}
{{-- start Contact --}}
<div class="container pt-5" id="contact">
        <div class="row">
                <div class="col-md-6">
                        <div class="row">
                                <div class="col-md-1">
                                        <i class="fa fa-calendar"
                                                style="color: #7748EC; border: 1px solid #D4D4D4; border-radius: 50%; padding : 0px; font-size: 30px;"></i>
                                </div>
                                <div class="col">
                                        <h3 class="fw-bold">Business Hours</h3>
                                        <div class="" style="line-height: 40px;">
                                                @foreach ($times as $timeData)
                                                <div class="" style="line-height: 40px;">
                                                        <span style="font-size: 16px; text-align: left;">{{
                                                                $timeData->day }}</span>
                                                        <span><b>:</b></span>
                                                        <span class="fw-bold"
                                                                style="font-size: 16px; color: #555757;">{{
                                                                $timeData->start_time }} AM to {{
                                                                $timeData->end_time }} PM</span>

                                                </div>
                                                @endforeach
                                        </div>
                                </div>
                        </div>
                </div>

                {{-- <div class="col-md-6">
                        <div class="col-md-12">
                                <h3 class="fw-bold">Contact Details</h3>
                                <p class="textSize"><span class="fw-bold">Contact No: </span>{!!
                                        isset($consultant->contactNo2) ? $consultant->contactNo2 : ' -' !!}</p>
                                <p class="textSize"><span class="fw-bold">Skype ID: </span>{!!
                                        isset($consultant->skypeId) ? $consultant->skypeId : ' -' !!}</p>
                                <p class="textSize"><span class="fw-bold">Website: </span>{!!
                                        isset($consultant->webSite) ? $consultant->webSite : ' -' !!}</p>
                        </div>
                </div> --}}
        </div>
</div>
{{-- end Contact --}}


{{-- Inquiry Start --}}

<div class="getintouch mt-5">
        <h1 class="text-center text-white pt-5">Get In Touch With Consultant</h1>
        <p class="text-center text-white">Send us your inquiry we will respond earliest</p>
        <form id="inquiryForm" name="inquiryForm" method="post"
                action="{{ route('consultantInquiry.consultantInquiryStore') }}" class="mb-5">
                @csrf

                <input type="hidden" name="userId" id="userId" value="{{ auth()->id() }}">
                {{-- <input type="hiddenn" name="userId" id="userId" value="{{request('id')}}"> --}}
                <input type="hidden" name="consultantId" id="consultantId" value="{{request('id')}}">

                <div class="row getinform">
                        <div class="col-12 mt-3">
                                <label for="name" class="formlabel text-white">Name<span
                                                style="color: red">*</span></label>
                                <input type="text" id="name" name="name" class="form-control">
                                @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif

                        </div>
                        <div class="col-12 mt-3">
                                <label for="email" class="formlabel text-white">Email<span
                                                style="color: red">*</span></label>
                                <input type="email" id="email" name="email" class="form-control">
                                @if ($errors->has('email'))
                                <span class="error">{{$errors->first('email')}}</span>
                                @endif
                        </div>
                        <div class="col-12 mt-3">
                                <label for="inquery" class="formlabel text-white">Inquiry<span
                                                style="color: red">*</span></label>
                                <textarea id="inquiry" rows="2" name="inquiry" class="form-control"></textarea>
                                @if ($errors->has('inquiry'))
                                <span class="error">{{ $errors->first('inquiry') }}</span>
                                @endif
                        </div>
                </div>
                <div class="d-flex justify-content-center mt-5 mb-5">
                        <button type="submit" id="saveBtn" class="getinbutton text-center">Submit</button>
                </div>
        </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript">
        $(function() {
        $('#inquiryForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                console.log(response);

                    // Display SweetAlert for success
                        Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Inquiry sent Successfully!',
                });

                    // Optionally, you can redirect or perform other actions after the SweetAlert is closed
                
                },
                        error: function(error) {
                        console.log(error);

                    // Display SweetAlert for errors
                        Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while submitting the form.',
        });
                }
        });
        });
});
</script>

{{-- Inquiry End --}}



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
                                                @foreach ($languages as $language)
                                                <div class="col-md-1">
                                                        <img src="{{ asset('asset/images/gujrati.png') }}" alt="">
                                                </div>
                                                <div class="col-md-2">
                                                        <span>{{ $language->language_masters->language }}</span>
                                                </div>
                                                @endforeach
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
{{-- end services --}}

{{-- services start --}}

<style>
        /* Container styles */
        .documentcontainer-fluid {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                background-color: #F15A29;
                padding-top: 5rem;
                padding-bottom: 5rem;
        }

        .documentcontainer {
                padding-top: 5rem;
                padding-bottom: 5rem;
        }

        /* Heading styles */
        .document h3 {
                color: #fff;
                font-weight: bold;
                text-align: center;
        }

        /* Horizontal rule styles */
        .document hr {
                border-top: 2px solid #fff;
                width: 50%;
                margin: 1.5rem auto;
        }

        /* Table styles */
        .document table {
                width: 100%;
                margin: 0;
                color: #fff;
        }

        .panel-heading {
                background-color: #fff;
                padding: 1rem;
                border-radius: 0.25rem;
        }

        .panel-heading a {
                color: #5d70ff;
                text-decoration: none;
        }

        .panel-heading a:hover {
                color: #F15A29;
        }

        /* Add the rest of your styles */
</style>




<div class="document container-fluid pt-5 pb-5" id="services" style="background-color: #F15A29;">
        <div class="document container pt-5 pb-5">
                <h3 class="text-white fw-bold text-center">
                        <i class="fa fa-file"></i>
                        <span>Documents</span>
                </h3>
                <hr>
                <table class="table borderless margin-0">
                        <tbody>
                                @foreach($attachments as $attachmentData)
                                <tr>
                                        <td>
                                                <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                                <a download="{{ $attachmentData->title }}"
                                                                        href="{{ $attachmentData->url }}">
                                                                        <strong class="price-bx"><i
                                                                                        class="fa fa-download"></i></strong>
                                                                        <span class="service-title">{{
                                                                                $attachmentData->title }}</span>
                                                                </a>
                                                        </div>
                                                </div>
                                        </td>
                                </tr>
                                @endforeach
                        </tbody>
                </table>
        </div>
</div>
{{-- services end --}}


{{-- Plans Start --}}

<style>
        .plans-container {
                margin-top: 30px;
                width: 100%;
        }

        .plans-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
        }

        .plans-table th,
        .plans-table td {
                border: 1px solid #ddd;
                padding: 15px;
                text-align: left;
        }

        .select-button {
                background-color: #F15A29;
                color: white;
                border: none;
                padding: 10px 15px;
                cursor: pointer;
                border-radius: 8px;
        }
</style>

<!-- Include Razorpay Checkout script with data attributes -->
{{-- <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
        data-buttontext="Select Plan" data-name="ConsultantCube.com" data-description="Rozerpay"
        data-image="{{ url('/visitors/images/ConsultantLogo.jpg') }}" data-prefill.name="name"
        data-theme.color="#333692">
</script> --}}
</head>



<!-- Your existing HTML content -->

<!-- Plans Section -->
<div class="container-fluid pt-5 pb-5" id="plans">
        <h3 class="text-center">Consultant Plans</h3>
        <div class="plans-container">
                <table class="plans-table">
                        <thead>
                                <tr>
                                        <th>Plan Name</th>
                                        <th>Details</th>
                                        <th>Price</th>
                                        <th>validUpTo</th>
                                        <th style="width: 150px;">Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach($packages as $package)
                                <tr>
                                        <td>{{ $package->title }}</td>
                                        <td>{{ $package->detail }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td>{{ $package->validUpTo }}</td>
                                        <td>
                                                <!-- Use a button for payment -->
                                                @if ($package->title === "Free")
                                                <button class="select-button" disabled>Select Plan</button>
                                                @elseif(isset(Auth::user()->id))
                                                <button class="select-button"
                                                        onclick="openRazorpayCheckout('{{ $package->title }}', {{ $package->price }})">
                                                        Select Plan
                                                </button>
                                                @else
                                                <button class="select-button"
                                                        onclick="showAlertAndRedirect('Please login or sign up for payment.', '/login')">Select
                                                        Plan</button>
                                                @endif
                                        </td>
                                </tr>
                                @endforeach
                        </tbody>
                </table>
        </div>
</div>

<script>
        function showAlertAndRedirect(message, redirectUrl) {
        // Display a popup alert with the message
        window.alert(message);
        // Redirect to the specified URL after the user closes the alert
        window.location.href = redirectUrl;
    }
</script>


<!-- Custom JavaScript to handle Razorpay Checkout -->
<script>
        function openRazorpayCheckout(packageTitle, packagePrice) {
                    var options = {
                        key: '{{ env('RAZORPAY_KEY') }}',
                        amount: packagePrice * 100,
                        currency: 'INR',
                        name: 'ConsultantCube.com',
                        description: 'Rozerpay',
                        image: '{{ url('/visitors/images/ConsultantLogo.jpg') }}',
                        prefill: {
                            name: 'name'
                        },
                        theme: {
                            color: '#333692'
                        },
                        handler: function (response) {
                            // Handle the success callback if needed
                            alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
                        }
                    };
        
                    var razorpayInstance = new Razorpay(options);
                    razorpayInstance.open();
                }
</script>

{{-- Plans end --}}


{{-- Video Content Start --}}
<div class="container-fluid pt-5 pb-5" id="video" style="background-color: #F15A29;">
        <div class="container pt-5 pb-5">
                <h3 class="text-white fw-bold text-center">
                        <i class="fa fa-video-camera"></i>
                        <span>Videos</span>
                </h3>
                <hr>
                <div class="row">
                        @foreach($videos as $video)
                        <div class="col-md-6 mb-4">
                                <div class="card">
                                        <div class="card-body">
                                                {{-- <h5 class="card-title">{{ $video->title }}</h5> --}}
                                                {{-- <p class="card-text">Description or additional information about
                                                        the
                                                        video.</p> --}}
                                                <a href="{{ $video->url }}" class="btn btn-primary"
                                                        target="_blank">Watch Video</a>
                                        </div>
                                </div>
                        </div>
                        @endforeach
                </div>
        </div>
</div>

{{-- Video Content End --}}

{{-- contectus start --}}

<div class="container-fluid pt-5 pb-5" id="review" style="background-color: #555757;">
        <div class="tabbable-line container">
                <ul class="nav nav-tabs " style="
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

                                <p class="text-center">
                                        Please <strong>login</strong> via customer account to submit
                                        review
                                </p>
                        </div>
                        <div class="tab-pane text-center" id="qa">

                                <p>
                                        Do you have any Question ? Please Go to the <b>Contact Us</b> page.

                                </p>

                        </div>
                        <div class="tab-pane text-center" id="askQuestion">

                                <p>
                                        Any Help ? We are here...
                                </p>

                        </div>
                </div>
        </div>
</div>
{{-- contectus end --}}
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js">
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
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