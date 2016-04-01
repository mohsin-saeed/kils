<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>


<div id="body">


    <div style="padding-left: 5%;border: solid 1px; width: 10%;margin-left: 35%;
                                                                   padding-right: 8%;">  Admin window</div>
    <div id="main-input-div">


        <form  method="post" action='Add_category'>
        <div>
                <input type="text" name="category_name" placeholder="enter user category_name">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               </div>

        <div style="margin-top: 5%" >

                   <span > <input type="submit" value="Cancel" > </span>

                   <span id="input-login-button"> <input type="submit" value="Add page"> </span>
        </div>
        </form>

    </div>
</div>

</body>

</html>