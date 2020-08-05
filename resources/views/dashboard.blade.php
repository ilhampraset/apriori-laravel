@extends('layouts.layout')
@section('css')
   	.card{
   		margin-bottom: 10px;
   		<!-- margin-right: 10px; -->
   		
   	}
 
   	.col-md-6 {
	    -webkit-box-flex: 0;
	    -ms-flex: 0 0 33.33333333%;
	    flex: 0 0 48.333333%;
	    max-width: 47%;
	    margin-left: 22px;
	}
	.col-md-11 {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 91.66666667%;
    flex: 0 0 95.666667%;
    max-width: 97.666667%;
    margin-left: 23px;
	}
@stop

@section('section')
    <div class="row">
    
  
	    <div class="card col-md-6 col-sm-6">
	        <a href="{{url('data-barang')}}">
		        <div class="card-body">
		        	 Total Barang    	     	 	
		          	<div class="build-counter-box">
				    	<div align="center">
				    	<h2>{{$barang}}</h2>
				    	<i class="fa fa-briefcase" style="font-size:48px;"></i>
			        	<p>Record</p>
				    	</div>
					</div>               	 
		        </div>
	        </a>
	    </div>
	    <div class="card col-md-6 col-sm-6">
	    	<a href="{{url('data-transaksi')}}">
	        <div class="card-body">
	          Total Transaksi
	          	<div class="build-counter-box">
			    	<div align="center">
			    	
			    	<h2>{{$transaksi}}</h2>
			    	<i class="fa fa-cart-plus" style="font-size:48px;"></i>
		        	<p>Record</p>
			    	</div>       
	        	</div>
	    	</div>
	    	</a>
	    </div>

	    <div class="card col-md-11 col-sm-11">
	      
	       <div class="card-body">  
	       	<div align="left">
	       		<h5>Asociation Rules</h5>
	       	</div>
	       	
	       	<div align="right">
	       		<a href="{{url('association-rule')}}"><h5>Detail>></h5></a>	
	       	</div>
	       	
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
    </div>
@stop

@section('script')


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>

@stop