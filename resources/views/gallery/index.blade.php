@extends('layouts.app')

@section('header','Gallery')
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
            <h4 class="">Gallery</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('gallery.create') }}" id="add" class="btn btnback btn-sm">ADD</a>

            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">Back</a>
=======
            <a href="{{ route('gallery.create') }}" id="add" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>

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
                    <th>Title</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
=======
                    <tr>
                        <th>Sr No</th>
                        <th>Title</th>
                        <th>Photo</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                </thead>
                <tbody></tbody>
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
        ajax: "{{ route('gallery.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {
                data: 'photo', 
                name: 'photo',
                render: function(data, type, full, meta) {
                        // Check if the "data" is empty or null
                        if (data) {
                            return '<img src="{{url('/gallery')}}/' + data + '" alt="Logo" style="max-width: 100px; max-height: 100px;">';
                        }
                        return 'No Photo'; // Display "No Logo" if data is empty or null
                    }
            },
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
        var galleryId = data.id;

        $.ajax({
            url: "{{ url('gallery') }}" + '/' + galleryId + '/view',
            type: 'GET',
            success: function(response) {
                // Handle the Ajax response here
                console.log(response); // Check the response in the browser console
                $('#dataTableDiv').hide();
                $('#add').hide();
                $('#back').show();
                $('#viewDataDiv').html('<strong>Title:</strong> ' + response.title+'<br><strong>Photo:</strong><img src="{{url('/gallery')}}/'+response.photo+'" width="100px" height="100px">' +'<br>'+'<strong>Satus:</strong> ' + response.status);

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
            ajax: "{{ route('gallery.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'photo',
                    name: 'photo',
                    render: function(data, type, full, meta) {
                        // Check if the "data" is empty or null
                        if (data) {
                            return '<img src="{{url('/gallery')}}/'+ data + '" alt="Logo" style="max-width: 100px; max-height: 100px;">';
                        }
                        return 'No Photo'; // Display "No Logo" if data is empty or null
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

                },
            ]
        });

        $(document).on('click', '.edit', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var galleryId = data.id;

            $.ajax({
                url: "{{ url('gallery') }}" + '/' + galleryId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Title:</strong> ' + response.title + '<br><strong>Photo:</strong><img src="{{url('/ gallery')}}/' + response.photo + '" width="100px" height="100px">' + '<br>' + '<strong>Satus:</strong> ' + response.status);

                },
                error: function(error) {
                    // Handle the error response here
                    console.log(error); // Check the error in the browser console
                }
            });
        });
        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var id = data.id;
           
                    Swal.fire({
                        title: 'Delete Confirmation',
                        text: 'Do you really want to delete this record?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // AJAX request to delete the record
                            $.ajax({
                                url: '/gallery-delete'+'/'+id,
                                method: 'GET',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id:id
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success',
                                            text: response.message,
                                       }).then(() => {
                                            // Refresh the page
                                            location.reload();
                                        });
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
                        }
                    });

        });
    });
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
</script>

@endsection