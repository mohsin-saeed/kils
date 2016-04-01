<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>


<div id="body" style="overflow: auto">

    <div style="margin-left: 10%;border: solid 1px;width: 80%;margin-right:10%;background-color: #2ca02c">
     <span style="margin-right: 20%;padding-left: 3%">id</span>
     <span style="margin-right: 20%">Name</span>
     <span style="margin-right: 20%">username</span>
     <span style="margin-right: 20%">Roll No</span>

    </div>

   <?php foreach ($data as $data)
    {
         ?>
         <span>

         <?php

          echo($data->id."  ");

         ?></span><?php

          echo($data->name." ");
          echo "  ";
          //var_dump($data->username);
          echo "  ";
          echo($data->user_id." ");
          ?>

          <a href="get_student_record/<?php echo($data->id);?>">Edit</a>
          <a href="delete_student/<?php echo($data->id);?>">Delete</a>

          <br/>

          <?php


     }
    ?>
</div>

</body>

</html>