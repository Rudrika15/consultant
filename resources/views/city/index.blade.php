@extends('layouts.app')

@section('header','city')
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
            <h4 class="">City</h4>
        </div>
        <div class="">
            <a href="{{ route('city.create') }}" id="add" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <a href="" id="back" class="btn btnback  btn-sm" style="background-color: #002E6E; color:white;display:none;">Back</a>
           
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
                        <th>State</th>
                        <th>City Name</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <!-- <tr>
                    <td>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr> -->
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
  $(function () {   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('city.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'state.stateName', name: 'state.stateName'},
            {data: 'cityName', name: 'cityName'},
            {data: 'status', name: 'status'},
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
        var cityId = data.id;

        $.ajax({
            url: "{{ url('city') }}" + '/' + cityId + '/view',
            type: 'GET',
            success: function(response) {
                // Handle the Ajax response here
                console.log(response); // Check the response in the browser console
                $('#dataTableDiv').hide();
                $('#add').hide();
                $('#back').show();
                $('#viewDataDiv').html('<strong>City Name:</strong> ' + response.cityName +'<br>'+'<strong>State Name:</strong> '+ response.state.stateName +'<br>'+'<strong>Satus:</strong> ' + response.status);

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