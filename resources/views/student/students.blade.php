@extends('layouts.admin')

@section('content')

           <a href="addstudent"><button type="button" class="button9">Add Student</button></a>


  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                    <h2>Students</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Student Name</th>
                          <th style="width: 20%">Roll No</th>
                          <th style="width: 7% ;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $conter=1; ?>
                      <?php foreach ($data as $data)
                          {
                           ?>
                               <tr>
                                <td> <?php echo($conter++."  "); ?></td>
                                <td> <?php echo($data->name." ");?></td>
                                <td> <?php echo($data->roll_no." ");?></td>

                                <td>

                                    <a href="EditStudent/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="DeleteStudent/<?php echo($data->id);?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
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