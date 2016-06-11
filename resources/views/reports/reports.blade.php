 
@extends('master')
<?php
  header("Cache-Control: no-store, must-revalidate, max-age=0");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
@section('content')

<div class="container">
  <div class="row" >

    <div class="Absolute-Center is-Responsive"  >
      <legend>Create Report </legend>

      <div class="col-sm-12 col-md-10 col-md-offset-1"  >
          {!! Form::open(['action'=>'AdminController@reports','method'=>'post']) !!}
          <div class="form-group input-group">
            <span class="input-group-addon">Title</span>
    <input type="text" name="Title" class="form-control" id="inputName" placeholder="Enter Title" >{!!$errors->first('Title','<small class="label label-danger">:message</small>')!!}</td>
          </div>

          <div class="form-group input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
              {!!Form::select('users[]', (['all' => 'all'] + $users->toArray()) ,null,['class'=>'form-control Users chosen-select ','id' => 'prettify','multiple' => true])!!} 
              {!!$errors->first('users','<small class="label label-danger">:message</small>')!!}
          </div>


          <div class="form-group input-group">
            <label> 
             From Date
            </label>


             <div class='input-group date' id='datepicker'> 
             <input type='text'name="Start_Date" class="form-control" data-format="dd-MM-yyyy" placeholder="Enter Start Date"/>
                <span class="input-group-addon" id="Start_Date">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
              {!!$errors->first('Start_Date','<small class="label label-danger">:message</small>')!!}
          </div>



<div class="form-group input-group">
            <label> 
              TO Date
            </label>


             <div class='input-group date' id='datepicker2'> 
         <input type='text' name="End_Date" class="form-control" id="End_Date" placeholder="Enter Start Date"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
      {!!$errors->first('End_Date','<small class="label label-danger">:message</small>')!!}


</div>

         <div class="form-group text-center">
    <button type="submit" class="btn btn-primary">Done</button>
  </div>
  {!!Form::close()!!}
          
      </div>  
    </div>    
  </div>
</div>


<script type="text/javascript">
$(function(){

      $( "#datepicker" ).datepicker(
        );
       

      $("#datepicker2" ).datepicker(
        );

  $(".Users").chosen({ 
                   width: '100%',
                   no_results_text: "لا توجد نتيجه",
                   allow_single_deselect: true, 
                   search_contains:true, });
 $(".Users").trigger("chosen:updated");


        $("#datepicker").on("dp.change", function (e) {
       
            $('#datepicker').data("DateTimePicker").minDate(e.date);


        });
      

   $("#datepicker2").on("dp.change", function (e) {

            $('#datepicker2').data("DateTimePicker").minDate(e.date);

        });


  
});
</script>
  @stop









