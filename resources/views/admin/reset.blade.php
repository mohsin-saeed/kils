<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Gentallela Alela! | </title>

  <!-- Bootstrap core CSS -->

  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('fonts/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/icheck/flat/green.css') }}" />




  <!-- Custom styling plus plugins -->



  <script src="js/jquery.min.js"></script>

  <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">





  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">


                   @include('messages.flash')
                                      @if (count($errors) > 0)
                                         <!--  <div class="alert alert-danger">
                                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                              <ul>
                                                  @foreach ($errors->all() as $error)
                                                      <li>{{ $error }}</li>
                                                  @endforeach
                                              </ul>
                                          </div> -->

                                      @endif
                                     @if(session('message'))
                    {{session('message')}}
                  @endif


           <form  method="post" action="<?php echo url()?>/users/reset/<?=$user_data->id?>">
            <h1><i>KILS reset Password</i></h1>


            <input type="hidden" name="_token" value="{{csrf_token()}}">





                 <div class="form-group">

                       <div class="col-md-12">
                              <div class="@if ($errors->has('password')) has-error @endif">
                                    <input type="password" name="password" value="{{Input::old('password')}}" class="form-control input-circle" placeholder="Enter password">
                                    @if ($errors->has('password'))
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                    @endif
                              </div>
                       </div>
                 </div>
                 <div class="form-group">

                                        <div class="col-md-12">
                                               <div class="@if ($errors->has('password_confirmation')) has-error @endif">
                                                     <input type="password" name="password_confirmation" value="{{Input::old('password_confirmation')}}" class="form-control input-circle" placeholder="Enter confirm password">
                                                     @if ($errors->has('password_confirmation'))
                                                     <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                                                     @endif
                                               </div>
                                        </div>
                                  </div>
            <div>




            <input type="submit" class="btn btn-default submit" value="Send mail">

            </div>
                   {!! Form::close() !!}




          <!-- form -->
        </section>
        <!-- content -->
      </div>

    </div>
  </div>


<script>
   $(document).ready(function()
   {
       $('.role').click(function(){
            $('.active1').removeClass("active1")
               var role=$(this).text();
               $(this).removeClass("role");
                //jQuery(this).addClass("btn-success");
                //$(this).removeClass("active");
                $(this).addClass("active1");
           //alert("hi")
       });
   });



</script>

</body>

</html>
