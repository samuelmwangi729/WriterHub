@extends('layouts.user')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif
<example-component></example-component>
@endsection
