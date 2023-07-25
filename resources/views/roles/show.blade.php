@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header" style="padding: 10px 10px 10px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Show Role</h4>
        </div>
        <div class="">
            <a href="{{ route('roles.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Back</a>

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