@extends('layouts.app')

@section('header', 'Consultant')
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
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Consultant List</h4>
        </div>
        <div class="">
            <a href="{{ route('consultant.index') }}" id="back" class="btn btnback btn-sm"
                style="display:none;">BACK</a>
            <a href="{{ route('consultant.create') }}" id="add" class="btn btnback btn-sm btn-info">ADD</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" id="dataTableDiv">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Plan Type</th>
                        <th>About</th>
                        <th>Photo</th>
                        <th>Type</th>
                        <th>Company Name</th>
                        <th>Category</th>
                        <th>Package</th>
                        <th>Is Featured</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultants as $consultant)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $consultant->name }}</td>
                        <td>{{ $consultant->email }}</td>
                        <td>{{ $consultant->contactNo }}</td>
                        <td>{{ $consultant->planType }}</td>
                        <td>
                            @if(isset($consultant->profile->about))
                            {{ $consultant->profile->about }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->photo))
                            <img src="{{ url('/profile') . '/' . $consultant->profile->photo }}" width="50px"
                                height="50px">
                            @else
                            <img src="{{ url('/placeholder-image.jpg') }}" width="50px" height="50px" alt="Image">
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->type))
                            {{ $consultant->profile->type }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->company))
                            {{ $consultant->profile->company }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->category->catName))
                            {{ $consultant->profile->category->catName }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->packages->title))
                            {{ $consultant->profile->packages->title }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->profile->isFeatured))
                            {{ $consultant->profile->isFeatured }}
                            @endif
                        </td>
                        <td>
                            @if(isset($consultant->status))
                            {{ $consultant->status }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('consultant.view', $consultant->id) }}"
                                class="btn btn-success btn-sm view">View</a>

                            <a href="{{ route('consultant.edit', $consultant->id) }}"
                                class="btn btn-primary btn-sm mt-3 edit">Edit</a>
                        </td>

                    </tr>
                    @endforeach
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var table = $('#dataTable').DataTable();
        $('#dataTable tbody').on('click', 'tr', function () {
            var data = table.row(this).data();
            window.location.href = "{{ url('consultant') }}" + '/' + data.id + '/view';
        });
    });
</script>

@endsection