@extends('layouts.user')
@section('content')
<div class="container-fluid col-sm-4">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    @if($errors->all())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <span>{{ $error }}</span><br>
        @endforeach
    </div>
    @endif
    Distribute Assignments To  Writers
    <form method="Post" action="{{ route('ass.dist') }}">
        @csrf
        <div class="form-group">
            <label class="label-control" for="Writers">
                Choose Writers
            </label>
            <select name="Writer" class="form-control">
                <option label="--Select Writer--"></option>
                @foreach ($Writers as $writer)
                <option>{{ $writer->email }}</option>
                @endforeach
            </select>
            <label class="label-control" for="Assignments">
                Choose Assignment
            </label>
            <select name="Assignment" class="form-control">
                <option label="--Select Assignment--"></option>
                @if($Assignments->count()==0)
                <option label="All Assignments Are  Distributed" style="color:red"></option>
                @else
                @foreach ($Assignments as $Assignment)
                <option value="{{ $Assignment->OrderNumber }}">{{ $Assignment->OrderNumber }}( {{ $Assignment->DocType }})</option>
                @endforeach
                @endif
            </select>
            <button class="btn btn-success mt-3 btn-block" type="submit">Distribute</button>
        </div>
    </form>
    <dist-component></dist-component>
</div>
@endsection