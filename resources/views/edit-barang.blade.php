@extends('layouts.layout')
@section('section')
     <div class="card">
        <div class="card-body" width="100%">
           
            <form  action="{{url('barang')}}/{{$barang->id}}/update" method="POST">
               {{csrf_field()}} {{method_field('PUT')}}
                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Kode Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kode_barang" id="nama_barang" value="{{$barang->kode_barang}}">
                  </div>
                </div>

                <div class="form-group row">
                  <label  class="col-sm-2 col-form-label">Nama Barang</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="{{$barang->nama_barang}}">
                  </div>
                </div>
             
                  <div align="center">
                    <button type="submit"  class="btn btn-primary btn-lg">Simpan</button>
                  </div>
               
              </form>
        </div>
    </div>
@stop


