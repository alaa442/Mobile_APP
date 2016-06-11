@extends('master')
<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
@section('content')

<div class="container">
  <div class="row">
    <div class="Absolute-Center is-Responsive">
            <legend>Create User</legend>

      <div></div>
      <div class="col-sm-12 col-md-10 col-md-offset-1">
   {!!Form::open(['route' => 'users.store','method' => 'post'])!!}
          <div class="form-group input-group">

            <span class="input-group-addon" data-container="body" data-toggle="popover" data-placement="left" data-content="Enter Name"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" placeholder="Name" class="form-control"  name="Name" >{!!$errors->first('Name','<small class="label label-danger">:message</small>')!!}          
          </div>
          <div class="form-group input-group">
                     <span class="input-group-addon" data-container="body" data-toggle="popover" data-placement="left" data-content="Enter Username"><i  class="glyphicon glyphicon-plus "
></i></span>
           <input type="text" placeholder="Username" class="form-control"  name="Username">  {!!$errors->first('Username','<small class="label label-danger">:message</small>')!!}  
 
          </div>
           <div class="form-group input-group">
            <span class="input-group-addon"  data-container="body" data-toggle="popover" data-placement="left" data-content="Enter Email"><i class="glyphicon glyphicon-envelope "></i></span>
         <input type="email" placeholder="Email" class="form-control"   name=" Email" >{!!$errors->first('Email','<small class="label label-danger">:message</small>')!!}
 
          </div>
           <div class="form-group input-group">
            <span class="input-group-addon"  data-container="body" data-toggle="popover" data-placement="left" data-content="Enter Password"><i class="glyphicon glyphicon-lock" ></i></span>
          <input type="password" placeholder="Password"  class="form-control" name=" Password"> {!!$errors->first('Password','<small class="label label-danger">:message</small>')!!} 
   
 
          </div>
           <div class="form-group input-group">
          <span class="input-group-addon"  data-container="body" data-toggle="popover" data-placement="left" data-content="Chosse Role"><i class="glyphicon glyphicon-tasks"
 ></i></span>
       
   
 {!!Form::select('Role',
 array( 
 '0' => 'Chosse Role',
 'admin' => 'admin',
  'user' => 'user',

  
  ),null,['id' => 'prettify','class'=>'chosen-select Role form-control']);!!}  {!!$errors->first('role','<small class="label label-danger">:message</small>')!!}
          </div>
          
          </div>
          <div class="form-group  text-center">
            <a href="/users" class="btn btn-default btn-sm " style="    float: left;"><span class="glyphicon glyphicon-chevron-left"></span></a><td>
           <button type="submit" value="save" class="btn btn-info btn-sm " style="    float: right;" >
           <span class="glyphicon glyphicon-save"> Save
            </span>
             </button>
          
          </div>
          <div class="form-group text-center">
          </div>
{!!Form::close() !!}
      </div>  
    </div>    
  </div>
</div>

<script type="text/javascript">
$(function(){


  $(".Role").chosen({ 
                   width: '100%',
                   no_results_text: "No Results",
                   allow_single_deselect: true, 
                   search_contains:true, });
 $(".Role").trigger("chosen:updated");

    $('[data-toggle="popover"]').popover({ trigger: "hover" }); 


  
});
</script>
@stop