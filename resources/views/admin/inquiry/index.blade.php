@extends('layouts.app')

@section('header', 'Corporate Inquiry')
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
                <h4 class="">Corporate Inquiry</h4>
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
                            <th>Inquiry</th>
                            <th>Status</th>  
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
                ajax: "{{ route('corparateInquiry.index') }}",
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
                        data: 'inquiry',
                        name: 'inquiry',
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
