@extends('layouts.visitorApp')
@section('content')

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Success !</strong> {{ session('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert">
        <i class="fa fa-times"></i>
    </button>
    <strong>Error !</strong> {{ session('error') }}
</div>
@endif

<div class="main_page">
    <div class="corporatehead">
        <h3 class="corporatetext ms-lg-5">Corporate Inquiry</h3>
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-interval="500">
            <div class="carousel-inner">
                @foreach ($slidercorporate as $slidercorporate)
                <div class="carousel-item">
                    <img src="{{url('/slider/'.$slidercorporate->photo)}}" class="d-block w-100 img" height="300px"
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
            <a href="{{ route('visitors.corporateInquery') }}" class="corporate_link">CORPORATE INQUERY</a>
        </div>
    </div>
    <div class="container">
        <div class="row ms-lg-5">
            <div class="col-lg-6 mt-5 mb-5">
                <p class="pcolor">Your set of employees are not just an asset to your company. They are the next-line
                    leaders of your
                    organization.
                </p>
                <p class="pcolor">
                    They deserve specialized coaching and mentoring to guide them through the journey of brainstorming,
                    innovation, and implementation of their ideas.
                </p>
                <p class="pcolor">
                    As an aspiring corporate, invest wisely in your set of employees and get them a guide that can turn
                    them
                    into leading solution providers of the next level. This will eventually result in the growth and
                    development of the organization.
                </p>
                <p class="pcolor">
                    Here’s where ConsultantCube.com comes to your rescue. We are a unique platform hosting coaches,
                    mentors,
                    and guides from all arenas, having years of experience. We will help you deliver the best level of
                    coaching for your aspiring employees. From the process of selecting the best program that fulfills
                    the
                    goal to assigning an appropriate mentor that will help you sail the program with a 100% success
                    ratio.
                    ConsultantCube.com is definitely the one-stop solution for your large MNC or MSME to meet your
                    objectives. Save your money, time, and efforts with us and get the best that your company deserves.
                </p>
                <p class="pcolor">
                    Drop us a “Hi” with your requirement and we are determined to NOT disappoint you.

                </p>
            </div>
            <div class="col-lg-6 mt-5 mb-5">
                <img src="{{ asset('visitors/images/goals.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>

        <div class="getintouch mt-5">
            <h1 class="text-center text-white pt-5">Get In Touch</h1>
            <p class="text-center text-white">Send us your inquiry we will respond earliest</p>
            <form id="inquieryform" name="inquieryform" action="" class="mb-5">
                @csrf
                <div class="row getinform">
                    <div class="col-12 mt-3">
                        <label for="name" class="formlabel text-white">Name<span style="color: red">*</span></label>
                        <input type="text" id="name" name="name" class="form-control">
                        @if ($errors->has('title'))
                        <span class="error">{{ $errors->first('title') }}</span>
                        @endif

                    </div>
                    <div class="col-12 mt-3">
                        <label for="email" class="formlabel text-white">Email<span style="color: red">*</span></label>
                        <input type="email" id="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="error">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="col-12 mt-3">
                        <label for="inquery" class="formlabel text-white">Inquiry<span
                                style="color: red">*</span></label>
                        <textarea id="inquiry" rows="10" name="inquiry" class="form-control"></textarea>
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
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#inquiry'))
            .then(editor => {
                // console.log(inquiry );
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        

        $('#inquieryform').submit(function(e) {

        e.preventDefault();

        var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: "{{ url('corporateInquery-inqueryStore')}}",
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
                        $('#inquieryform').trigger("reset");
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
                    if (xhr.responseJSON.errors) {
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            // Display error messages for each field
                            $('#' + key).addClass('is-invalid');
                            $('#' + key + '-error').html(value[0]); // Display the first error message only
                        });
                    } else {
                        // Generic error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred!',
                        });
                    }
                    // Error message using SweetAlert
                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Error',
                    //     text: 'An error occurred!',
                    // });
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
          $('#myCarousel').find('.carousel-item').first().addClass('active');
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