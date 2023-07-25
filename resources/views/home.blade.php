@extends('layouts.app')

@section('content')
@if(Auth::user()->roles[0]->name === "Admin")
@include('dashboard.admin')
@else
@include('dashboard.consultant')
@endif
@endsection