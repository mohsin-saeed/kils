<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>


<div id="body">


    <div style="padding-left: 3%;border: solid 1px;width: 12%;margin-left: 35%;padding-right: 8%;">
        Author log In Window
        </div>
    <div id="main-input-div">


        <form  method="post" action='author_login_authentication'>

        <div>
                <input type="text" name="username" placeholder="userName">
        </div>



        <div id="input-password">
                <input type="password" name="password" placeholder="password">
       </div>

        <div id="input-submit-main" >

                   <span > <input type="submit" value="Cancel" > </span>

                   <span id="input-login-button"> <input type="submit" value="log in"> </span>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>

    </div>
</div>

<!--{!! Form::open(array('url' => 'foo/bar', 'method' => 'put')) !!}

   <input class="field" name="first_name" type="text" value="Chuck" style="background-color: #0000C2">
{!! Form::close() !!}*/
!-->
</body>

</html>