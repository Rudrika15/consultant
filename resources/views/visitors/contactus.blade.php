@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="about">
        <h3 class="contacttext ms-lg-5">Contact Us</h3>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="500">
            <div class="carousel-inner">
                @foreach ($sliderinner as $sliderinner)
                <div class="carousel-item">
                    <img src="{{url('/slider/'.$sliderinner->photo)}}" class="d-block w-100 img" height="300px"
                        alt="...">
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="grid pt-4">
        <div class="container">
            <a href="{{ route('visitors.index') }}" class="home_link">HOME</a>
            <span class="span_arrow">/</span>
            <a href="{{ route('visitors.contactus') }}" class="about_us_link">CONTACT US</a>
        </div>
    </div>
    <div class="container">
        <div class="phone-email-address  p-5">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card contact_card mt-3">
                        <div class="card-body mb-5">
                            <div class="phone">
                                <i class="fa fa-phone phoneicon"></i>
                            </div>
                            <div class="card-text text-center">
                                <p class="phone_font fw-bold">Phone</p>
                            </div>
                            <div class="card-text text-center">
                                <p class="phoneno">9632587412</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact_card mt-3">
                        <div class="card-body mb-5">
                            <div class="phone text-center">
                                <i class="fa fa-phone phoneicon"></i>
                            </div>
                            <div class="card-text text-center">
                                <p class="phone_font fw-bold">Email</p>
                            </div>
                            <div class="card-text text-center">
                                <p class="emailid">consultantcube123@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card contact_card mt-3">
                        <div class="card-body">
                            <div class="phone text-center">
                                <i class="fa fa-phone phoneicon"></i>
                            </div>
                            <div class="card-text text-center">
                                <p class="phone_font fw-bold">Address</p>
                            </div>
                            <div class="card-text text-center">
                                <p class="address">1017 , Shilp Epitome, behind Rajpath club, off Sindhu bhavan road,
                                    Ahmedabad
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="contact-location">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="pt-3">Contact Us</h4>
                    <form id="contactUsForm" class="contact-form mt-5 mb-5">
                        <div class="row">
                            @csrf
                            <div class="col-md-6 pt-4 input-container">
                                <i class="fa fa-user icon text-center"></i>
                                <input type="text" id="name" name="name" class="form-control input-field"
                                    placeholder="Name">
                                @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-6 pt-4 input-container">
                                <i class="fa fa-envelope icon text-center"></i>
                                <input type="email" id="email" name="email" class="form-control input-field"
                                    placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 pt-4 input-container">
                                <i class="fa fa-phone icon text-center"></i>
                                <input type="text" id="phone" name="phone" class="form-control input-field"
                                    placeholder="Phone">
                                @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 pt-4 input-container">
                                <i class="fa fa-edit icon text-center"></i>
                                <textarea name="comments" id="comments" class="form-control input-field" cols="30"
                                    rows="4">Comments</textarea>
                                @if ($errors->has('comments'))
                                <span class="error">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="col-md-12 pt-4 input-container">
                                <i class="fa fa-edit icon text-center"></i>
                                <input type="text" class="form-control input-field"
                                    placeholder="Enter the code above here">
                            </div>
                            <div class="col-3 pt-3">
                                <button type="submit" class="btn contact-submit-button fw-bold">Submit</button>
                            </div>
                            <div class="col-3 pt-3">
                                <button type="submit" class="btn contact-submit-reset fw-bold">Reset</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Our Location</h4>
                    <div id="googleMap" style="width:100%;height:400px;" class="mt-5"></div>

                    <script>
                        function myMap() {
                            var mapProp= {
                            center:new google.maps.LatLng(51.508742,-0.120850),
                            zoom:5,
                            };
                            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            }
                    </script>

                    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
            $('#myCarousel').find('.carousel-item').first().addClass('active');
        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        

        $('#contactUsForm').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('contactus-store')}}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        // Success message using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        },200);
                        $('#contactUsForm').trigger("reset");
                    } else {
                        // Error message using SweetAlert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred!',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Error message using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred!',
                    });
                }
            });
        });
    });
</script>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

@endsection