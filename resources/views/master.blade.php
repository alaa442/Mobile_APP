<!DOCTYPE html>
<?php
header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gps System</title>
    <html xmlns="http://www.w3.org/1999/xhtml" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>




<script src="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css" />

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/dt/jq-2.2.0,dt-1.10.11/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>


<link rel="stylesheet prefetch" href="http://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css"/>


<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript"src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.jqueryui.min.js"></script>
<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript"src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.jqueryui.min.css">

 <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-horizon.css"> 
<script src="/assets/js/jQuery.extendext.js"></script>
<script src="/assets/js/doT.min.js"></script>
<script src="/assets/js/query-builder.min.js"></script>

<link rel="stylesheet" type="text/css" href="/assets/css/query-builder.default.min.css">
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">



</head>

<body>


<nav class="navbar navbar-inverse" style=" background-color: #16174f;">
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"> <img src="/assets/img/icon1.png" width="10%" height="100%" style="float:left;">
        Gps System </a>
    
      
    </div>
 <div class="collapse navbar-collapse" id="myNavbar">
  
      <ul class="nav navbar-nav">
    
          <li><a href="/users">Users</a></li>

      
<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Panel
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
           <li><a class="side_menu" href="/adminpanel">Home</a></li>  

           <li><a class="side_menu" href="/map/show">Show Map</a></li>  
        </ul>
      </li>





           
          <li><a href="/reports">Reports</a></li>
         
         
        
    </ul>

<ul class="nav navbar-nav navbar-right">  
  <li id="noti_Container">
                <div id="noti_Counter"></div>   <!--SHOW NOTIFICATIONS COUNT.-->
                
                <!--A CIRCLE LIKE BUTTON TO DISPLAY NOTIFICATION DROPDOWN.-->
                <div id="noti_Button"><a  id="bell" class="fa fa-bell-o"></a></div>    

                <div id="notifications" >
                    <h3>Notifications</h3>
                    <div style="height:auto;" id="pnotifications">
                   
                    </div>
                    <div class="seeAll"><a href="#">No Notifications Else</a></div>
                </div>
            </li>  


      <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

      </ul>
   

  </div>
  </div>
</nav>

<div class="modal fade"  id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header" style="background-color:#425B90;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 id="myModalLabel"  style="color:#fff;">Modal header</h4>
    </div>
    <div class="modal-body" id="modalbode">
        <p>One fine body…</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
    </div>
     </div>
      </div>
</div>
      <div class="container-fluid">
        <main>
          @yield('content')
        </main>
      </div>


  </div>
<script type="text/javascript">

 $(document).ready(function() {


setInterval( function()
 {

       $.getJSON("../latest", function(data) {

       $count=Object.keys(data).length;

       $('#noti_Counter')
            .css({ opacity: 0 })
            .text($count)              // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
            .css({ top: '-10px' })
            .animate({ top: '-2px', opacity: 1 }, 500);

      

      $("#pnotifications").empty();

     var $notifications =$("#pnotifications");
   
     
     for (var i = 0; i < $count; i++) {
 

                
       $.each(data[i], function(index, value) {
       
        $notifications.append('<div class="item">'
       +' <span class="badge badge-important">'+index+'</span><a> Pormoter  '+value+'  want cement </a>'
       +'<span class="close" data-dismiss="alert" aria-label="Close" id="' + value +'" aria-hidden="true">&times;</span>'
 
       +'</div>');

         });
     }
      });

},5000);

 $('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#bell').css('color', '#2E467C');
                }
                else $('#bell').css('color', '#fff');        // CHANGE BACKGROUND COLOR OF THE BUTTON.
            });

                         // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();


            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                $('#bell').css('color', '#2E467C');
            }
        });

        $('#notifications').click(function () {
            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        });

   

        $("#notifications ").on("click",'span',function(event)
 {

      $id=event.target.id; 
      console.log($id);
     event.preventDefault();
     $(this).parent().remove();

        
  
  

 $.getJSON("../updatelatest/"+$id, function(data) {
  console.log(data);

      $count=Object.keys(data).length;

      console.log($count); 

           $("#myModalLabel").empty();


          $("#modalbode").empty();


       $name='';

       for (var i = 0; i < $count; i++) 
       {


  
      
 
        $name=data[i]['Name'];
          
        $("#modalbode").append('<div class="item ">'
        +'<span>Contractor Code '+data[i]['ContractorCode']+'  Want Cement In Date '+data[i]['Date']+'</span>'
        +'</div>');


   

     }

        $("#myModalLabel").append('Pormoter '+$name);

      $('#myModal').modal('show');
             





});

 });


//end
});

</script>

</body>

</html>