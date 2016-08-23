@extends('layouts.author')
@section('content')
<div class="">
<?php $objectdir="/storage/public/objectsbg/";?>
          <div class="page-title">
            <div class="title_left">
            </div>

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
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>States Of Object <?php echo$data[0]->object_id?></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div class="row">




                    <?php
                        foreach($data as $data)
                        {
                    ?>
                            <div class="col-md-55">
                            <div class="thumbnail">
                            <div class="image view view-first">

                            <img style="width: 100%; height:100% display: block;" src="<?php echo url().$objectdir.$data->bg ?>" alt="image">

                            </div>
                            </div>

                            <a href="<?php echo url();?>/ObjectStateDetail/<?php echo ($data->Id)?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Edit</a>
                            <a href="<?php echo url();?>/DeleteObjectStateDetail/<?php echo ($data->Id)?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>


                            </div>


                      <?php
                        }
                      ?>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>


        @endsection