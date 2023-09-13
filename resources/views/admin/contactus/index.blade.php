@extends('layouts.app')

@section('header', 'Contact Us List')
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
                <h4 class="">Contact Us List</h4>
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
                            <th>Phone</th>
                            <th>Comments</th>
                            <th>Status</th>
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
    <script type="text/javascript">
        $(function() {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('contactus.index') }}",
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
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'comments',
                        name: 'comments',
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
            var contactusId = data.id;

            $.ajax({
                url: "{{ url('contactus') }}" + '/' + contactusId + '/view',
                type: 'GET',
                success: function(response) {
                    // Handle the Ajax response here
                    console.log(response); // Check the response in the browser console
                    $('#dataTableDiv').hide();
                    $('#add').hide();
                    $('#back').show();
                    $('#viewDataDiv').html('<strong>Name:</strong> '+response.name +'<br><strong>Eamil:</strong> ' + response.email + '<br><strong>Phone:</strong> ' + response.phone + '<br><strong>Comments:</strong> ' + response.Comments   + '<br><strong>Status:</strong> '+ response.status);

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
