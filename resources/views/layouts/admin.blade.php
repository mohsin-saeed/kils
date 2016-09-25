<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Kids Interactive Learning System</title>

  <!-- Bootstrap core CSS -->

  <link href="{{url("css/bootstrap.min.css")}}" rel="stylesheet">

  <link href="{{url("fonts/css/font-awesome.min.css")}}" rel="stylesheet">
  <link href="{{url("css/animate.min.css")}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{url("css/custom.css")}}" rel="stylesheet">
  <link href="{{url("css/icheck/flat/green.css")}}" rel="stylesheet">

  <script src="{{url("js/jquery.min.js?")}}></script>

  <!--[if lt IE 9]>
        <script src="{{url("../assets/js/ie8-responsive-file-warning.js")}}"></script>
        <![endif]-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--00000000000[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Kids Interactive Learning System</span></a>
          </div>


          <div class="profile">
                      <div class="profile_pic">
                        <img class="img-circle profile_img" src="http://localhost/kils/public/storage/public/images/login_img.png" alt="">

                      </div>
                      <div class="profile_info">
                        <span>Welcome To Admin,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                      </div>
                    </div>
          <div class="clearfix"></div>


          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a><i class="fa fa-users"></i> Users Management <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">


                    <li><a href="<?php echo url()?>/AuthorsList"> Authors</a></li>
                     <li><a href="<?php echo url()?>/students">Students</a>
                     </li>
                  </ul>
                </li>
                <li><a href="<?php echo url();?>/admin/books"><i class="fa fa-book"></i> Books </a></li>
                <li><a href="<?php echo url();?>/Categories"><i class="fa fa-folder"></i> Categories </a></li>
                <li><a href="<?php echo url();?>/admin/quiz"><i class="fa fa-newspaper-o"></i> Quiz </a></li>
                <li><a href="<?php echo url();?>/admin/question"><i class="fa fa-question-circle"></i> Question </a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->

          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="http://localhost/kils/public/storage/public/images/login_img.png" alt="">{{ Auth::user()->name }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;">  Profile</a>
                  </li>

                  <li><a href="{{url()}}/auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>



            </ul>
          </nav>
        </div>

      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        @yield('content')

      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  <script src="{{url("js/bootstrap.min.js")}}"></script>

  <!-- chart js -->
  <script src="{{url("js/chartjs/chart.min.js")}}"></script>
  <!-- bootstrap progress js -->
  <script src="{{url("js/progressbar/bootstrap-progressbar.min.js")}}"></script>
  <script src="{{url("js/nicescroll/jquery.nicescroll.min.js")}}"></script>
  <!-- icheck -->
  <script src="{{url("js/icheck/icheck.min.js")}}"></script>

  <script src="{{url("js/custom.js")}}"></script>

  <!-- pace -->
  <script src="{{url("js/pace/pace.min.js")}}"></script>


  <script>

  $(document).ready(function(){
        $(".abc").click(function(){ $(".abc").hide()});
  });

  </script>

</body>

</html>
