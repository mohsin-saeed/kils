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


        <form  method="get" action='add_book'>
        <div><input type="text" name="title" placeholder="enter book title"></div>


        <div style=" margin-top: 3%"><input type="text" name="category_name" placeholder="category id"></div>

        <div style=" margin-top: 3%"><textarea name="description"  cols="30" rows="10" placeholder="enter descriptipn"> descrption </textarea></div>

        <div style="margin-top: 5%">

                   <span > <input type="submit" value="Cancel" > </span>

                   <span id="input-login-button"> <input type="submit" value="submit"> </span>
        </div>
        </form>

    </div>
</div>

</body>

</html>