@extends('layouts.layout')
@section('section')
  
  
   <div class="card">
        <div class="card-body" width="100%">
            <table id="example" class="table  table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
              <td>No</td>
              <td>Rule</td>
              <td>Support</td>
              <td>Confidence</td>
              <td>Lift Ratio</td>
            </tr>
        </thead>
        <tbody>
          <?php $no =1;?>
          @foreach($result as $key => $value)
          <tr>
            <td>{{$no++}}</td>
            <td><b>{{$key}}</b> => <b>{{$value['then']}}</b></td>
            <td>{{$value['support']}}</td>
            <td>{{$value['confidence']}}</td>
            <td>{{$value['lift']}}</td>
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


  var i =0;
  var a = 0;
    $(document).ready(function() {
        $('#example').DataTable();
        str = window.location.pathname;
        var res = str.split("/");
         console.log(res[3] +' '+ res[5]);
         if((res[3] === undefined) && (res[5] === undefined) ){
          $('#support').val(0.2);
          $('#confidence').val(0.5);
         }else{
          $('#support').val(res[3]);
          $('#confidence').val(res[5]);  
         }
        
        $('#subm').on('keypress click', (e) =>{

           let support =  $('#support').val();
           let confidence = $('#confidence').val();
           if (e.which === 13 || e.type === 'click') {
            console.log(window.location.href);
            window.location.href = "/association-rule/support/" +support+ "/confidence/" + confidence ; 
           }
           
        })
    });
</script>
@stop