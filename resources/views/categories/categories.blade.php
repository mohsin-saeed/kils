@extends('layouts.admin')

@section('content')
        <!--Middle Content-->

         <a href="AddCategory"><button type="button" class="button9">Add Category</button> </a>



  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                    <h2><b>Categories</b></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Category ID</th>
                          <th style="width: 20%">Category Name</th>
                          <th style="width: 7%">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php $conter=1; ?>
                      <?php foreach ($data as $data)
                          {
                           ?>
                               <tr>
                                <td><?php echo($conter++."  "); ?></td>
                                <td> <?php echo($data->id." ");?></td>
                                <td> <?php echo($data->category_name." ");?></td>

                                <td>
                                    <a href="EditCategory/<?php echo($data->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="deleteCategoryRecord/<?php echo($data->id);?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"> </i> Delete </a>
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