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
    #aa{color: #ff0000}
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
<a href="<?php echo url();?>/preview/<?php echo ($data[0]->page_id);?>" target="_blank"><button type="button" class="button3" >Preview </button> </a>
<a href="<?php echo url();?>/AddObject/<?php echo ($data[0]->page_id);?>" target="_blank"><button type="button" class="button4">Add Object</button> </a>
<div>
     <div style="width: 65%;float: left">
            <!--<?php echo($data[0]->page_id);
            ?>-->

            <?php
                $bg=DB::table('pages')->where('id',$data[0]->page_id)->get() ;
                $pagedir="/storage/public/pages/";
                $objectdir="/storage/public/objects/";

                if($bg){
                    ?>
                        <div class="imgdiv" style="width: {{$screen_width}}px; height: {{$screen_height}}px">
                <img src="<?php echo url().$pagedir.$bg[0]->bg ?>" width="100%" height="100%">
                <?php $objec=DB::table('objects')->where('page_id',$data[0]->page_id)->get();?>
                 <div class="img " style="top: 0px;">
                <?php
                 foreach($objec as $objec)
                   {
                ?>
                     <img id="obj_{{$objec->id}}" class="obj-dragable obj-img-wrapper aa" src="<?php echo url().$objectdir.$objec->object_path; ?>" style="height: 100%;width: 100%;top:0px;" >
                <?php
                   }
                ?>
                 </div>
            </div>
                <?php } ?>

    <div id="dive">

    </div>
</div>

<div class="x_panel3">

          <h2 style="background: #1ABB9C;padding-top: 2%;padding-bottom: 2%;border-radius: 5px;padding-left: 29%;color: white;">Apply Animation </h2>
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

    <div class="x_content" id="edit">
            <select class="btn3 btn-success dropdown-toggle stats-list" style="width: 50%;padding: 1%" id="disableid">
                 <option name="option" class="op">Select State to See/Eit</option>
                  </select>

          </div>


     <select class="btn3 btn-success dropdown-toggle action" style="width: 49%;padding: 1%;margin-left: 1%;" id="disableid">
        <option>Select Action</option>
        <option value="Move">Move</option>
        <option value="Rotate">Rotate</option>
        <option value="Resize">Resize</option>
        <option value="Skew">Skew</option>
      </select>
        <div class="x_content">
        <span btn3 btn-success style="margin-left: 4%">X:axis</span>
        <span style="margin-left: 11%"><input type="button" class="btn3 btn-success" type="button" style="width: 20%" name="x" value="0"></span>

      </div>
      <div class="x_content">
      <span>
      <span btn3 btn-success style="margin-left: 4%">Y:axis</span>
      <span style="margin-left: 11%"><input type="button" class="btn3 btn-success" type="button" style="width: 20%" name="y" value="0"></span>
      </span>

      </div>



        <div class="x_content">
            <span class="btn btn-defaultt">Delay:</span>
            <span><input class="btn3 btn-success" type="number" value="0" step=".5" id="delay" style="width: 20%;margin-left: 5%;" name="delay"/></span>
              </div>
        <div class="x_content">
        <span class="btn btn-defaultt">Duration:</span>
        <span><input class="btn3 btn-success" type="number" value="0" step=".5" id="duration" style="width: 20%" name="duration"/></span>

        </div>

       <form method="post"  enctype="multipart/form-data" id="object-state" >
           {{--<input type='file' id='files' name='files' multiple='multiple' />--}}
       <div class="x_content2">
                <div style="float: left">
                    <input type="file" class="btn3 btn-success bg"  style="width: 100%" id="disableid" name="logo">
                </div>


                {{--<button type="button" class="btn btn-primary" >play</button>
                <button type="button" class="btn btn-success" id="disableid">Success</button>
                <button type="button" class="btn btn-info" id="disableid">Info</button>
                <button type="button" class="btn btn-warning" id="disableid">Warning</button>
       --}}
                 <input type="hidden" class="selected_obj" name="selected_obj"/>
           </div>
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="submit" class="btn btn-success2 fa fa-save savestate" style="position: relative ;margin-left: 25%;font-size:120%;margin-top: 10%" id="disableid" value="Save State"/>

       </form>


        <form method="post"  enctype="multipart/form-data" id="object-state2" >
                   {{--<input type='file' id='files' name='files' multiple='multiple' />--}}
               <div class="x_content2">
                        <div style="float: left">
                            <input type="file" class="btn3 btn-success bg"  style="width: 100%" id="disableid" name="logo">
                        </div>
                         <input type="hidden" class="selected_obj" name="selected_obj"/>
                   </div>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="submit" class="btn btn-success2 fa fa-save editstate" style="position: relative ;margin-left: 25%;font-size:120%;margin-top: 10%" id="disableid" value="Edit State"/>

               </form>

           <input type="submit" class="btn btn-success2 fa fa-save deletestate" style="position: relative ;margin-left: 25%;font-size:120%;margin-top: 10%" id="disableid" value="Delete State"/>


</div>
<script>
$(document).ready(function()
{

    //alert("ready start");
    $('#edit').hide();
    $('.editstate').hide();
    $('.deletestate').hide();

    var screen_width = <?php echo $screen_width; ?>;
    var screen_height = <?php echo $screen_height; ?>;
    var x, y, height, width, action, object_id;

    $('form#object-state').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            action=$('.action option:selected').text();
            formData.append("x", x);
            formData.append("y", y);
            formData.append("width", width);
            formData.append("height", height);
            formData.append("action", action);
            formData.append("delay", delay);
            formData.append("duration", duration);
            formData.append("obj_id", object_id);

            $.ajax({
                url: '<?php echo url();?>/saveState',
                type: 'POST',
                data: formData,
                async: false,
                success: function (data) {
                   // alert(data)
                },
                cache: false,
                contentType: false,
                processData: false
            });

        });

    $( "img.obj-dragable" ).draggable(
            {
            containment: ".imgdiv", scroll: false ,
            stop: function(e)
            {
                  object_id = $(e.target).attr("id").split("_")[1]
                  $(".selected_obj").val(object_id);
                  var xPos = $(e.target).position();
                  height=$(e.target).height();
                  width=$(e.target).width();
                  var y1 = screen_height - (xPos.top + $(e.target).height());
                  x = (xPos.left/screen_width)*100;
                  y = (y1/screen_height)*100;
                  x2 = Math.round(x);
                  y2 = Math.round(y);
                  $('input[name=x]').val(x2);
                  $('input[name=y]').val(y2);
            }
        }
        );

        $("#delay").bind('keyup mouseup', function ()
        {
            delay= $(this).val();
          });

        $("#duration").bind('keyup mouseup', function ()
        {
            duration= $(this).val();
          });


        $('[id="disableid"]').prop('disabled',false);


        $(".img").dblclick(function(e)
        {

            var a;

            $('#edit').show();
            object_id = $(e.target).attr("id").split("_")[1]
            $(".selected_obj").val(object_id);
            alert(object_id);
            $.get('<?php echo url();?>/getObjectStates',{id:object_id},function(data)
            {

            for(i=0;i<data.length;i++)
             {

                 var state_id = '<option value="'+data[i].Id+'">State '+(i+1)+'</option>'
                 $(".stats-list").append(state_id);

             }


            })


        })
        $('.stats-list').change(function()
        {


                       $('.editstate').show();
                       $('.deletestate').show();
                       $('.savestate').hide();
           var state_id=$('.stats-list option:selected').val();
            $.get('<?php echo url();?>/getState',{id:state_id},function(data)
            {


                   var action=data[0].action;
                   var x=data[0].x;
                   var y=data[0].y;
                   var delay=data[0].delay;
                   var duration=data[0].delay;

                   $('.action option[value="'+action+'"]').prop('selected',true);
                   $('input[name=x]').val(x);
                   $('input[name=y]').val(y);
                   $('input[name=delay]').val(delay);
                   $('input[name=duration]').val(duration);
                   var id='#obj_'+data[0].object_id;

                       if(action=="Move")
                       {
                        move(id).translate(x, y).end()
                       }
                       if(action=="Rotate")
                       {
                           alert(action);
                           move(id)
                           .rotate(140)
                           .end();
                       }
                       if(action=="Resize")
                       {
                           alert(action);
                           move(id)
                           .scale(3)
                           .end();
                       }
                       if(action=="Skew")
                       {
                           alert(action);
                           move(id)
                           .x(300)
                           .skew(50)
                           .set('height', 20)
                           .end();
                       }

                   $('').submit(function(e){
                               e.preventDefault();
                               var formData = new FormData($(this)[0]);
                               action=$('.action option:selected').text();
                               formData.append("x", x);
                               formData.append("y", y);
                               formData.append("width", width);
                               formData.append("height", height);
                               formData.append("action", action);
                               formData.append("delay", delay);
                               formData.append("duration", duration);
                               formData.append("obj_id", object_id);

                               $.ajax({
                                   url: '<?php echo url();?>/editState',
                                   type: 'POST',
                                   data: formData,
                                   async: false,
                                   success: function (data) {
                                      // alert(data)
                                   },
                                   cache: false,
                                   contentType: false,
                                   processData: false
                               });

                           });

            })

        })

        $(".deletestate").click(function()
                {


                        var state_id=$('.stats-list option:selected').val();
                        $.get('<?php echo url();?>/getState',{id:state_id},function(data)
                            {
                                $.get('<?php echo url();?>/deleteState',{id:state_id},function(data){})
                            })

                }
                )
        $('form#object-state2').submit(function(e)
        {
            var state_id=$('.stats-list option:selected').val();
            e.preventDefault();
            var xPos = $(e.target).position();
            height=$(e.target).height();
            width=$(e.target).width();
            var y1 = screen_height - (xPos.top + $(e.target).height());
            var x3 = (xPos.left/screen_width)*100;
            var y3 = (y1/screen_height)*100;
            var delay=0
            var duration=0
            alert(x3);
            var formData = new FormData($(this)[0]);
            action=$('.action option:selected').text();
            formData.append("x", x3);
            formData.append("y", y3);
            formData.append("width", width);
            formData.append("height", height);
            formData.append("action", action);
            formData.append("delay", delay);
            formData.append("duration", duration);
            formData.append("obj_id", object_id);
            formData.append("id",state_id);


            $.ajax({
                url: '<?php echo url();?>/editState',
                type: 'post',
                data: formData,
                async: false,
                success: function (data) {
                alert("sss")
                   // alert(data)
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
        )




        $('#1').click(function()
            {
            $.get('<?php echo url();?>/getState',function(data)
            {

                for(i=0;i<data.length;i++)
                {
                    //$('#dive').append(data);
                    var str=data[i].action
                                if(str=="Move")
                                {
                                        alert(str);
                                        //$('#dive').append(data[0].action);
                                        move(".aa").translate(data[i].x, data[i].y).end()
                                }
                                if(str=="Rotate")
                                {
                                    alert(str);
                                    move('.aa')
                                    .rotate(140)
                                    .end();
                                }
                                if(str=="Resize")
                                {
                                    alert(str);
                                    move('.aa')
                                    .scale(3)
                                    .end();
                                }
                                if(str=="Skew")
                                {
                                    alert(str);
                                    move('.aa')
                                    .x(300)
                                    .skew(50)
                                    .set('height', 20)
                                    .end();
                                }
                }


            });

        }
        )

   // alert("ready end");
 });





</script>

    <div style="clear: both"></div>
</div>

</div>


@endsection