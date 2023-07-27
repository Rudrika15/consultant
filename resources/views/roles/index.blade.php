@extends('layouts.app')

<<<<<<< HEAD
@section('header','Role')
=======
@section('header','Fair')
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
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

<<<<<<< HEAD
    <div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
=======
    <div class="card-header" style="padding: 10px 10px 10px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        <div class="">
            <h4 class="">Role Management</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('roles.create') }}" class="btn btnback btn-sm">ADD</a>
=======
            <a href="{{ route('roles.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>

    <!-- /.dropdown js__dropdown -->
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
<<<<<<< HEAD
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
=======
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" >Edit</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>


    <script>
        function ConfirmDelete() {
            return confirm("Are you sure you want to delete?");
        }
    </script>


    @endsection