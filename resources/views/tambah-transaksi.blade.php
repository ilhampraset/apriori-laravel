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
          <form method="POST" action="{{url('transaksi')}}">
               {{csrf_field()}} 
               
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">kode Transaksi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi">
              </div>
               
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tanggal Transaksi</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi" value="2018-01-01">
              </div>
               
            </div>

            <div id="select_field"> 
	            <div class="form-group row" id='field'>
	              <label  class="col-sm-2 col-form-label">Nama Barang</label>

	              <div class="col-sm-8">
	                <select class="form-control" name="barang[]">
	                	@foreach($barangs as $b)
	                	<option value="{{$b->id}}">{{$b->nama_barang}}</option>
	                	@endforeach
	                </select>
	              </div>
	               
	              <div class="col-sm-2">
	               
	               	<a  onclick="addInput()" href="javascript:void(0);" class="btn btn-primary"> + </a>
	              </div>
	                
	            </div>
            </div>
        

            
         
              <div align="center">
                <button type="submit"  class="btn btn-success btn-lg">Tambah</button>
              </div>
           
          </form>
          	
        </div>
    </div>
@stop

@section('script')


<script>

var i = 1;
    function addInput(){
    	 if(i){
    	 	a = i + 1;
    	 	 newSelect =  '<div class="form-group row" id="field"><label  class="col-sm-2 col-form-label"></label><div class="col-sm-8"><select class="form-control" name="barang[]">@foreach($barangs as $b)<option value="{{$b->id}}">{{ $b->nama_barang}}</option>@endforeach</select></div><div class="col-sm-2"> <a  onclick="addInput()" href="javascript:void(0);" class="btn btn-primary"> + </a> <a  onclick="delSelectField('+i+')" href="javascript:void(0);" class="btn btn-danger"> - </a></div></div>';

              $('#select_field').append(newSelect);
              i++;
               
    	 } 	
        	
             
              

         

    }

    function delSelectField(index) { 	
  		fieldSelect = $('div#select_field').find('div#field'); 
  		fieldSelect[index].remove();
  		i--;						
    }
</script>

@stop