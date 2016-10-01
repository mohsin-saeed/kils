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


                @if(isset($data['pages'][0]->book_id))
                <h2 ><b><p style="text-align: center">Pages of Book <?php  echo ucwords($data['title']->title)?></p></b></h2>

                  <div class="x_title">
                  </div>

                  <div class="x_content">

                    <div class="row">


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
                                    <a title="Delete pages" href="<?=url()?>/deletepage/<?php echo$page->id;?>" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash-o"></i></a>
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
                   <div style="margin-left: 35%">

                        <?php echo str_replace('/?','?', $data['pages']->render())?>
                   </div>

                   @else
                      <img class="no-data" src="http://localhost/kils/public/storage/public/images/no_page_img.png">

                @endif

                </div>
              </div>

            </div>

        </div>

    </div>

@endsection