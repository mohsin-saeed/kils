@extends('layouts.author')
@section('content')
        <!--Middle Content-->
    <div style="padding: 2%">

            <div class="row">
              <div class="">
                <div class="x_panel_mc1" style="background: white">
                  <h2 ><b><p style="text-align: center">states of object #<?php echo $data['id']?></p></b></h2>
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                    @if(!$data)


                        <img class="no-data" src="http://localhost/kils/public/storage/public/images/no_page_img.png">

                    @endif
                    <?php foreach($data['states'] as $state)

                    {;?>

                          <?php  $img_path="http://localhost/kils/public/storage/public/objects/"?>
                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">

                               <img style="width: 100%;height: 100%; display: block;" src="<?php echo $img_path.$state->bg?>" alt="No Image">
                               <div class="mask">
                                  <div class="tools tools-bottom">

                                  <p class="p_link_mc1"></p>
                                    <a title="Edit State" href="<?=url()?>/editobjectstate/<?php echo$state->Id;?>"><i class="fa fa-edit"></i></a>
                                    <a title="Delete Stated" href="<?=url()?>/deleteobjectstate/<?php echo$state->Id;?>"><i class="fa fa-trash-o"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <b><p style="text-align: center;margin-top: 15px;">State #
                                <?php echo $state->Id;?></p></b>
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