@extends('layouts.layouts')
@section('content')
@if (session('message'))
<p class="alert alert-info">{{session('message')}}</p>
@endif
<h2>Dashboard</h2>
<a href="{{route('admin.forms.index')}}">Form Builder</a>
@endsection
