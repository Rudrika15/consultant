@extends('layouts.app')

@section('header','Upgrade Plan')
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
            <h4 class="">Upgrade Plan</h4>
        </div>

    </div>
    <!-- /.dropdown js__dropdown -->
    
    <div class="card-body">
        @foreach ($admin as $data)
            <div class="card mt-3" id="paymentplancard">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="card-text ms-0"><h3>{{$data->title}}</h3></div>
                        </div>
                        <div class="col-md-2">
                            @if ($data->price>0)
                                <div class="card-text"><h3><i class="fa fa-rupee ">{{$data->price}}</i></h3></div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        @if ($data->title==="Free")
                            <Button style="display:none;"></Button>
                        @else
                        <div class="col-md-12 mt-2 mb-3">
                            <form action="{{ route('consultant.razorpay.payment.store') }}" method="POST" >
                                @csrf
                                <input type="hidden" name="package" value="{{$data->title}}">
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZORPAY_KEY') }}"
                                        data-amount="{{$data->price * 100}}"
                                        data-buttontext="Pay Now"
                                        data-name="ConsultantCube.com"
                                        data-description="Rozerpay"
                                        data-image="{{url('/visitors/images/ConsultantLogo.jpg')}}"
                                        data-prefill.name="name"
                                        data-theme.color="#345BCB"
                                        data-buttoncolor="#FF0000">
                                </script>
                            </form>
                        </div>
                        @endif
                        
                        <div class="col-md-8">
                            <div class="card-text">{!!$data->details!!}</div>
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        @endforeach   
    </div>
</div>
@endsection