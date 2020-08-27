@extends('layouts.user')
@section('content')
<div class="container-fluid">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <uploaded-component></uploaded-component>
</div>
@stop