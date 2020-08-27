@extends('layouts.user')
@section('content')
<div class=" card col-sm-6 offset-sm-3">
   @if(Session::has('success'))
   <div class="alert alert-success">
       <strong>{{ Session::get('success') }}</strong>
   </div>
   @endif
    @if(Session::get('Doctype') !='')
    <div class="alert  alert-danger mt-3">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        You have incomplete Order, Kindly Complete it Here
    </div>
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{ route('orders.store') }}">
            @csrf
        <h2 class="text-center"> Complete your Order</h2>
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
                              <option @if(Session::get('Doctype')==$paper->Paper) selected @endif>{{ $paper->Paper }}</option>
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
                          <option>Single</option>
                          <option>Double</option>
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
                              <option>English(US)</option>
                              <option>English(UK)</option>
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
                    <select class="form-control  @if(Session::get('Level')) is-valid @endif" name="Level">
                        <option label="--Select Level--"></option>
                        <option  @if(Session::get('Level')=='PhD') selected @endif>PhD</option>
                        <option  @if(Session::get('Level')=='Masters') selected @endif>Masters</option>
                        <option  @if(Session::get('Level')=='Undergraduate') selected @endif>Undergraduate</option>
                        <option  @if(Session::get('Level')=='College') selected @endif>College</option>
                        <option  @if(Session::get('Level')=='High School') selected @endif>High School</option>
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
                <input type="date" name="Deadline" class="form-control @if(Session::get('Deadline')) is-valid @endif" value="{{ Session::get('Deadline') }}">
            </div>
        </div>
    <!--Endcol-sm-6-->
     <!--start sm-6-->
     <div class="col-sm-6">
        <div class="form-group">
            <label for="Type" class="label-control">
                Pages
            </label>
            <input type="number" name="Pages" class="form-control" value="{{ Session::get('Pages') }}">
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
            <option>{{ $subject->Subject }}</option>
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
            <option>APA</option>
            <option>MLA</option>
            <option>Chicago</option>
            <option>Havard</option>
            <option>Writer Choice</option>
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
       <textarea id="summernote" name="Description" class="form-control"></textarea>
    </div>
</div>
<!--Endcol-sm-6-->
            </div>
            <div class="row">
                <div class="col-sm-6 offset-sm-3 mb-2">
                 <button class="btn btn-success btn-block">Submit Order</button>
                </div>
            </div>
        </form>
    </div>
    @else
    <div class="container-fluid">
        <form method="post" enctype="multipart/form-data" action="{{ route('orders.store') }}">
            @csrf
        <h2 class="text-center"> Create your Order</h2>
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
                                <option @if(Session::get('Doctype')==$paper->Paper) selected @endif>{{ $paper->Paper }}</option>
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
                          <option>Single</option>
                          <option>Double</option>
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
                              <option>English(US)</option>
                              <option>English(UK)</option>
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
                    <select class="form-control  @if(Session::get('Level')) is-valid @endif" name="Level">
                        <option label="--Select Level--"></option>
                        <option  @if(Session::get('Level')=='PhD') selected @endif>PhD</option>
                        <option  @if(Session::get('Level')=='Masters') selected @endif>Masters</option>
                        <option  @if(Session::get('Level')=='Undergraduate') selected @endif>Undergraduate</option>
                        <option  @if(Session::get('Level')=='College') selected @endif>College</option>
                        <option  @if(Session::get('Level')=='High School') selected @endif>High School</option>
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
                <input type="date" name="Deadline" class="form-control @if(Session::get('Deadline')) is-valid @endif" value="{{ Session::get('Deadline') }}">
            </div>
        </div>
    <!--Endcol-sm-6-->
     <!--start sm-6-->
     <div class="col-sm-6">
        <div class="form-group">
            <label for="Type" class="label-control">
                Pages
            </label>
            <input type="number" name="Pages" class="form-control" value="{{ Session::get('Pages') }}">
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
            <option>{{ $subject->Subject }}</option>
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
            <option>APA</option>
            <option>MLA</option>
            <option>Chicago</option>
            <option>Havard</option>
            <option>Writer Choice</option>
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
       <textarea id="summernote" name="Description" class="form-control"></textarea>
    </div>
</div>
<!--Endcol-sm-6-->
            </div>
            <div class="row">
                <div class="col-sm-6 offset-sm-3 mb-2">
                 <button class="btn btn-success btn-block">Submit Order</button>
                </div>
            </div>
        </form>
    </div>
    @endif
</div>
@stop