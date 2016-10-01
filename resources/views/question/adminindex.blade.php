@extends('layouts.admin')

@section('content')

        <!--Middle Content-->



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