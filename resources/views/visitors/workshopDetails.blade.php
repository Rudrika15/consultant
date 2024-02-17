@extends('layouts.visitorApp')
@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <div class="container mt-5">

        @if (session('successMessage'))
            <div class="alert alert-success">
                {{ session('successMessage') }}
            </div>
        @endif

        @if (session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif


        <div class="card shadow mt-5 p-2">
            <div class="row">
                <div class="col-sm-1 col-md-1 col-6">

                    @if (isset($workshop->photo))
                        <img src="{{ url('workshop') }}/{{ $workshop->photo }}" class="img-fluid" alt="workshop img" class="img-fluid rounded p-2" style="max-width: 100px; height: 90px;">
                    @else
                        <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid" alt="Default Profile Image" class="img-fluid rounded p-2" style="max-width: 90px; height: 90px;">
                    @endif

                </div>

                <input type="hidden" name="userId" value="{{ Auth::check() ? Auth::user()->id : 'user id not found' }}">
                <input type="hidden" name="workshopId" value="{{ $workshop->id }}">

                <div class="col-sm-8 col-md-8 col-6 mx-auto">
                    <p class="font-weight-bold mt-3">{{ $workshop->title }}</p>
                </div>

                <div class="col-sm-3 col-md-3 col-6">

                    @auth

                        <form id="registrationForm" action="{{ route('workshop.register') }}" method="POST">
                            @csrf
                            <div class="pay-container">
                                <input type="hidden" name="workshopId" value="{{ $workshop->id }}">
                                <input type="hidden" name="amount" class="amount" value="{{ $workshop->price }}" />
                                <input type="hidden" name="name" class="name" value="Name" />
                                <input type="hidden" name="email" class="email" value="email" />

                                {{-- <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{ $workshop->price * 100 }}" data-buttontext="Join Now" data-name="{{ $workshop->title }}" data-description="Workshop Payment" data-image="{{ url('/your-workshop-logo.jpg') }}" data-prefill.name="{{ Auth::user()->name }}" data-prefill.email="{{ Auth::user()->email }}" data-theme.color="#333692" data-prefill.workshopId="{{ $workshop->id }}"></script> --}}
                                <button class="pay-button btn btn-primary mt-4" type="button">Join Now</button>
                            </div>
                        </form>
                    @else
                        <button class="btn btn-primary mt-4" id="joinNowButton" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Join
                            Now</button>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow ">
                    <div class="row">
                        <div class="col-md-12 mt-3 text-center">

                            @if (isset($workshop->photo))
                                <img src="{{ url('workshop') }}/{{ $workshop->photo }}" class="img-fluid" alt="workshop img">
                            @else
                                <img src="{{ url('default-profile-image.jpg') }}" class="img-fluid" alt="Default Profile Image">
                            @endif

                        </div>
                        <div class="mt-3 p-4">
                            <h5 class="font-weight-bold">Event Details</h5>
                            <p>
                            <p>{{ \Carbon\Carbon::parse($workshop->workshopDate)->format('d-m-y') }}</p>
                            </p>
                            <p>{!! $workshop->detail !!}</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4 ">
                <div class="card mb-3 shadow" style="max-height: 120px; overflow: hidden;">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Date</h5>
                        <div class="text-center">
                            <i class="icon-time"></i>
                            <p>
                                {{ \Carbon\Carbon::parse($workshop->workshopDate)->format('d-m-y') }}
                            </p>
                            <br>
                            <small></small>
                        </div>
                    </div>
                </div>

                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Price</h5>
                        <div class="text-center">
                            <i class="icon-map-marker"></i>
                            <p>
                                @isset($workshop->price)
                                    @if ($workshop->price == 0)
                                        Free
                                    @else
                                        <span class="full-venue"> ₹ {{ $workshop->price }}</span>
                                    @endif
                                @else
                                    Price is not available at the moment.
                                @endisset
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card shadow ">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Location</h5>
                        <div class="text-center">
                            <i class="icon-map-marker"></i>
                            @isset($workshop->address)
                                <p><span class="full-venue">{{ $workshop->address }}</span></p>
                            @else
                                <p>Event is Online</p>
                            @endisset
                        </div>
                    </div>
                </div>

                <div class="card mt-3 shadow ">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold">Event Link</h5>
                        <div class="text-center">
                            <i class="icon-map-marker"></i>
                            <p><button class="btn btn-primary copy-button" data-clipboard-target="#linkToCopy">Copy
                                    Link</button></p>
                            @isset($workshop->link)
                                <p><span id="linkToCopy" class="mt-2">{{ $workshop->link }}</span></p>
                            @else
                                <p>Event is Offline</p>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content w-lg-75">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="user mt-5" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 ">
                            <input type="email" placeholder="Email address" class="form-control p-3 form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 mt-5">
                            <input type="password" name="password" placeholder="Password" class="form-control p-3 form-control-user @error('password') is-invalid @enderror" id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-center mt-5">
                            <button type="button" class="btn " id="btn-secondary-close" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn" id="btn-primary-login" data-bs-dismiss="modal">Login</button>
                        </div>

                    </form>
                    <div class="mb-3 text-center mt-5">
                        @if (Route::has('password.request'))
                            <a class="small bluetext" id="forgot-link" href="{{ route('password.request') }}">Forgot
                                Password?</a>
                        @endif
                        <a class="small bluetext" id="create-new-account-link" href="{{ route('register') }}">Create New
                            Account</a>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var clipboard = new ClipboardJS('.copy-button');
        });
    </script>



    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @if (Auth::user())
        <?php
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        ?>
        <input type="text" name="name" class="username" value="{{ $name }}">
        <input type="email" name="email" class="useremail" value="{{ $email }}">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get all elements with the 'pay-button' class
                var payButtons = document.querySelectorAll('.pay-button');

                // console.log('pay button', payButtons);

                // Loop through each pay button and attach the click event handler
                payButtons.forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        var amountElement = button.closest('.pay-container').querySelector('.amount');
                        var amount = parseFloat(amountElement.value); // Retrieve the amount value
                        // get name of login user
                        const nameInput = document.querySelector('.username');
                        const nameValue = nameInput.value;
                        //   get email of login user
                        const emailInput = document.querySelector('.useremail');
                        const emailValue = emailInput.value;

                        var options = {
                            "key": "{{ env('RAZORPAY_KEY') }}",
                            "amount": amount * 100, // amount in the smallest currency unit
                            "currency": "INR",
                            "name": "Consultantcube",
                            "description": "Razorpay payment",
                            "image": "/images/logo.png",
                            "handler": function(response) {
                                // console.log(response);
                                var paymentId = response.razorpay_payment_id;
                                storePaymentId(paymentId, amount);
                            },
                            "prefill": {
                                "name": nameValue,
                                "email": emailInput
                            },
                            "theme": {
                                "color": "#333692"
                            }
                        };

                        var rzp = new Razorpay(options);
                        rzp.open();
                    });
                });

            });

            function storePaymentId(paymentId = '', amount = '') {
                // Make an asynchronous POST request to your server
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/razorpay-payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({
                            paymentId: paymentId,
                            amount: amount
                        }),
                    })
                    .then(response => {
                        // console.log("responses", response);
                        // console.log("paymentId", paymentId);

                        console.log('Payment ID stored successfully');
                    })
                    .catch(error => {
                        console.error('Error storing payment ID: ', error);
                    });
            }
        </script>
    @else
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                // Attach click event handler to the "Join Now" button
                $('#joinNowButton').click(function() {
                    // Store the current URL in session
                    var currentUrl = window.location.href;
                    console.log('current url', currentUrl);
                    storeCurrentUrl(currentUrl);

                    // Show the modal
                    $('#staticBackdrop').modal('show');
                });
            });

            function storeCurrentUrl(url) {
                // Make an AJAX request to store the current URL in session
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/store-current-url',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                    },
                    data: {
                        url: url
                    },
                    success: function(response) {
                        console.log('Current URL stored in session successfully');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error storing current URL in session: ', error);
                    }
                });
            }
        </script>
    @endif
    <script>
        var loginUser = "{{ session('loginUser') }}";
        // console.log('login user', loginUser);
        if (loginUser == 'success') {
            setSessionVariable();
            // Get all elements with the 'pay-button' class
            var payButtons = document.querySelectorAll('.pay-button');

            // console.log('pay button', payButtons);

            // Loop through each pay button and open the payment modal
            payButtons.forEach(function(button) {
                var amountElement = button.closest('.pay-container').querySelector('.amount');
                var amount = parseFloat(amountElement.value); // Retrieve the amount value

                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}",
                    "amount": amount * 100, // amount in the smallest currency unit
                    "currency": "INR",
                    "name": "Consultantcube",
                    "description": "Razorpay payment",
                    "image": "/images/logo.png",
                    "handler": function(response) {
                        // Handle the response after payment
                        // console.log(response);
                        var paymentId = response.razorpay_payment_id;
                        storePaymentId(paymentId, amount);
                        setSessionVariable();
                    },
                    "prefill": {
                        "name": "ABC",
                        "email": "abc@gmail.com"
                    },
                    "theme": {
                        "color": "#333692"
                    }
                };

                var rzp = new Razorpay(options);
                rzp.open();
            });

            function storePaymentId(paymentId = '', amount = '') {
                // Make an asynchronous POST request to your server
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/razorpay-payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({
                            paymentId: paymentId,
                            amount: amount
                        }),
                    })
                    .then(response => {
                        // console.log("responses", response);
                        // console.log("paymentId", paymentId);

                        console.log('Payment ID stored successfully');
                    })
                    .catch(error => {
                        console.error('Error storing payment ID: ', error);
                    });
            }

            function setSessionVariable() {
                // Make an asynchronous POST request to set the session variable 'loginUser' to 'remove'
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/set-login-user-session', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({
                            loginUser: 'remove'
                        }),
                    })
                    .then(response => {
                        // Handle the response from the server

                        console.log('set session');
                    })
                    .catch(error => {
                        console.error('Error setting loginUser session variable: ', error);
                    });
            }
        } else {
            console.log("Not set");
        }
    </script>


@endsection
