@extends('layouts.layout')
@section('section')
     <div class="card">
       <a class="btn btn-primary" href="{{url('tambah-data-barang')}}"><i class="fa fa-plus"></i>Tambah Data Barang</a>
        <div class="card-body" >

             @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $message }}</strong>
                </div>
            @endif
            <table id="example" class="table  table-striped table-bordered">
         <thead>
        <tr role="row">
          <th class="sorting_disabled" rowspan="1" colspan="1" >Kode Barang</th>
          <th class="sorting_disabled" rowspan="1" colspan="1" >Nama Barang</th>
          <th class="sorting_disabled" rowspan="1" colspan="1" >Aksi</th>
       
        </tr>
      </thead>
        <tbody>
            @foreach($barangs as $b)
            <tr>
           
               <td>{{$b->kode_barang}}</td>
               <td>{{$b->nama_barang}}</td>
               <td><a class='btn btn-primary' href="barang/{{$b->id}}" >Edit</a> 
                  <a class="btn btn-danger" onclick="return confirm('Hapus?')" href="barang/{{$b->id}}/delete">Hapus</a>
                    
                </td>

           
            </tr>
            @endforeach
        </tbody>
       
    </table>
        </div>
    </div>
@stop

@section('script')





<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script>
  function confirmDelete() {
    if(confirm('hapus data')){
        $('#delete').submit();

    }
  } 

    $(document).ready(function() {
        $('#example').DataTable();
});
</script>
@stop