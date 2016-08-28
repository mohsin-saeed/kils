@extends('layouts.author')
@section('content')
        <!--Middle Content-->
    <div style="padding: 2%">

        <div>

            <div class="title_right">
                   <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                     <div class="input-group">
                       <input type="text" class="form-control" placeholder="Search for...">
                       <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">Go!</button>
                        </span>
                     </div>

                   </div>

             </div>


        </div>


        <div >

            <a href="addvideo"><button type="button" class="button6">Add Video</button></a>
        </div>
            <div class="row">
              <div class="col-md-12" style="background: white">
                <div class="x_panel_mc1">
                  <h2 style="margin-left: 3%"><b>VIDEOS</b></h2>
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">


                    <?php foreach($data as $video)
                    {?>

                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">


                                <img style="width: 100%;height: 100%; display: block;" src="<?php echo $video->thumbnail;?>">
                                <div class="mask">
                                  <p class="p_link"><a href="detail/<?php echo $video->id;?>">Click Me to See Detail</a></p>
                                  <div class="tools tools-bottom">

                                    <a href="editvideo/<?php echo$video->id;?>"><i class="fa fa-pencil"></i></a>
                                    <a href="deletevideo/<?php echo$video->id;?>"><i class="fa fa-times"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="caption">

                                <b><p><?php echo $video->title;?></p></b>
                              </div>
                            </div>
                          </div>
                     <?php
                     }?>

                    </div>

                  </div>
                </div>
              </div>
            </div>

        </div>

    </div>


@endsection