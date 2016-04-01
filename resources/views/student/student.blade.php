@extends('layouts.admin')

@section('content')
        <!--Middle Content-->

  <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Students</h2>
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

                   //

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Project Name</th>
                          <th style="width: 20%">#Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($data as $data)
                          {
                               ?>
                               <span>

                               <?php

                                echo($data->id."  ");

                               ?>
                               </span>

                               <?php

                                echo($data->name." ");
                                echo "  ";
                                //var_dump($data->username);
                                echo "  ";
                                echo($data->user_id." ");
                                ?>

                                <a href="get_student_record/<?php echo($data->id);?>">Edit</a>
                                <a href="delete_student/<?php echo($data->id);?>">Delete</a>

                                <br/>

                                <?php


                           }
                          ?>

                        <tr>
                          <td>#</td>
                          <td>
                            <a>mm</a>
                            <br>
                            <small>Created 01.01.2015</small>
                          </td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </td>
                        </tr>

                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>











@endsection