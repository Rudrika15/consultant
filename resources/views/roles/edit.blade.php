@extends('layouts.app')


@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Edit Role</h4>
        </div>
        <div class="">
            <a href="{{ route('roles.index') }}" class="btn btn-info btn-sm">Back</a>

            <!-- /.sub-menu -->
        </div>
    </div>

    <div class="card-body">

        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true :
                        false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="chackall">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input all" type="checkbox" id="all" name="name" value="something">
                            <label class="form-check-label all" for="all"><strong>All Check</strong></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<script type="text/javascript">
    $('.all').on('change', function() {
        if (this.checked) {
            $('.name').prop('checked', true);
        } else {
            $('.name').prop('checked', false);
        }
    });
</script>

@endsection