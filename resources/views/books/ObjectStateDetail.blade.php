@extends('layouts.author')
@section('content')

<?php $screen_width = 800 ; $screen_height = 450 ?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/custom.css">
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.js"> </script>
    <script type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap">
    <title>jQuery UI Draggable - Constrain movement</title>
    <script src="{{url("js/jquery-ui.js")}}"></script>
    <script src="{{url("js/move.min.js")}}"></script>
    <link href="{{url("css/jquery-ui.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
    </style>

</head>

<?php

use App\categories;
use App\books;
use App\pages;
use App\objects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\View;

?>
<!--Middle Content-->
<div>


    <div style="width: 65%;float: left">
                <!--32-->
<?php //print_r($data['page'])?>
                                        <div class="imgdiv" style="width: 800px; height: 450px">
                    <img src="http://localhost/project/public/storage/public/pages/<?php echo $data['page']->bg?>" width="100%" height="100%">
                                     <div class="img " style="top: 0px;">
                                         <img id="obj_9" class="obj-dragable obj-img-wrapper aa ui-draggable ui-draggable-handle" src="http://localhost/project/public/storage/public/objects/<?php echo $data['0']->bg?>" style="height: 100%; width: 100%; top: 0px; position: relative;">
                                     </div>
                </div>

        <div id="dive">

        </div>
    </div>
    <div class="x_panel3">
    <?php

        $selection = $data[0]->action;
        $actionOptionsArr = array();
        $actionOptionsArr["Move"] = "Move";
        $actionOptionsArr["Rotate"] = "Rotate";
        $actionOptionsArr["Skew"] = "Skew";
        $actionOptionsArr["Resize"] = "Resize";


    ?>

          <h2 style="background: #1ABB9C;padding-top: 2%;padding-bottom: 2%;border-radius: 5px;padding-left: 29%;color: white;">Applied Animation </h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a></li>
            <li><a href="#">Settings 2</a></li>
            </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>

     <form name="changes" id="test" action="<?php echo url();?>/SaveObjectStateDetailChange"method="POST" enctype="multipart/form-data">
         <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <input type="hidden" value="<?php echo $data[0]->Id?>"name="id">
         <select class="btn3 btn-success dropdown-toggle action" style="width: 49%;padding: 1%;margin-left: 1%;" id="disableid" name="action">

            <option>Select Action</option>

            <?php foreach($actionOptionsArr as $option){

                $selected = "";
                if($option == $selection){
                    $selected = 'selected="selected"';
                }
                 ?>

                <option value="<?php echo $option?>" <?php echo $selected?>><?php echo $option?></option>
            <?php } ?>

          </select>
          <div class="x_content">
              <span btn3 btn-success style="margin-left: 4%">X:axis</span>
              <span style="margin-left: 11%"><input type="number" class="btn3 btn-success" type="button" style="width: 20%" name="x" value="<?php echo $data[0]->x?>"></span>

          </div>
          <div class="x_content">
          <span>
              <span btn3 btn-success style="margin-left: 4%">Y:axis</span>
              <span style="margin-left: 11%"><input type="number" class="btn3 btn-success" type="button" style="width: 20%" name="y" value="<?php echo $data[0]->y?>"></span>
          </span>

      </div>

        <div class="x_content">
            <span class="btn btn-defaultt">Delay:</span>
            <span><input class="btn3 btn-success" type="number" value="<?php echo$data[0]->delay?>" step=".5" id="delay" style="width: 20%;margin-left: 5%;" name="delay"/></span>
        </div>
        <div class="x_content">
            <span class="btn btn-defaultt">Duration:</span>
            <span><input class="btn3 btn-success" type="number" value="<?php echo $data[0]->duration?>" step=".5" id="duration" style="width: 20%" name="duration"/></span>

        </div>

        <input type="file" class="btn3 btn-success bg" style="width: 55%" id="disableid" name="filename" >

       {{--<form method="post"  enctype="multipart/form-data" id="object-state" >
           --}}{{--<input type='file' id='files' name='files' multiple='multiple' />--}}{{--
       <div class="x_content2">
                <div style="float: left">
                    <input type="file" class="btn3 btn-success bg"  style="width: 100%" id="disableid" name="logo">
                </div>

     <input type="hidden" class="selected_obj" name="selected_obj"/>
           </div>
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" class="btn btn-success2 fa fa-save savestate" style="position: relative ;margin-left: 25%;font-size:120%;margin-top: 10%" id="disableid" value="Save State"/>

       </form>
--}}
        <input type="submit" class="btn btn-success2 fa fa-save deletestate" style="position: relative ;margin-left: 25%;font-size:120%;margin-top: 10%" id="disableid" value="Save changes"/>
        </form>
</div>


    <div style="clear: both"></div>
</div>

</div>


@endsection