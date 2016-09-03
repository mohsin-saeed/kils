@extends('layouts.author')
@section('content')
        <!--Middle Content-->
    <div style="padding: 2%">

        <div >

            <a href="<?php echo url();?>/AddPage/<?php echo $data['book_id']?>"><button type="button" class="button6">Add Page</button></a>
        </div>
            <div class="row">
              <div class="">
                <div class="x_panel_mc1" style="background: white">
                  <h2 ><b><p style="text-align: center">Pages of Book <?php  echo strtoupper($data['title']->title)?></p></b></h2>
                  <div class="x_title">

                    <ul class="nav navbar-right panel_toolbox">


                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row">

                    @if(!$data['pages'])


                        <img class="no-data" src="http://localhost/kils/public/storage/public/images/no_page_img.png">

                    @endif
                    <?php foreach($data['pages'] as $page)

                    {;?>

                          <?php  $img_path="http://localhost/kils/public/storage/public/pages/"?>
                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">

                               <img style="width: 100%;height: 100%; display: block;" src="<?php echo $img_path.$page->bg?>" alt="No Image">
                               <div class="mask">
                                  <div class="tools tools-bottom">

                                  <p class="p_link_mc1"></p>
                                    <a title=" List Page Objects " href="<?=url()?>/pageobjects/<?php echo$page->id;?>"><i class="fa fa-list"></i></a>
                                    <a title="Customize Page " href="<?=url()?>/test/<?php echo$page->id;?>"><i class="fa fa-cogs"></i></a>
                                    <a title="Edit Page" href="<?=url()?>/editpage/<?php echo$page->id;?>"><i class="fa fa-edit"></i></a>
                                    <a title="Delete pages" href="<?=url()?>/deletepage/<?php echo$page->id;?>"><i class="fa fa-trash-o"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <b><p style="text-align: center;margin-top: 15px;">page#
                                <?php echo $page->id;?></p></b>
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