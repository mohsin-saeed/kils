@extends('layouts.author')

@section('content')

        <!--Middle Content-->


         <a href="question/create"><button type="button" class="button9">Add Question</button> </a>

  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
                    <h2>Questions</h2>



                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Question Title</th>
                          <th style="width: 15%">Quiz</th>

                           <th style="width: 5% ; ">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $conter=1; ?>
                      <?php foreach ($question as $ques)
                          {
                           ?>
                               <tr>
                                <td><?php echo($conter++."  "); ?></td>
                                <td> <?php echo($ques->title." ");?></td>
                                <?php $quiz_title=App\Questions::get_quiz_title($ques->quiz_id);?>

                                <td> <?=substr($quiz_title, 0, 40) ?></td>

                                <td>

                                    <a href="question/edit/<?php echo($ques->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                                    <a href="question/delete/<?php echo($ques->id);?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>

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