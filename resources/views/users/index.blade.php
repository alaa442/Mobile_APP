@extends('master')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
@section('content')


<section class="panel panel-primary">
<div class="panel-body">

  <h1><i class='fa fa-users'></i> Users </h1>
  <a href="/users/create" class="btn btn-primary" style="margin-bottom: 20px;"> Add New user </a>


<table class="table table-hover table-bordered  dt-responsive nowrap display users" cellspacing="0" width="100%">
  <thead>
              <th>No</th>
                <th>Name</th>
                     <th>Username</th>
                           <th>Email</th>
                            <th>Role</th>
                <th>Process</th>
               
          
           
              
             
             
               
  </thead>
    <tfoot>
        
                  <th></th>
                <th>Name</th>
                     <th>Username</th>
                           <th>Email</th>
                            <th>Role</th>
            
                  </tfoot>
               

<tbody>
  <?php $i=1;?>
  @foreach($users as $user)
    <tr>
    
     <td>{{$i++}}</td>
         <td><a  class="testEdit" data-type="text" data-name="name" data-pk="{{ $user->id }}">{{$user->name}}</a></td>
         <td ><a  class="testEdit" data-type="text" data-name="username"  data-pk="{{ $user->id }}">{{$user->username}}</a></td>
         <td ><a  class="testEdit" data-type="email" data-name="email"  data-pk="{{ $user->id }}">{{$user->email}}</a></td>
         <td ><a  class="testEdit" data-type="select"  data-value="{{$user->role}}"data-source ="[{'value':'admin', 'text': 'admin'}, {'value':'user', 'text': 'user'}]" data-name="role"  data-pk="{{ $user->id }}">{{$user->role}}</a></td>




    
             <td>
   
       <a href="/users/destroy/{{$user->id}}"class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-trash"></span>  </a>


  </td>
   </tr>
     @endforeach
</tbody>
</table>
</div>
    
    </section>
  


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


  <script type="text/javascript">

var editor;

  $(document).ready(function(){
     var table= $('.users').DataTable({
  
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
        if(name=="name"||name=="username"||name=="email"||name=="role")
        {
                if($.trim(value) == '') {
                    return 'Value is required.';
                  }
                    }
        if(name=="name"||name=="username")
        {

      var regexp = /^[a-zA-Z\u0600-\u06FF,-][\sa-zA-Z\u0600-\u06FF,-]+ {1}[a-zA-Z\u0600-\u06FF,-][\sa-zA-Z\u0600-\u06FF,-]/;            if (!regexp.test(value)) {
            return 'This field is not valid';
        }
        
        }
        },

    placement: 'right',
    url:'{{URL::to("/")}}/fupdate',
  
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

 



   $('.users tfoot th').each(function () {



      var title = $('.users thead th').eq($(this).index()).text();
               
 if($(this).index()>=1 && $(this).index()<=5)
        {

           $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
}
        

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
@stop
