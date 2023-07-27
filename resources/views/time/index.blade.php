@extends('layouts.app')

@section('header','Time')
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
            <h4 class="">Time</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('time.create') }}" id="add" class="btn btnback btn-sm">ADD</a>

            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">Back</a>
=======
            <a href="{{ route('time.create') }}" id="add" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>

            <a href="" id="back" class="btn btnback  btn-sm" style="background-color: #002E6E; color:white;display:none;">Back</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

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
                        <th>Day</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
<<<<<<< HEAD
                
=======

>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                <tbody>

                </tbody>
            </table>
        </div>
<<<<<<< HEAD
    <div id="viewDataDiv"></div>
=======
        <div id="viewDataDiv"></div>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    </div>

</div>
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>

<script type="text/javascript">
<<<<<<< HEAD
  $(function () {   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('time.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data:'day', name:'day'},
            {data:'time', name:'time'},
            {data: 'status', name: 'status'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,

            },
        ]
    }); 
    
    $(document).on('click', '.edit', function() {
        var row = $(this).closest('tr');
        var data = table.row(row).data();
        var stateId = data.id;

        $.ajax({
            url: "{{ url('time') }}" + '/' + stateId + '/view',
            type: 'GET',
            success: function(response) {
                // Handle the Ajax response here
                console.log(response); // Check the response in the browser console
                $('#dataTableDiv').hide();
                $('#add').hide();
                $('#back').show();
                $('#viewDataDiv').html('<strong>Day:</strong> ' + response.day +'<br><strong>Time:</strong> ' + response.time +'<br><strong>Satus:</strong> ' + response.status);

            },
            error: function(error) {
                // Handle the error response here
                console.log(error); // Check the error in the browser console
            }
        });
    });
  });
=======
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('time.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'day',
                    name: 'day'
                },
                {
                    data: 'time',
                    name: 'time'
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

        $(document).on('click', '.edit', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var stateId = data.id;

            $.ajax({
                url: "{{ url('time') }}" + '/' + stateId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Day:</strong> ' + response.day + '<br><strong>Time:</strong> ' + response.time + '<br><strong>Satus:</strong> ' + response.status);

                },
                error: function(error) {
                    // Handle the error response here
                    console.log(error); // Check the error in the browser console
                }
            });
        });

        $('document').on('click', '#delete', function() {

            var timeURL = $(this).data('url');
            var trObj = $(this);

            if (confirm("Are you sure you want to remove this user?") == true) {
                $.ajax({
                    url: timeURL,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(data) {
                        alert(data.success);
                        trObj.parents("tr").remove();
                    }
                });
            }

        });
    });
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
</script>

@endsection