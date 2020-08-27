@extends('layouts.user')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 offset-sm-3 card">
            <div class="container-fluid">
                <form method="post" enctype="multipart/form-data" action="{{ route('orders.update',[$order->id]) }}">
                    @csrf
                    @method('PATCH')
                <h2 class="text-center"> Update your Order</h2>
                {{-- <h2 class="text-right">Price</h2> --}}
                    <div class="row">
                        <!--start sm-6-->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Type" class="label-control">
                                        Paper Type
                                    </label>
                                    <select  class="form-control @if(Session::get('Doctype')) is-valid @endif"  name="DocType">
                                        <option label="--Select Document Type--"></option>
                                        @foreach ($papers as $paper)
                                        <option @if($paper->Paper==$order->DocType) selected @endif>{{ $order->DocType }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <!--Endcol-sm-6-->
                         <!--start sm-6-->
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Type" class="label-control">
                                    Paper Spacing
                                </label>
                              <select  class="form-control"  name="Spacing">
                                  <option label="--Select Document Type--"></option>
                                  <option @if($order->Spacing=="Single") selected @endif>Single</option>
                                  <option @if($order->Spacing=="Double") selected @endif>Double</option>
                              </select>
                            </div>
                        </div>
                    <!--Endcol-sm-6-->
                     <!--start sm-6-->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Type" class="label-control">
                                        Language
                                    </label>
                                  <select  class="form-control"  name="Language">
                                      <option label="--Select Language--"></option>
                                      <option @if($order->Language=="English(US)") selected @endif>English(US)</option>
                                      <option @if($order->Language=="English(UK)") selected @endif>English(UK)</option>
                                  </select>
                                </div>
                            </div>
                        <!--Endcol-sm-6-->
                         <!--start sm-6-->
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Type" class="label-control">
                                  Topic 
                                </label>
                                <input type="text" name="Topic" class="form-control" value="Writer's Choice">
                            </div>
                        </div>
                    <!--Endcol-sm-6-->
                     <!--start sm-6-->
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Type" class="label-control">
                                Level
                            </label>
                            <select class="form-control" name="Level">
                                <option label="--Select Level--"></option>
                                <option  @if($order->Level=='PhD') selected @endif>PhD</option>
                                <option  @if($order->Level=='Masters') selected @endif>Masters</option>
                                <option  @if($order->Level=='Undergraduate') selected @endif>Undergraduate</option>
                                <option  @if($order->Level=='College') selected @endif>College</option>
                                <option  @if($order->Level=='High School') selected @endif>High School</option>
                            </select>
                        </div>
                    </div>
                <!--Endcol-sm-6-->
                 <!--start sm-6-->
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Type" class="label-control">
                            Deadline
                        </label>
                        <input type="date" name="Deadline" class="form-control" value="{{ $order->Deadline }}">
                    </div>
                </div>
            <!--Endcol-sm-6-->
             <!--start sm-6-->
             <div class="col-sm-6">
                <div class="form-group">
                    <label for="Type" class="label-control">
                        Pages
                    </label>
                    <input type="number" name="Pages" class="form-control" value="{{$order->Pages }}">
                </div>
            </div>
            <!--Endcol-sm-6-->
            <!--start sm-6-->
            <div class="col-sm-6">
            <div class="form-group">
                <label for="Type" class="label-control">
                    Subject
                </label>
                <select class="form-control" name="Subject">
                    <option label="--Select Subject--"></option>
                    @foreach ($subjects  as $subject)
                    <option @if($order->Subject==$subject->Subject) selected @endif>{{ $subject->Subject }}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <!--Endcol-sm-6-->
            <!--start sm-6-->
            <div class="col-sm-6">
            <div class="form-group">
                <label for="Type" class="label-control">
                    Paper Format
                </label>
                <select class="form-control" name="Format">
                    <option label="--Select Format--"></option>
                    <option @if($order->Format=="APA") selected @endif>APA</option>
                    <option @if($order->Format=="MLA") selected @endif>MLA</option>
                    <option @if($order->Format=="Chicago") selected @endif>Chicago</option>
                    <option @if($order->Format=="Havard") selected @endif>Havard</option>
                    <option @if($order->Format=="Writer Choice") selected @endif>Writer Choice</option>
                </select>
            </div>
            </div>
            <!--Endcol-sm-6-->
            <!--start sm-6-->
            <div class="col-sm-6">
            <div class="form-group">
                <label for="Type" class="label-control">
                    Paper Details
                </label>
                <input type="file" name="Details" class="form-control">
            </div>
            </div>
            <!--Endcol-sm-6-->
            <!--start sm-6-->
            <div class="col-sm-12">
            <div class="form-group">
                <label for="Type" class="label-control">
                    Paper Description
                </label>
               <textarea id="summernote" name="Description" class="form-control">
                {!! $order->Description !!}
               </textarea>
            </div>
            </div>
            <!--Endcol-sm-6-->
                    </div>
                    <div class="row">
                        <div class="col-sm-6 offset-sm-3 mb-2">
                         <button class="btn btn-success btn-block">Update Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop