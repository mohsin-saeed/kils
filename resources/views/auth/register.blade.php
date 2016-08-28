<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    {{--
        <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    --}}
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
<body>


<div id="body">


    <div style="padding-left: 5%;border: solid 1px; width: 10%;margin-left: 35%;
                                                                   padding-right: 8%;">  Admin window</div>
    <div class="container">
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
        <div class="row">
            <form method="POST" action="{{url('auth/register')}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">

                <div class="form-group">
                    Name
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    Email
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    Password
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="form-group">
                    Confirm Password
                    <input type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!--{!! Form::open(array('url' => 'foo/bar', 'method' => 'put')) !!}

        <input class="field" name="first_name" type="text" value="Chuck" style="background-color: #0000C2">
     {!! Form::close() !!}*/
!-->
</body>

</html>
