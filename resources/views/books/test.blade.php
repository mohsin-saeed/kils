@extends('layouts.author')
@section('content')

<?php $screen_width = 800 ; $screen_height = 450 ?>

<head>
    <link rel="stylesheet" href="css/custom.css">

  <meta charset="utf-8">
  <!--<title>jQuery UI Draggable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">-->

  <title>jQuery UI Draggable - Constrain movement</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">

    <script>
//    $(function() {
//      $( "#draggable" ).draggable({ axis: "y" });
//      $( "#draggable2" ).draggable({ axis: "x" });
//
//      $( ".img" ).draggable({ containment: ".imgdiv", scroll: false });
//      $( "#draggable5" ).draggable({ containment: "parent" });
//    });
    </script>
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
  <a href="<?php echo url();?>/AddObject/<?php echo ($data[0]->page_id);?>"><button type="button" class="button2">Add Object test</button> </a>



        <div style="width: 100%">
            <!--<?php echo($data[0]->page_id);
            ?>-->

            <?php
                $bg=DB::table('pages')->where('id',$data[0]->page_id)->get() ;
                $pagedir="/storage/public/pages/";
                $objectdir="/storage/public/objects/";
            ?>
            <div class="imgdiv" style="width: {{$screen_width}}px; height: {{$screen_height}}px">
                <img src="<?php echo url().$pagedir.$bg[0]->bg ?>" width="100%" height="100%">

                    <?php $objec=DB::table('objects')->where('page_id',$data[0]->page_id)->get();?>
                           <?php
                                foreach($objec as $objec)
                                       {
                                       ?>
                                          <div class="img" style="top: 0px">


                                                <img class="obj-dragable" src="<?php echo url().$objectdir.$objec->object_path; ?>" style="height: 100%;width: 100%" >

                                          </div>
                                       <?php
                                            }
                                        ?>


            </div>

<div class="action">
<button id="on"   style=" margin-top: 5%; background-color: #033244">click me</button>





<script>
/*$(function() {

      $stop_counter = $( "#event-stop" ),
      counts = [0 ];

    $( "#draggable" ).draggable({

      stop: function() {
        counts[0]++;
        updateCounterStatus( $stop_counter, counts[0] );
      }
    });}
)*/

$(document).ready(function() {

var screen_width = <?php echo $screen_width; ?> ;
var screen_height = <?php echo $screen_height; ?> ;
      $stop_counter = $( "#event-stop" ),
      counts = [0 ];

    $( "img.obj-dragable" ).draggable({
     containment: ".imgdiv", scroll: false ,

      stop: function(e) {
        //counts[0]++;
       // updateCounterStatus( $stop_counter, counts[0] );

         var x = $(e.target).position();

         var y1 = screen_height - (x.top + $(e.target).height());
         var y = (y1/screen_height)*100;
         var x = (x.left/screen_width)*100;


         console.log( $(e.target));
         alert("y: " +y  + ",, x: " + x);

      }
    });


});


function disable1()
{
document.getElementById("on").disabled=true;
document.getElementById("on").style.background="red"

}
</script>
</div>

        </div>


@endsection