@extends('layouts.admin')

@section('content')

        <!--Middle Content-->



  <div class="row">
              <div class="col-md-12">
                <div class="x_panel2">
                  <div class="x_title">
<<<<<<< HEAD
                    <h2>Questions</h2>

=======
                    <h2>Question</h2>
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
>>>>>>> f1529e0197532bcbc5ecda9c3a009bc65b526536
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 7%">#</th>
                          <th style="width: 20%">Question Title</th>
                          <th style="width: 20%">Quiz Title</th>


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

<<<<<<< HEAD

=======
                                <td>
                                    <a href="question/view/<?php echo($ques->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i>View</a>
                                    <a href="question/edit/<?php echo($ques->id);?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>

                                <a href="question/delete/<?php echo($ques->id);?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" >Delete</a>
                                </td>
>>>>>>> f1529e0197532bcbc5ecda9c3a009bc65b526536

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