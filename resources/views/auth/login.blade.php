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

<?php $login_img="http://localhost/project/public/storage/public/images/login_img.png"?>



  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
            @if (count($errors) > 0)
                <div class="error-msg-default" style="">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                  @if(Session::has('error'))
                  <p class="alert alert-info">{{ Session::get('error') }}</p>
                  @endif


          <form  method="post" action='{{url('auth/login')}}'>
            <h1><i>KIBG Login </i></h1>
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
              <input type="radio" name="user_typ" value="admin" required="enter role choche"> Admin
            </label>
            <label class="btn btn-default role " >
              <input type="radio" name="user_typ" value="author" required="enter role choche" /> &nbsp; Author &nbsp;
            </label>

            </div>

             <input type="submit" class="btn btn-default submit" value="Log In">
            </div>
          </form>

          <div style="float: left;margin-top: 10%;border-top: solid 0.5px;width: 80%;margin-left: 12%;border-radius: 2% ">
            <div  style="margin-top: 7%">

                <span style="font-size: 15px;float: left;margin-left: 33%">

                </span>

                 <span style="float: right">
                      <a href="<?php echo url('user/forgetpssword') ?>">forget password</a>
                      </p>
                 </span>

            </div>
          </div>



          <!-- form -->
        </section>
        <!-- content -->
      </div>

      <div id="register" class="animate form">

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

       <section class="login_content">

           <h1>Create Account</h1>
           <form method="POST" action="{{url('auth/register')}}">
           <input type="hidden" name="_token" value="{{csrf_token()}}">
           <div>
              Name
             <input type="text" name="name" class="form-control" value="{{ old('name') }}">
           </div>
           <div>
              Email
             <input type="email" class="form-control" name="email" value="{{ old('email') }}">
           </div>
           <div>
              Password
             <input type="password" class="form-control" name="password">
           </div>
           <div>
              Confirm Password
              <input type="password" class="form-control" name="password_confirmation">
           </div>
           <div>
             <button type="submit" class="btn btn-default submit">Register</button>
           </div>
           <div class="clearfix"></div>
           <div class="separator">

             <p class="change_link">Already a member ?
              <a href="<?php echo url()?>" class="to_register"> Log in </a>
             </p>
             <div class="clearfix"></div>
             <br>

           </div>
         </form>
         <!-- form -->
       </section>
                   <!-- content -->
                 </div>

    </div>
  </div>


  <div style="float: left">
       <div >
         <img src="<?php echo$login_img?>"style="width: 200px;height: 250px;margin-top: 20%;margin-left: 122%;border-radius: 20px;border: solid 3px">
      </div>

   </div>

  <div style="float: left;margin-top: 20%;margin-left: 4%">
      <div class="separator">

        <p class="change_link">New to site?
          <a href="#toregister" class="to_register"> Create Account </a>
        </p>
        <div class="clearfix"></div>
        <br>

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
