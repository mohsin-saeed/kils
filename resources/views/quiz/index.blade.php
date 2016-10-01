@extends('layouts.author')

@section('content')

        <!--Middle Content-->


         <a href="quiz/create"><button type="button" class="button9">Add Quiz</button> </a>

  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                    <h2>Quizzes</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Quiz Title</th>
                          <th style="width: 15%">Quiz Categories</th>

                           <th style="width: 10% ; ">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $conter=1; ?>
                      <?php foreach ($quizzes as $quiz)
                          {
                           ?>
                               <tr>
                                <td><?php echo($conter++."  "); ?></td>
                                <td> <?php echo($quiz->title." ");?></td>



                                <td> {{App\Quiz::get_cate($quiz->categories_id)}}</td>

                                <td>

                                    <a href="quiz/edit/<?php echo($quiz->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="quiz/delete/<?php echo($quiz->id);?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                     <a href="quiz/quiz_start/<?php echo($quiz->id);?>/2" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Strat </a>
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