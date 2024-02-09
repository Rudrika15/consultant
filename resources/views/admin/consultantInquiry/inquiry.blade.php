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
    <!-- /.box-title -->
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Consultant Inquiry</h4>
        </div>
        <div class="">
            <a href="" id="back" class="btn btnback btn-sm" style="display:none;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
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
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <!-- Show single data -->
        <div id="viewDataDiv"></div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('consultantInquiry.inquiry') }}",
            columns: [
                {
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
                    name: 'inquiry' 
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

        // View button click event
        $(document).on('click', '.view', function() {
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
                    $('#viewDataDiv').html('<strong>Name:</strong> '+response.name +'<br><strong>Email:</strong> ' + response.email + '<br><strong>Inquiry:</strong> ' + response.inquiry  + '<br><strong>Status:</strong> '+ response.status);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Approve button click event
        $(document).on('click', '.approve', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var inquiryId = data.id;

            $.ajax({
                url: "{{ url('consultantInquiry') }}" + '/' + inquiryId + '/approve',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    // Disable the Approve button after successful approval
                    row.find('.approve').prop('disabled', true).addClass('disabled');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Check status and hide "Approve" button for already approved entries
        table.on('draw', function () {
            table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                var data = this.data();
                if (data.status === 'Approved') {
                    $(this.node()).find('.approve').hide();
                }
            });
        });
    });
</script>
@endsection