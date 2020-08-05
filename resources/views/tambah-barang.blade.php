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
          <form  action="barang" method="POST">
               {{csrf_field()}} 
               
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">kode Barang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kode_barang" id="kode_barang">
              </div>
               
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Nama Barang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_barang" id="nama_barang">
              </div>
               
            </div>
         
              <div align="center">
                <button type="submit"  class="btn btn-primary btn-lg">Tambah</button>
              </div>
           
          </form>
        </div>
    </div>
@stop


