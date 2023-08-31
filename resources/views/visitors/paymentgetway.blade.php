@extends('layouts.visitorApp')
@section('content')
<div class="main_page">
    <div class="container pt-5">
        <div class="card mt-5 shadow-lg p-3 mb-5 bg-white rounded" id="paymentgetway-card">
            <div class="card-body">
                <div class="row payment-radio-button">
                    <h2>Choose Paymnet Get Way</h2>
                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="netbanking">
                            <label class="form-check-label" for="flexRadioDefault1">
                              Net Banking
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="upidiv" >
                            <label class="form-check-label" for="flexRadioDefault2">
                              UPI
                            </label>
                          </div>
                    </div>
                </div>
                
                <div class="text-center mt-5" style="display: none;" id="netupidiv">
                        <form class="mt-5 vl-netbanking"  id="paymentForm" name="paymentForm">
                            @csrf
                            <input type="hidden" value="{{$plantitleId->id}}"> 
                            <input type="hidden" value="{{$plantitleId->title}}" name="planType" id="planType">
                            {{-- Net Benking Section --}}
                              <div class="row p-3" id="netbankingForm" style="display: none;">
                                <h2 class="pt-5">Net Benking</h2>
                                <div class="col-md-12 mt-4">
                                    <input type="text" class="form-control-card-payment-input"  placeholder="Card Number">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="date" class="form-control-card-payment-input"  placeholder="Expiration Date">
                                </div>
                                <div class="col-md-6 mt-4">
                                    <input type="text" class="form-control-card-payment-input"  placeholder="CVC / CVV">
                                </div>
                                <div class="col-md-12 mt-4">
                                    <input type="text" class="form-control-card-payment-input"  placeholder="Postal Code">
                                </div>
                             </div>

                            {{-- UPI Section --}}
                            <div class="row p-3" id="upiForm" style="display:none;">
                                <h2 class="pt-5">UPI</h2>

                                <div class="col-md-12 mt-4">
                                    <input type="text" class="form-control-card-payment-input"  placeholder="Card Number">
                                </div>
                                
                                
                            </div>
                            <div class="col-md-12 mt-5 mb-5">
                                <button class="btn btn-success">Submit</button>
                            </div>
          s                  
                        </form>
                </div>
                {{-- <div class="card-body text-center">
                    <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZORPAY_KEY') }}"
                                data-amount="50000"
                                data-buttontext="Pay 100 INR"
                                data-name="ConsultantCube.com"
                                data-description="Rozerpay"
                                data-image="{{url('/visitors/images/ConsultantLogo.jpg')}}"
                                data-prefill.name="name"
                                data-email="{{Auth::user()->email}}"
                                
                                data-theme.color="#333692">
                        </script>
                    </form>
                </div> --}}
            </div>
          </div>
    </div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('#netbanking').click(function(){
            $('#netupidiv').show();
            $('#netbankingForm').show();
            $('#upiForm').hide();
        });
        $('#upidiv').click(function(){
            $('#netupidiv').show();
            $('#upiForm').show();
            $('#netbankingForm').hide();
        });
    });
</script>
<script type="text/javascript">
    $('#paymentForm').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "{{ route('userplantype') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    // Success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    }, 200);
                    $('#paymentForm').trigger("reset");
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
</script>
@endsection

