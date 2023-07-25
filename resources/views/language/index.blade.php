@extends('layouts.app')

@section('header','Language')
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
            <h4 class="">Language</h4>
        </div>
        <div class="">
            <a href="{{ route('language.create') }}" id="add" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>

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
                        <th>Language</th>
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
  $(function () {   
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('language.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'language_masters.language', name: 'language_masters.language'},
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
        var languageId = data.id;

        $.ajax({
            url: "{{ url('language') }}" + '/' + languageId + '/view',
            type: 'GET',
            success: function(response) {
                // Handle the Ajax response here
                console.log(response); // Check the response in the browser console
                $('#dataTableDiv').hide();
                $('#add').hide();
                $('#back').show();
                $('#viewDataDiv').html('<strong>Language Name:</strong> ' + response.language_masters.language +'<br>'+'<strong>Satus:</strong> ' + response.status);

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