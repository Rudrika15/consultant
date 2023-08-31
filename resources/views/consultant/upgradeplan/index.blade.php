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
        <div class="">
            
            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">BACK</a>

            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    
    <div class="card-body">
    @foreach ($admin as $data)
        <div class="card mt-3" id="paymentplancard">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card-header"><h3>{{$data->title}}</h3></div>
                    </div>
                    <div class="col-md-2">
                        <div class="card-header"><h3 class="fa fa-rupee">{{$data->price}}</h3></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-text">{!!$data->details!!}</div>
                    </div>
                    @if ($data->title==="Free")
                        <Button style="display:none;"></Button>
                    @else
                    <div class="col-md-4">
                        <form action="{{ route('consultant.razorpay.payment.store') }}" method="POST" >
                            @csrf
                        
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZORPAY_KEY') }}"
                                    data-amount="{{$data->price * 100}}"
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
                    @endif
                </div>
                
            </div>
            
        </div>
    @endforeach
        
        
    </div>

</div>

{{-- <div class="card-body text-center" id="paymentDiv"style="display: none;">
    <form id="paymentForm">
        @csrf
        <input type="hidden" name="userId" id="userId">

        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ env('RAZORPAY_KEY') }}"
                data-amount="{{5 * 100}}"
                data-buttontext=""
                data-name="ConsultantCube.com"
                data-description="Rozerpay"
                data-image="{{url('/visitors/images/ConsultantLogo.jpg')}}"
                data-prefill.name="name"
                data-theme.color="#333692">
        </script>
        <button type="submit" id="payment" class="custom-razorpay-button">Apply Now</button>
    </form>
</div> --}}
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>
{{-- <script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('upgradeplan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'details',
                    name: 'details',
                    render: function(data, type, row) {
                    // Create a temporary container
                    var tempContainer = $('<div>').html(data);

                    // Get the text content of the container (excluding HTML tags)
                    var textContent = tempContainer.text();

                    // Return the cleaned text content
                    return textContent;
            }
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    // render: function(data, type, row) {
                    // var editButton = `<button class="btn btn-primary edit-btn" data-id="${row.id}">Edit</button>`;
                    // var deleteButton = `<button class="btn btn-danger delete-btn" data-id="${row.id}">Delete</button>`;
                    // return editButton + " " + deleteButton;
                    // },

                },
            ]
        });
        $(document).on('click', '.edit', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var upgradeplanId = data.id;

            $.ajax({
                url: "{{ url('upgradeplan') }}" + '/' + upgradeplanId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Title:</strong> ' + response.title +'<br><strong>Price</strong>'+response.price +'<br><strong>Details</strong>' + response.details +'<br><strong>Satus:</strong> ' + response.status);

                },
                error: function(error) {
                    // Handle the error response here
                    console.log(error); // Check the error in the browser console
                }
            });
        });
    });
</script> --}}

@endsection