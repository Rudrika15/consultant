
@extends('layouts.app')

@section('hePayment Get Way')
@section('content')

{{-- Message --}}
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



<div class="card">
    <!-- /.box-title -->
    <div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">

        <div class="">
            <h4 class="">Payment Get Way</h4>
        </div>
        <div class="">
            <a href="{{ route('upgradeplan.index') }}" class="btn btnback btn-sm">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->

    <div class="card-body">
        <div class="card-body text-center">
            <form action="{{ route('consultant.razorpay.payment.store') }}" method="POST" >
                @csrf
                <input type="hidden" id="id" name="adminpackageid" value="{{$admin->id}}">
                <h3>{{$admin->title}}</h3>
                <h5><i class="fa fa-rupee">{{$admin->price}}</i></h5>
                {!!$admin->details!!}</br>
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY') }}"
                        data-amount="{{$admin->price * 100}}"
                        data-buttontext="Pay Now"
                        data-name="ConsultantCube.com"
                        data-description="Rozerpay"
                        data-image="{{url('/visitors/images/ConsultantLogo.jpg')}}"
                        data-prefill.name="name"
                        data-theme.color="#333692"
                        data-button.backgroundcolor="#333692">
                </script>
                {{-- <button name="buttontext"class="btn btn-success">Apply Now</button> --}}
            </form>
        </div>
        <!-- </div> -->
    </div>
    <!-- Collapsable Card Example -->

</div>

@endsection
