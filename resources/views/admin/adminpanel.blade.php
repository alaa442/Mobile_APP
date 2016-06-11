@extends('master')

<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<meta name="csrf-token" content="{{ csrf_token() }}" />

<script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false">	
</script>
@section('content')
<section class="panel panel-primary">
<div class="panel-body">
	  <h1><i class='fa fa-desktop'></i> Admin Panel </h1>

<div id="middlecol">
	<table style="width:100%" class="table table-hover table-bordered dt-responsive nowrap display gps" cellspacing="0">
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
		@foreach($gps as $user_gps)
			<tr> 
				<td>{{$i++}}</td>
			    <td>{{$user_gps->getusers->name}}</td>
			    <td>{{$user_gps->NDate}}</td>

     			<td>{{$user_gps->Status }}
                    
      			</td>
			    <td>{{$user_gps->Lat}}</td>
			    <td>{{$user_gps->Long}}</td>		    
		<td><a  class="testEdit" data-type="text" data-name="Contractor_Name" data-pk="{{ $user_gps->id }}">{{$user_gps->Contractor_Name}}</a></td>

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


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

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

fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
	$.fn.editable.defaults.send = "always";

    $.fn.editable.defaults.mode = 'inline';
     $('.testEdit').editable({
     	validate: function(value) {

     	name=$(this).editable().data('name');
        if(name=="Contractor_Name")
        {
                if($.trim(value) == '') {
                    return 'Value is required.';
                  }
        

      var regexp = /^[a-zA-Z\u0600-\u06FF,-][\sa-zA-Z\u0600-\u06FF,-]+ {1}[a-zA-Z\u0600-\u06FF,-][\sa-zA-Z\u0600-\u06FF,-]/;          
        if (!regexp.test(value)) {
            return 'This field is not valid';
        }
        
        
        }

     	},

    placement: 'right',
    url:'{{URL::to("/")}}/Gpsupdate',
  
     ajaxOptions: {
     type: 'get',
    sourceCache: 'false',
     dataType: 'json'

   },

       params: function(params) {
            // add additional params from data-attributes of trigger element
            params.name = $(this).editable().data('name');

            // console.log(params);
            return params;
        },
           error: function(response, newValue) {
            if(response.status === 500) {
                return 'This Data Already Exist,Enter Correct Data.';
            } else {
                return response.responseText;
            }
        }
});
}
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



</div>
</div>
</section>
@stop