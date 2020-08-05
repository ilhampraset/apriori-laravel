@extends('layouts.layout')
@section('section')
  <div class="card">
        <div class="card-body" width="100%">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
            @endif
          <form  action="setting" method="POST">
               {{csrf_field()}} 
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Minimum Support</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="minSup" value="{{$setting->minSup}}" >
              </div>
               
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Minimum Confidence</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="minConf" value="{{$setting->minConf}}">
              </div>
            </div>
         
              <div align="center">
                <button type="submit"  class="btn btn-primary btn-lg">Tambah</button>
              </div>
           
          </form>
        </div>
    </div>
@stop


