@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="about">
        <h3 class="contacttext ms-lg-5">Contact Us</h3>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="500">
            <div class="carousel-inner">
                @foreach ($slidercontactus as $slidercontactus)
                <div class="carousel-item">
                    <img src="{{url('/slider/'.$slidercontactus->photo)}}" class="d-block w-100 img" height="300px"
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
                                <p class="phoneno">9979411148</p>
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
                                <p class="emailid">connect@consultantcube.com</p>
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
                                <p class="address">1017 , Shilp Epitome, Behind Rajpath Club, Off Sindhu Bhavan Road,
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.6815810929547!2d72.49961088885502!3d23.03546080000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e834d76e8ae11%3A0x68bd852e92db8f97!2sAspireotech%20Solutions%20Private%20Limited%20-%20Web%20Development%20and%20SEO%20Company%20in%20Ahmedabad!5e0!3m2!1sen!2sin!4v1705906680306!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
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