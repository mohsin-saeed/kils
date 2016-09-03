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
              <div class="">
                <div class="x_panel_mc1" style="background: white">
                  <h2 style="margin-left: 3%"><b>VIDEOS</b></h2>
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                    @if(!$data)


                        <img class="no-data" src="http://localhost/kils/public/storage/public/images/no_data_img.png">

                    @endif
                    <?php foreach($data as $video)
                    {?>

                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">


                                <img style="width: 100%;height: 100%; display: block;" src="<?php echo "https://i.ytimg.com/vi/".$video->thumbnail."/hqdefault.jpg";?>">
                                <div class="mask">
                                  <p class="p_link_mc2"><a href="videodetail/<?php echo $video->id;?>" target="_blank">Click Me to See Detail</a></p>
                                  <div class="tools tools-bottom">

                                    <a href="editvideo/<?php echo$video->id;?>"><i class="fa fa-edit"></i></a>
                                    <a href="deletevideo/<?php echo$video->id;?>"><i class="fa fa-trash-o"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div >

                                <b><p style="text-align: center;margin-top: 15px;"><?php echo $video->title;?></p></b>
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