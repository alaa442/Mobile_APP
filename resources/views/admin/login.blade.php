
@extends('welcome')

@section('content')

   <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
<!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->

<div class="container">
    <div class="row vertical-offset-100">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default" style=" border-color: #8B0000;   background-color: darkred;
">
          <div class="panel-heading" style=" background-color: darkred;">
            <h3 class="panel-title" style="text-align:center;color:#fff;
">Please sign in</h3>
        </div>
          <div class="panel-body" style="background-color: darkred;">
            <form accept-charset="UTF-8" role="form" action="{{ url('/login') }}" method="post">
                    {!! csrf_field() !!}
                    <fieldset>
                <div class="form-group">
                 
                  <input class="form-control" placeholder="username" name="username" type="text">
                         <p class="errors">{{$errors->first('username')}}</p>

              </div>
              <div class="form-group" >
               
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              <p class="errors">{{$errors->first('Password')}}</p>
              </div>
              
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
            </fieldset>
             @if(Session::has('error'))
             <br>
          <div class="alert alert-danger" style="text-align:center;" >
                  <strong>Whoops!</strong> There is something wrong<br><br>

    
    </div>
    @endif
              </form>
          </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $(document).mousemove(function(e){
     TweenLite.to($('body'), 
        .5, 
        { css: 
            {
                backgroundPosition: ""+ parseInt(event.pageX/8) + "px "+parseInt(event.pageY/'12')+"px, "+parseInt(event.pageX/'15')+"px "+parseInt(event.pageY/'15')+"px, "+parseInt(event.pageX/'30')+"px "+parseInt(event.pageY/'30')+"px"
            }
        });
  });
});


</script>





@endsection