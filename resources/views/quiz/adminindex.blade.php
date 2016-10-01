@extends('layouts.admin')

@section('content')

        <!--Middle Content-->

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
                          <th style="width: 8%">#</th>
                          <th style="width: 20%">Quiz Title</th>
                          <th style="width: 20%">Quiz Categories</th>


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