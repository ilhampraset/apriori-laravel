@extends('layouts.layout')
@section('section')
     <div class="card">
        <div class="card-body" width="100%">
           
             <form method="POST" action="{{url('transaksi')}}/{{$transaksi['id']}}/update">
               {{csrf_field()}} {{method_field('PUT')}}
               
            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">kode Transaksi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kode_transaksi" id="kode_transaksi" value='{{$transaksi['kode_transaksi']}}'>
              </div>
               
            </div>

            <div class="form-group row">
              <label  class="col-sm-2 col-form-label">Tanggal Transaksi</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi" value="{{$transaksi['tanggal']}}">
              </div>
               
            </div>

         

              @if($transaksi['barang'][0]['id_barang'])

              <div id="select_field"> 
                <div class="form-group row" id='field'>
                  <label  class="col-sm-2 col-form-label">Nama Barang</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="barang[]" onchange="test()" id='val'>
                      @foreach($barangs as $b)
                      <option value="{{$b->id}}" {{ $transaksi['barang'][0]['id_barang'] == $b->id ? 'selected="selected"' : '' }}>{{$b->nama_barang}}</option>
                      @endforeach
                    </select>
                  </div>
                   
                  <div class="col-sm-2">
                   
                    <a  onclick="addInput()" href="javascript:void(0);" class="btn btn-primary"> + </a>
                  </div>
                    
                </div>
            </div>
            @endif 
             <?php $brg = count($transaksi['barang']) - 1?>
             @for($i=1;$i<=$brg;$i++)
            
              <div id="select_field"> 
                <div class="form-group row" id='field'>
                  <label  class="col-sm-2 col-form-label"></label>

                  <div class="col-sm-8">
                    <select class="form-control" name="barang[]" id="val" onchange="test()">
                      @foreach($barangs as $b)
                      <option value="{{$b->id}}"  {{ $transaksi['barang'][$i]['id_barang'] == $b->id ? 'selected="selected"' : '' }}>{{$b->nama_barang}}</option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="col-sm-2">                   
                   <a  onclick="addInput()" href="javascript:void(0);" class="btn btn-primary"> + </a> <a  onclick="delSelectField({{$i}})" href="javascript:void(0);" class="btn btn-danger"> - </a>
                  </div>

                    
                </div>
              </div>
              @endfor
            

  

            
         
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
       
       
         newSelect =  '<div class="form-group row" id="field"><label  class="col-sm-2 col-form-label"></label><div class="col-sm-8"><select class="form-control" name="barang[]">@foreach($barangs as $b)<option value="{{$b->id}}">{{ $b->nama_barang}}</option>@endforeach</select></div><div class="col-sm-2"> <a  onclick="addInput()" href="javascript:void(0);" class="btn btn-primary"> + </a> <a  onclick="delSelectField('+i+')" href="javascript:void(0);" class="btn btn-danger"> - </a></div></div>';

              $('#select_field').append(newSelect);
              i++;
               console.log(i);
       
          
             
              

         

    }

    function test() {
      console.log($('#val').val());
    }

    function delSelectField(index) {
    alert(index);
    if(index == 0){
      index++;
      alert(index++);
    }
    if(i == 0 ){
      i++;
    }else{
      i--;
    }
    fieldSelect = $('div#select_field').find('div#field'); 
    fieldSelect[index].remove();

    //console.log(fieldSelect[2]);
    
        
    }
</script>

@stop