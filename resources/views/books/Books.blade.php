@extends('layouts.author')

@section('content')

        <!--Middle Content-->

         <a href="AddBook"><button type="button" class="button2">Add Book</button> </a>

  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                    <h2>Authors</h2>
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
                          <th style="width: 20%">Book Title</th>
                          <th style="width: 20%">Description</th>
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
                                <td> <?php echo($data->title." ");?></td>
                                <td> <?php echo($data->description." ");?></td>
                                <td> </td>
                                <td>
                                    <a href="Pages/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>Pages</a>
                                    <a href="{{url('package/'.$data->id)}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Package Book</a>
                                    <a href="EditBookRecord/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="DeleteBookRecord/<?php echo($data->id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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
            <?php echo $users->render(); ?>
@endsection