@extends('layouts.app')


@section('content')


<div class="card">

<<<<<<< HEAD
<div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
=======
    <div class="card-header" style="padding: 10px 10px 10px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        <div class="">
            <h4 class="">Show User</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('users.index') }}" class="btn btnback btn-sm">Back</a>
=======
            <a href="{{ route('users.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Back</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>

    <!-- /.dropdown js__dropdown -->
    <div class="card-body">

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection