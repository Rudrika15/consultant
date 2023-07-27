@extends('layouts.app')


@section('content')


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif



<div class="card">

<<<<<<< HEAD
<div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
=======
  <div class="card-header" style="padding: 10px 10px 10px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
    <div class="">
      <h4 class="">Users Management</h4>
    </div>
    <div class="">
<<<<<<< HEAD
      <a href="{{ route('users.create') }}" class="btn btnback btn-sm">ADD</a>
=======
      <a href="{{ route('users.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

      <!-- /.sub-menu -->
    </div>
  </div>

  <!-- /.dropdown js__dropdown -->
  <div class="card-body">

    <table class="table table-bordered">
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th width="280px">Action</th>
      </tr>
      @foreach ($data as $key => $user)
      <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
          <label class="fw-bold ">{{ $v }}</label>
          @endforeach
          @endif
        </td>
        <td>
          <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>



@endsection