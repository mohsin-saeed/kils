@extends('layouts.author')

@section('content')
<?php
//use App\books;
//use App\pages;
use App\objecs;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Input;

?>
        <!--Middle Content-->
         <a href="<?php echo url();?>/AddPage/<?php echo $data[0]->book_id?>"><button type="button" class="button2">Add Page</button> </a>
        <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                  <?php $title=DB::table('Books')->select('title')->where('id',$data[0]->book_id)->get();?>
                    <h2>Pages Of BooK<?php echo "  (".$title[0]->title."  )";?></h2>
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
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Book ID</th>
                          <th style="width: 20%"> Background</th>
                          <th style="width: 20%"></th>
                          <th style="width: 20% ; ">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $conter=1; ?>
                        <?php foreach ($data as $data)
                        {
                         ?>
                         <tr>
                            <td><?php echo($conter++."  "); ?></td>
                            <td style="margin-left: 6%"> <?php echo($data->book_id." ");?></td>
                            <td> <?php echo($data->bg." ");?></td>
                            <td> </td>
                            <td>
                            <a href="<?php echo url();?>/test/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Detail</a>
                            <a href="<?php echo url();?>/EditPageRecord/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="<?php echo url();?>/DeletePageRecord/<?php echo($data->id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                         </td>

                         </tr>
                         <?php
                          }
                         ?>
                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>

@endsection