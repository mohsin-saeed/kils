@extends('layouts.author')

@section('content')

        <!--Middle Content-->

         <a href="question/create"><button type="button" class="button2">Add Question</button> </a>

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
                          <th>Question Title</th>
                           <td><?=$questions->title?></td>
                        </tr>
                         <tr>
                          <th >Question Categorie</th>
                         <td>{{App\Questions::get_cate($questions->categories_id)}}</td>
                          </tr>

                        <tr>
                          <th >Question Option A</th>
                         <td><?=$questions->option_a?></td>
                         </tr>

                         <tr>
                         <th >Question Option B</th>
                         <td><?=$questions->option_b?></td>
                         </tr>

                         <tr>
                           <th >Question Option C</th>
                            <td><?=$questions->option_c?></td>
                           </tr>

                            <tr>
                             <th >Question Option D</th>
                              <td><?=$questions->option_d?></td>
                             </tr>

                             <tr>
                              <th >Is Correct </th>\
                              <?php  if($questions->is_correct==1){
                               $option="A";
                              }elseif($questions->is_correct==2){
                              $option="B";
                              }elseif($questions->is_correct==3){
                              $option="C";
                              }elseif($questions->is_correct==4){
                                $option="D";
                                }
                              ?>
                                <td><?=$option?></td>
                              </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>
@endsection