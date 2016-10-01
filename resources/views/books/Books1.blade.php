@extends('layouts.author')
@section('content')
        <!--Middle Content-->
    <div style="padding: 2%">

        <div >

            <a href="addbook"><button type="button" class="button6">Add Book</button></a>
        </div>

            <div class="row">
              <div class="">
                <div class="x_panel_mc1" style="background: white">
                 @if(isset ($data[0]->title))

                  <h2 style="text-align: center"><b>Books</b></h2>
                   <div class="x_title">

                     <ul class="nav navbar-right panel_toolbox">
                     </ul>
                     <div class="clearfix"></div>
                   </div>
                   <div class="x_content">

                     <div class="row">
                     <?php foreach($data as $book)
                     {?>

                           <div class="col-md-55">
                             <div class="thumbnail">
                               <div class="image view view-first">

                                 <?php $front_page="http://localhost/kils/public/storage/public/images/no_page_img.png";
                                 $folder_path="http://localhost/kils/public/storage/public/pages/";
                                 ?>


                                 @if($page=DB::table('pages')->where('book_id',$book->id)->first())
                                     <?php $front_page=$page->bg;
                                           $front_page=$folder_path.$front_page;
                                     ?>
                                 @endif

                                 <img style="width: 100%;height: 100%; display: block;" src="<?php echo $front_page;?>" alt="No Image">
                                 <div class="mask">
                                   <p class="p_link_mc2"><a href="bookdetail/<?php echo $book->id;?>" target="_blank" style="color: white">Click Me to See Detail</a></p>
                                   <div class="tools tools-bottom">
                                     <a title="View Book pages" href="book/<?php echo$book->id;?>"><i class="fa fa-files-o"></i></a>
                                     <a title="Edit Book" href="editbook/<?php echo$book->id;?>"><i class="fa fa-edit"></i></a>
                                     <a  title="Delete Book" href="deletebook/<?php echo$book->id;?>" onclick="return confirm('Are you sure you want to delete this item?')"> <i class="fa fa-trash-o"></i></a></div>
                                 </div>
                               </div>
                               <div >

                                 <b><p style="text-align: center;margin-top: 15px;"><?php echo $book->title;?></p></b>
                               </div>
                             </div>
                           </div>
                      <?php
                      }?>

                     </div>

                   </div>
                   <div style="margin-left: 35%">

                       <?php echo str_replace('/?','?', $data->render())?>

                  </div>

                 </div>

                 @else
                    <img class="no-data" src="http://localhost/kils/public/storage/public/images/no_data_img.png">
                 @endif

              </div>
            </div>

        </div>

    </div>


@endsection