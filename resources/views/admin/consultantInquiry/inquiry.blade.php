@extends('layouts.app')

@section('header', 'Consultant Inquiry')
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
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Consultant Inquiry</h4>
        </div>
        <div class="">
            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">BACK</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="dataTableDiv">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Consultant Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Inquiry</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div id="viewDataDiv"></div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('consultantInquiry.inquiry') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'users.name',
                    name: 'users.name'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'inquiry',
                    name: 'inquiry',
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
                },
            ]
        });

        $(document).on('click', '.approve', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var inquiryId = data.id;

            $.ajax({
                url: "{{ url('consultantInquiry/approve') }}/" + inquiryId,
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    // Handle the success response here
                    // For example, you may want to update the status in the table or reload the DataTable
                    table.ajax.reload(); // Reload the DataTable
                },
                error: function(error) {
                    console.log(error);
                    // Handle the error response here
                }
            });
        });

        $(document).on('click', '.edit', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var inquiryId = data.id;

            $.ajax({
                url: "{{ url('consultantInquiry') }}" + '/' + inquiryId + '/view',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Name:</strong> ' + response.name + '<br><strong>Eamil:</strong> ' + response.email + '<br><strong>Inquiry:</strong> ' + response.inquiry + '<br><strong>Status:</strong> ' + response.status);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection