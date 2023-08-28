@extends('layouts.app')

@section('header','Consultant')
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
            <h4 class="">Consultant List</h4>
        </div>
        <div class="">
            
            <a href="" id="back" class="btn btnback  btn-sm" style="display:none;">BACK</a>

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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Plan Type</th>
                        <th>About</th>
                        <th>photo</th>
                        <th>Type</th>
                        <th>Company Name</th>
                        <th>Category</th>
                        <th>Package</th>
                        <th>Is Featured</th>
                        <th>status</th> 
                        <th>Action</th>
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
<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('consultant.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
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
                    data: 'contactNo',
                    name: 'contactNo'
                },
                {
                    data: 'planType',
                    name: 'planType'
                },
                {
                    data: 'profile.about',
                    name: 'profile.about'
                },
                {
                    data: 'profile.photo',
                    name: 'profile.photo'
                },
                {
                    data: 'profile.type',
                    name: 'profile.type'
                },
                {
                    data: 'profile.company',
                    name: 'profile.company'
                },
                {
                    data: 'profile.categories.catName',
                    name: 'profile.categories.catName'
                },
                {
                    data: 'profile.packages.title',
                    name: 'profile.packages.title'
                },
                {
                    data: 'profile.isFeatured',
                    name: 'profile.isFeatured'
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
                    // render: function (data, type, full, meta) {

                    //     return $edit=`<a href="{{ route('city.edit', ':id') }}" class="btn btn-sm btn-primary">Edit</a>`

                    // }
                },
            ]
        });

        $(document).on('click', '.edit', function() {
            var row = $(this).closest('tr');
            var data = table.row(row).data();
            var consultantId = data.id;

            $.ajax({
                url: "{{ url('consultant') }}" + '/' + consultantId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Name:</strong>' + response.name + 
                        '<br>' + '<strong>Emai:</strong> ' + response.email +
                        '<br>' + '<strong>Contact No:</strong> ' + response.contactNo +
                        '<br>' + '<strong>Plan Type:</strong> ' + response.planType +
                        '<br>' + '<strong>About:</strong> ' + response.profile.about +
                        '<br>' + '<br><strong>Photo:</strong><img src="{{url('/profile')}}/' + response.profile.photo + '" width="100px" height="100px" class="ms-3">' +
                        '<br>' + '<strong>Type:</strong> ' + response.profile.type +
                        '<br>' + '<strong>Company:</strong> ' + response.profile.company   +
                        '<br>' + '<strong>Category:</strong> ' + response.profile.categories.catName +
                        '<br>' + '<strong>Package:</strong> ' + response.profile.packages.title +
                        '<br>' + '<strong>Is Featured:</strong> ' + response.profile.ifFeatured +
                        '<br>' + '<strong>Status:</strong> ' + response.status);

                },
                error: function(error) {
                    // Handle the error response here
                    console.log(error); // Check the error in the browser console
                }
            });
        });

        // $('body').on('click', '.delete', function(event) {
        //     event.preventDefault();
        //     var row = $(this).closest('tr');
        //     var data = table.row(row).data();
        //     var id = data.id;
        //     Swal.fire({
        //         title: 'Delete Confirmation',
        //         text: 'Do you really want to delete this record?',
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#d33',
        //         cancelButtonColor: '#4e73df',
        //         confirmButtonText: 'Yes, delete it!',
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             // AJAX request to delete the record
        //             $.ajax({
        //                 url: '/city-delete' + '/' + id,
        //                 method: 'GET',
        //                 data: {
        //                     _token: "{{ csrf_token() }}",
        //                     id: id
        //                 },
        //                 success: function(response) {
        //                     if (response.success) {
        //                         Swal.fire({
        //                             icon: 'success',
        //                             title: 'Deleted',
        //                             text: response.message,
        //                         }).then(() => {
        //                             // Refresh the page
        //                             location.reload();
        //                         });
        //                     } else {
        //                         // Error message using SweetAlert
        //                         Swal.fire({
        //                             icon: 'error',
        //                             title: 'Error',
        //                             text: 'An error occurred!',
        //                         });
        //                     }
        //                 },
        //                 error: function(xhr, status, error) {
        //                     // Error message using SweetAlert
        //                     Swal.fire({
        //                         icon: 'error',
        //                         title: 'Error',
        //                         text: 'An error occurred!',
        //                     });
        //                 }
        //             });
        //         }
        //     });

        // });

    });
</script>

@endsection