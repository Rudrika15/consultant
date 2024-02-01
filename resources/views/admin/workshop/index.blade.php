@extends('layouts.app')

@section('header','Workshop')
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
            <h4 class="">Workshop</h4>
        </div>
        <div class="">
            <a href="{{ route('adminworkshop.create') }}" id="add" class="btn btn-info btn-sm">ADD</a>

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
                        {{-- <th>User Id</th> --}}
                        <th>Title</th>
                        <th>Price</th>
                        <th>Photo</th>
                        <th>Detail</th>
                        <th>Workshop Type</th>
                        <th>Link</th>
                        <th>Address</th>
                        <th>Workshop Date</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>

                <tbody>

                </tbody>
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
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('adminworkshop.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                // {
                //     data: 'users.name',
                //     name: 'users.name'
                // },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'photo',
                    data: 'photo'
                },
                {
                    data: 'detail',
                    name: 'detail'
                },
                {
                    data: 'workshopType',
                    name: 'workshopType'
                },
                {
                    data: 'link',
                    name: 'link'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'workshopDate',
                    name: 'workshopDate'
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
            var workshopId = data.id;

            $.ajax({
                url: "{{ url('adminworkshop') }}" + '/' + workshopId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>User:</strong> '+response.users.name +'<br><strong>Title:</strong> ' + response.title + '<br><strong>Price:</strong> ' + response.price  + '<br><strong>Detail:</strong> ' + response.detail+'<br><strong>Workshop Type:</strong> ' + response.workshopType +'<br><strong>Link:</strong> ' + response.link +'<br><strong>Address:</strong> ' + response.address +'<br><strong>Workshop Date:</strong> ' + response.workshopDate + '<br><strong>Satus:</strong> '+ response.status);

                },
                error: function(error) {
                    // Handle the error response here
                    console.log(error); // Check the error in the browser console
                }
            });
        });
    });
</script>

@endsection