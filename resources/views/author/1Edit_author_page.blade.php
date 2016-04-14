<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>


<div id="body">


</div>

    <div style="padding-left: 3%;border: solid 1px;width: 12%;margin-left: 35%;padding-right: 8%;">
        Student Creation Window
        </div>
    <div id="main-input-div">

        <form  method="post" action="<?php echo url();?>/update_author_record/<?php echo $data[0]->id?>">

        <div>


        </div>
        <div style="margin-top: 5px">
                     <input type="text" name="name" value="<?php echo $data[0]->name ?>" placeholder="Roll No">
                </div>

        <div style="margin-top: 5px">
             <input type="text" name="roll_no" value="<?php echo $data[0]->user_id ?>" placeholder="user ID">
        </div>

        <div style="margin-top: 5px">
                     <input type="text" name="password" value="<?php echo $data[0]->password ?>" placeholder="Roll No">
                </div>
        <div id="input-submit-main" >

                   <span > <input type="submit" value="Cancel" > </span>

                   <span id="input-login-button"> <input type="submit" value="Ok"> </span>
        </div>

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>

    </div>
</div>

</body>

</html>