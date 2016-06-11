@extends('master')
<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
@section('title') analytics:: @parent @stop
@section('content')



<div class="row">
    <div class="page-header" style="text-align: center;">
        <h3><?php echo $Title; ?></h3>
    </div>

</div>
<div id="stock-div" style="    position: relative;
  
    bottom: 20px;"></div>

{!! \Lava::render('ColumnChart', 'MyStocks', 'stock-div') !!}


<section class="panel panel-primary">
<div class="panel-body">

<table class="table table-hover table-bordered  dt-responsive nowrap display gps" cellspacing="0" width="100%">
  	<thead>
  		<tr>
		<th>No</th>
			<th>Pormoter Name</th> 
			<th>Date</th>
			<th>Project Status</th>
			<th>Lattiude</th>
			<th>Longitude</th>			
			<th>Contractor Name</th>
			<th>Contractor Code</th>		
		</tr>
	</thead>

	<tbody id="tbody">
		<?php $i=1; ?>
		@foreach($datatable as $user_gps)
			<tr> 
				<td>{{$i++}}</td>
			    <td>{{$user_gps->getusers->name}}</td>
			    <td>{{$user_gps->NDate}}</td>
	
     			<td>{{$user_gps->Status }}
      			</td>
			    <td>{{$user_gps->Lat}}</td>
			    <td>{{$user_gps->Long}}</td>		    
			    <td>{{$user_gps->Contractor_Name}}</td>
			    <td>{{$user_gps->Contractor_Code}}</td>
			</tr>    
		@endforeach	    

	</tbody>

	<tfoot>
 		<th>No</th>
			<th>Pormoter Name</th> 
			<th>Date</th>
			<th>Project Status</th>
			<th>Lattiude</th>
			<th>Longitude</th>			
			<th>Contractor Name</th>
			<th>Contractor Code</th>
	</tfoot>

</table>

<div id="stock-div"></div>

{!! \Lava::render('ColumnChart', 'MyStocks', 'stock-div') !!}


<script type="text/javascript">

  $(document).ready(function(){
    var table= $('.gps').DataTable({ 
     select:true,
    responsive: true,
    "order":[[0,"asc"]],
    'searchable':true,
   	"scrollCollapse":true,
   	"paging":true,
   	"pagingType": "simple",
      dom: 'lBfrtip',
        buttons: [
           
            
            { extend: 'excel', className: 'btn btn-primary dtb' }
            
            
        ],

});


$('.gps tfoot th').each(function () {
    var title = $('.gps thead th').eq($(this).index()).text();
	$(this).html( '<input type="text" placeholder="بحث '+title+'" />' );
});

table.columns().every( function () {
  	var that = this;
	$(this.footer()).find('input').on('keyup change', function () {
		that.search(this.value).draw();
		    if (that.search(this.value) ) {
		        that.search(this.value).draw();
		    }
		});     
    });
});
</script>


</section>

@endsection
