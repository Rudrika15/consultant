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
            <a href="{{ route('adminworkshop.index') }}" id="back" class="btn btn-info btn-sm">Back</a>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <strong>Title:</strong> {{ $workshopData->title }} <br>
                <strong>Price:</strong> {{ $workshopData->price }} <br>
                <strong>Detail:</strong> {!! $workshopData->detail !!} <br>
            </div>
            <div class="col-md-6">
                <strong>Link:</strong> {{ $workshopData->link }} <br>
                <strong>Address:</strong> {{ $workshopData->address }} <br>
                <strong>Workshop Date:</strong> {{ $workshopData->workshopDate }} <br>
                <strong>Status:</strong> {{ $workshopData->status }} <br>
                <strong>Workshop Type:</strong> {{ $workshopData->workshopType }} <br>
            </div>
        </div>

        <div class="mt-4">
            <h5>List of Registered Users</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registeredUsers as $index => $registration)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $registration->users->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No registered users for this workshop</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection