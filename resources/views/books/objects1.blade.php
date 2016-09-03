@extends('layouts.author')
@section('content')
        <!--Middle Content-->
    <div style="padding: 2%">

        <div >

            <a href="<?php echo url();?>/addobject/<?php echo $data['id']?>"><button type="button" class="button6">Add object</button></a>
        </div>
            <div class="row">
              <div class="">
                <div class="x_panel_mc1" style="background: white">
                  <h2 ><b><p style="text-align: center">Objects of Page #<?php echo $data['id']?></p></b></h2>
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
                    <?php foreach($data['list'] as $object)

                    {;?>

                          <?php  $img_path="http://localhost/kils/public/storage/public/objects/"?>
                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">

                               <img style="width: 100%;height: 100%; display: block;" src="<?php echo $img_path.$object->object_path?>" alt="No Image">
                               <div class="mask">
                                  <div class="tools tools-bottom">

                                  <p class="p_link_mc1"></p>
                                    <a title="List this object States" href="<?=url()?>/objectstates/<?php echo$object->id;?>"><i class="fa fa-list"></i></a>
                                    <a title="Edit Object" href="<?=url()?>/editobject/<?php echo$object->id;?>"><i class="fa fa-edit"></i></a>
                                    <a title="Delete Object" href="<?=url()?>/deleteobject/<?php echo$object->id;?>"><i class="fa fa-trash-o"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <b><p style="text-align: center;margin-top: 15px;">Object #
                                <?php echo $object->id;?></p></b>
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