@extends('layouts.user')
@section('content')
<div class="container-fluid col-sm-8">
    <table class="table table-condensed table-hover table-bordered">
        Completed Orders
        <thead>
            <tr>
                <td>OrderId</td>
                <td>Document Type</td>
                <td>Subject</td>
                <td>Topic</td>
                <td>Document</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($Orders as $order)
                    <td>{{ $order->OrderNumber }}</td>
                    <td>{{ $order->DocType }}</td>
                    <td>{{ $order->Subject }}</td>
                    <td>{{ $order->Topic }}</td>
                    <td>
                        @if($order->Status==5)
                        <span class="text-danger">Pending Your Approval</span>
                        @endif
                        @if($order->Status==0)
                        <span class="text-danger">Work In Progress</span>
                        @endif
                        @if($order->Status==1)
                        <span class="text-danger">Completed</span>
                        @endif
                        @if($order->Status==2)
                        <span class="text-danger">Disputed</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{  App\Uploaded::where('OrderId','=',$order->OrderNumber)->get()->first()->Document }}">Download</a>
                    </td>
                    <td>
                       @if($order->Status !=1)
                        <a href="{{ route('accept',[$order->id]) }}" class="fa fa-check-circle text-success">Accept</a>
                       @else
                       <a href="{{ route('Dispute',[$order->id]) }}" class="fa fa-times-circle text-danger">Dispute</a>
                       @endif
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@stop