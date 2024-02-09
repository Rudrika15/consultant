@extends('layouts.app')

@section('header', 'Workshop')
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
            <h4 class="">Workshop</h4>
        </div>
        <div class="">
            <a href="{{ route('adminworkshop.create') }}" id="add" class="btn btn-info btn-sm">ADD</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive" id="dataTableDiv">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr No</th>
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
                    @foreach($workshop as $workshopData)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $workshopData->title }}</td>
                        <td>{{ $workshopData->price }}</td>
                        <td>{{ $workshopData->photo }}</td>
                        <td>{{ $workshopData->detail }}</td>
                        <td>{{ $workshopData->workshopType }}</td>
                        <td>{{ $workshopData->link }}</td>
                        <td>{{ $workshopData->address }}</td>
                        <td>{{ $workshopData->workshopDate }}</td>
                        <td>{{ $workshopData->status }}</td>
                        <td>
                            <a class="btn btn-info btn-sm view"
                                href="{{ route('adminworkshop.show', $workshopData->id) }}">View</a>
                            <a class="btn btn-success btn-sm edit"
                                href="{{ route('adminworkshop.edit', $workshopData->id) }}">Edit</a>

                            <form action="{{ route('adminworkshop.delete', $workshopData->id) }}" method="POST"
                                onsubmit="return ConfirmDelete()">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function ConfirmDelete() {
        return confirm("Are you sure you want to delete?");
    }
</script>

@endsection