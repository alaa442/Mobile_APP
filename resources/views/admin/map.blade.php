@extends('master')
<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>

<style type="text/css">
  .chosen-container .chosen-drop {
    border-bottom: 0;
    border-top: 1px solid #aaa;
    top: auto;
    bottom: 40px;
}

</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAseM6BSo3boMXaJI82mMJMu8CThR9PEbw&libraries=drawing"></script>

<script type="text/javascript">  
  window.onload = function() {
    ajaxCall();
  };
</script>

@section('content')
<section class="panel panel-primary">
<div class="panel-body">
<div id="map" style=" width: 100%; height: 70%;"></div>


<script type="text/javascript"> 
var timer;
var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: new google.maps.LatLng(28.000, 32.444),
              mapTypeId: google.maps.MapTypeId.ROADMAP

          });
var markerArr = new Array();
function clearOverlays() {
    if (markerArr) {
      for (i in markerArr) {
        markerArr[i].setVisible(false)
        
      }
    console.log("clear");
    }
}

function RefreshMap() {
  console.log('RefreshMap');
  map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: new google.maps.LatLng(28.000, 32.444),
              mapTypeId: google.maps.MapTypeId.ROADMAP

          });
ajaxCall();
}

function ajaxCall() {
  var marker,i;
   $.ajax({
        type: "GET",
        url : '{{ url("/map") }}',
        success: function(response) {
          var jArray = JSON.parse(response);
          var infowindow = new google.maps.InfoWindow();
          console.log(jArray.locations.length);
          for (i = 0; i < jArray.locations.length; i++) { 
              if (jArray.locations[i].Status == 0) {
                  marker = new google.maps.Marker({
                      position: new google.maps.LatLng(jArray.locations[i].Lat, jArray.locations[i].Long),
                      map: map
                  });

              }

              else if (jArray.locations[i].Status == 1){
                 marker = new google.maps.Marker({
                         position: new google.maps.LatLng(jArray.locations[i].Lat, jArray.locations[i].Long),
                        map: map,
                       icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                    });
              }
        var geocoder = new google.maps.Geocoder();
        var latitude = jArray.locations[i].Lat;
        var longitude = jArray.locations[i].Long;
        var address_arr = new Array();
        var latLng = new google.maps.LatLng(latitude,longitude);
        geocoder.geocode({       
            latLng: latLng     
          }, 
        function(responses) 
            {     
              if (responses && responses.length > 0) {    
                  address_arr.push(responses[0].formatted_address); 
              } 
              else{     
                  address_arr[i] = 'Not getting address for given latitude and longitude';  
              }   
            }
        );
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {           
            infowindow.setContent('Name '+jArray.locations[i].user_id+'<br/> Address '+address_arr[i] +' <br/> Contractor Name '+ jArray.locations[i].Contractor_Name+'<br/>Code '+jArray.locations[i].Contractor_Code);
            infowindow.open(map, marker);
          }
        })(marker, i));

    markerArr[i]=marker;
    }
  }}).always(function() {
      setTimeout(clearOverlays, 9999); // 9.99 seconds
      timer=setTimeout(ajaxCall, 10000); // 10 seconds
   });
}

var name = "empty";
var date = "empty";

function FilterValue() {
  map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: new google.maps.LatLng(28.000, 32.444),
              mapTypeId: google.maps.MapTypeId.ROADMAP

          });
  console.log('FilterValue');
  window.clearTimeout(timer);
  var selectedIndex = document.getElementById('username').selectedIndex;
  if (document.getElementById('username')[selectedIndex].value) {
      name = document.getElementById('username')[selectedIndex].value;
  }
  if (document.getElementById('date').value) {
      date = document.getElementById('date').value;
      var date=date.split('/');
      var date =date[2]+'-'+date[0]+'-'+date[1];
  }
  if (document.getElementById('date').value ==="") {
      date = "empty";
  }  
  var marker,i;
  $.ajax({
        type: "GET",
        url : '/gps/filter/name/'+name+'/date/'+date,
        success: function(response) {
          var jArray = JSON.parse(response);
          var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 6,
              center: new google.maps.LatLng(28.000, 32.444),
              mapTypeId: google.maps.MapTypeId.ROADMAP

          });
          var infowindow = new google.maps.InfoWindow();
          for (i = 0; i < jArray.locations.length; i++) {
              if (jArray.locations[i].Status == 0) {
                  marker = new google.maps.Marker({
                      position: new google.maps.LatLng(jArray.locations[i].Lat, jArray.locations[i].Long),
                      map: map
                  });
              }
              else if (jArray.locations[i].Status == 1){
                 marker = new google.maps.Marker({
                         position: new google.maps.LatLng(jArray.locations[i].Lat, jArray.locations[i].Long),
                        map: map,
                       icon: 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
                    });
              }
            var geocoder = new google.maps.Geocoder();
            var latitude = jArray.locations[i].Lat;
            var longitude = jArray.locations[i].Long;
            var address_arr = new Array();
            var latLng = new google.maps.LatLng(latitude,longitude);
            geocoder.geocode({       
                latLng: latLng     
              }, 
            function(responses) 
                {     
                  if (responses && responses.length > 0) {    
                      address_arr.push(responses[0].formatted_address); 
                  } 
                  else{     
                      address_arr[i] = 'Not getting address for given latitude and longitude';  
                  }   
                }
            );
       google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {           
            infowindow.setContent('Name '+jArray.locations[i].user_id+'<br/> Address '+address_arr[i] +' <br/> Contractor Name '+ jArray.locations[i].Contractor_Name+'<br/>Code '+jArray.locations[i].Contractor_Code);
            infowindow.open(map, marker);
          }
        })(marker, i));

          }

        } });
  }
</script>

<form  class="form-horizontal">

  <div class="control-group" style="margin-top: 10px">
   

   <div class="controls form-inline">
            <label> 
                      Date
            </label>

  <div class='input-group date col-md-3'  id='datepicker'> 
              <input type='text'name="date"  class="input-small form-control" id="date" placeholder="Enter Date"/>
                <span class="input-group-addon" id="date">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
   </div>
      
             <div class="input-group col-md-3" style="margin-left: 3%;text-align: center;">
            <span class="input-group-addon" style="width:10%"><i class="glyphicon glyphicon-list-alt"></i></span>
   
              {!!Form::select('username[]', (['empty' => 'Please Select'] + $users->toArray()) ,null,['class'=>'form-control  input-small  Users chosen-select ','id' => 'username'])!!} 
         
        </div>


      <div class="input-group date col-md-3" style="text-align: center;" >
           <a href="javascript:FilterValue()" class="btn btn-labeled  btn-primary">
            <span class="btn-label"><i class="glyphicon glyphicon-filter"></i></span> Filter</a>
     </div>

      <div  class="input-group date col-md-2">
           <a href="javascript:RefreshMap()" class="btn  btn-labeled  btn-primary">      
           <span class="btn-label"><i class="glyphicon glyphicon-refresh"></i></span> Full Map</a>
      </div>
      </div> 
  </div> 
</form>

</div>
<script type="text/javascript">
$(function(){

      $( "#datepicker" ).datepicker(
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
      



  
});
</script>


</section>
@stop
