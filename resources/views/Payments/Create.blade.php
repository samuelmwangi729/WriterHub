@extends('layouts.user')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-7">
      <checkout-component></checkout-component>
    </div>
    <div class="col-sm-5">
      <h3>Order Number: {{ Session::get('OrderId') }}</h3>
      <h3>Total Amount: $ {{ Session::get('Amount') }}</h3>     
    </div>
  </div>
</div>
@stop