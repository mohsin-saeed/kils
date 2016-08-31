@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="">
            <div class="x_panel_mc1"style="background: #f5f5f5">
              <div class="x_title" >
                <h2 style="margin-left: 13%;color: #000000"><strong>Detail of <?php echo $data->title." " ?> video</strong></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                  <div class="" style="background: #ffffff">
                  <div style="padding-top: 3% " >
                    <iframe width="750" height="315" class="iframe"src="<?php echo "https://www.youtube.com/embed/".$data->thumbnail?>" frameborder="0" allowfullscreen></iframe>
                  </div>

                  <div class="detail1">
                    <h1 class="border-seprater">Discription!</h1>
                    <p style="padding: 3%">
                        <?php echo $data->description?>
                    </p>

                  </div>

                    </div>
                </div>

              </div>
            </div>
          </div>

@endsection