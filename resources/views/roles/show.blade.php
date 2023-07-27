@extends('layouts.app')


@section('content')
<div class="card">
<<<<<<< HEAD
<div class="card-header" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
=======
    <div class="card-header" style="padding: 10px 10px 10px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1
        <div class="">
            <h4 class="">Show Role</h4>
        </div>
        <div class="">
<<<<<<< HEAD
            <a href="{{ route('roles.index') }}" class="btn btnback btn-sm">Back</a>
=======
            <a href="{{ route('roles.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Back</a>
>>>>>>> 212b613ca1b671358a9b3b8b3bc33d389958a9d1

            <!-- /.sub-menu -->
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection