@extends('layouts.app')

@section('header','Social Link')
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
            <h4 class="">Social Link</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('socialLink.create') }}" id="add" class="btn btnback btn-sm">ADD</a>
            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">Back</a>
=======
            <a href="{{ route('socialLink.create') }}" id="add" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
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
<<<<<<< HEAD
                <tr>
                    <th>Sr No</th>
                    <th>Social Media</th>
                    <th>Url</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                </thead>
               <tbody></tbody>
=======
                    <tr>
                        <th>Sr No</th>
                        <th>Social Media</th>
                        <th>Url</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
            </table>
        </div>
        <div id="viewDataDiv"></div>
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
        ajax: "{{ route('socialLink.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'social_masters.title', name: 'social_masters.title'},
            {data: 'url', name: 'url'},
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
        var cityId = data.id;

        $.ajax({
            url: "{{ url('socialLink') }}" + '/' + cityId + '/view',
            type: 'GET',
            success: function(response) {
                // Handle the Ajax response here
                console.log(response); // Check the response in the browser console
                $('#dataTableDiv').hide();
                $('#add').hide();
                $('#back').show();
                $('#viewDataDiv').html('<strong>Title:</strong> ' + response.social_masters.title +'<br>'+'<strong>URL:</strong> '+ response.url +'<br>'+'<strong>Satus:</strong> ' + response.status);

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
            ajax: "{{ route('socialLink.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'social_masters.title',
                    name: 'social_masters.title'
                },
                {
                    data: 'url',
                    name: 'url'
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
            var cityId = data.id;

            $.ajax({
                url: "{{ url('socialLink') }}" + '/' + cityId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Title:</strong> ' + response.social_masters.title + '<br>' + '<strong>URL:</strong> ' + response.url + '<br>' + '<strong>Satus:</strong> ' + response.status);

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