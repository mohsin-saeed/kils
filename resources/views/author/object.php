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


        <form  method="post" action='save_page_path' enctype="multipart/form-data">
        <div><input type="text" name="book_name" placeholder="enter book name"></div>


        <div style=" margin-top: 3%"><input type="text" name="page_no" placeholder="page no"></div>

        <div style=" margin-top: 3%"><input ty pe="file" name="filename"  accept="image/gif, image/jpeg, image/png,image/jpg" ></div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div style="margin-top: 5%">

                   <span > <input type="submit" value="Cancel" > </span>

                   <span id="input-login-button"> <input type="submit" value="submit"> </span>
        </div>
        </form>

    </div>
</div>

</body>

</html>