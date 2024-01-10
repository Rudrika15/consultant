@extends('layouts.app')

@section('header','Lead')
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
            <h4 class="">Leads</h4>
        </div>
        <div class="">
            {{-- <a href="{{ route('city.create') }}" id="add" class="btn btn-info btn-sm">ADD</a> --}}
            <a href="" id="back" class="btn btn-info  btn-sm" style="display:none;">BACK</a>

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
                        <th>User</th>
                        <th>Category</th>
                        <th>Status</th>

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
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('consultant.lead.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'user.name',
                    name: 'user.name'
                },
                {
                    data: 'categories.catName',
                    name: 'categories.catName'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                
            ]
        });
    });
</script>

@endsection