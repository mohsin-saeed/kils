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


  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{asset('css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('css/icheck/flat/green.css')}}" rel="stylesheet">


  <script src="{{asset('js/jquery.min.js')}}"></script>

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
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
          <form  method="post" action='{{url('auth/login')}}'>
            <h1><i>KILS Login </i></h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" name="email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" name="password" required="" />
            </div>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div>

            <div id="gender" class="btn-group" data-toggle="buttons" >
            <label class="btn btn-default role " >
              <input type="radio" name="rolechoice" value="admin"  /> Admin
            </label>
            <label class="btn btn-default role " >
              <input type="radio" name="rolechoice" value="author" required/> &nbsp; Author &nbsp;
            </label>

          </div>

            <input type="submit" class="btn btn-default submit" value="Log In">
             {{-- <a class="btn btn-default submit" href="index.html">Log in</a>--}}
              {{--<a class="reset_pass" href="#">Lost your password?</a>--}}
            </div>
            </form>
           <?php  echo $value = Session::get('aa');?>

            <div class="clearfix"></div>

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
