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
    <!-- /.box-title -->
    <div class="card-header"
        style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #345BCB; color:white;">
        <div class="">
            <h4 class="">Workshop Registrations</h4>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-body">
        <div class="table-responsive" id="dataTableDiv">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Sr No</th>
                        <th class="text-center">User Name</th>
                        <th class="text-center">Workshop Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workshopRegistrations as $key => $registration)
                    <tr>
                        {{-- <td class="text-center">{{ $workshopRegistrations->firstItem() + $key }}</td> --}}
                        <td>{{ $registration->id }}</td>
                        <td>{{ $registration->users->name }}</td>

                        <td>
                            @if($registration->workshops)
                            {{ $registration->workshops->title }}
                            @else
                            -
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="viewDataDiv">
            {{ $workshopRegistrations->links() }}
        </div>
    </div>
</div>

@endsection