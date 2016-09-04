@extends('layouts.author')

@section('content')


        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="margin-left: 34%;"><b>Edit Question</b></h3>

                   @include('messages.flash')
                                      @if (count($errors) > 0)
                                         <!--  <div class="alert alert-danger">
                                              <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                              <ul>
                                                  @foreach ($errors->all() as $error)
                                                      <li>{{ $error }}</li>
                                                  @endforeach
                                              </ul>
                                          </div> -->

                                      @endif
                                     @if(session('message'))
                    {{session('message')}}
                  @endif

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>

                  <form  method="post" action="<?php echo url()?>/question/edit/<?=$question->id?>">


                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                                              <label class="col-md-4 control-label">Question Title</label>
                                              <div class="col-md-6">
                                                <div class="@if ($errors->has('title')) has-error @endif">
                                                  <input type="text" name="title" value="{{$question->title}}" class="form-control input-circle" placeholder="Enter question Title">

                                                  @if ($errors->has('title'))
                                                  <p class="help-block">{{ $errors->first('title') }}</p>
                                                  @endif
                                                  </div>

                                              </div>
                                 </div>

                                 <br> <br><br>




                       <div class="form-group">
                                           <label class="col-md-4 control-label">Quiz Name</label>
                                                                   <div class="col-md-6">
                                                                     <div class="@if ($errors->has('quiz_id')) has-error @endif">
                                                                     <?php echo Form::select('quiz_id', $quiz, $question->quiz_id, array('class' => 'form-control')) ?>

                                                                       @if ($errors->has('quiz_id'))
                                                                       <p class="help-block">{{ $errors->first('quiz_id') }}</p>
                                                                       @endif </div>
                                                                   </div>
                                                                 </div>

                    <br> <br>

                    <div class="form-group">
                                           <label class="col-md-4 control-label">Option A</label>
                                             <div class="col-md-6">
                                                        <div class="@if ($errors->has('option_a')) has-error @endif">
                                                         <input type="text" name="option_a" value="{{$question->option_a}}" class="form-control input-circle" placeholder="Enter option a">
                                                         @if ($errors->has('option_a'))
                                                          <p class="help-block">{{ $errors->first('option_a') }}</p>
                                                           @endif
                                                         </div>

                                              </div>
                                        </div>

               <br><br>

                <div class="form-group">
                        <label class="col-md-4 control-label">Option B</label>
                         <div class="col-md-6">
                             <div class="@if ($errors->has('option_b')) has-error @endif">
                               <input type="text" name="option_b" value="{{$question->option_b}}" class="form-control input-circle" placeholder="Enter option b">
                                @if ($errors->has('option_b'))
                                <p class="help-block">{{ $errors->first('option_b') }}</p>
                                @endif
                              </div>

                          </div>
                </div>

                              <br><br>

                <div class="form-group">
                     <label class="col-md-4 control-label">Option C</label>
                     <div class="col-md-6">
                     <div class="@if ($errors->has('option_c')) has-error @endif">
                     <input type="text" name="option_c" value="{{$question->option_c}}" class="form-control input-circle" placeholder="Enter option c">
                      @if ($errors->has('option_c'))
                       <p class="help-block">{{ $errors->first('option_c') }}</p>
                      @endif
                       </div>

                       </div>
                 </div>

                  <br><br>

                  <div class="form-group">
                  <label class="col-md-4 control-label">Option D</label>
                  <div class="col-md-6">
                  <div class="@if ($errors->has('option_d')) has-error @endif">
                   <input type="text" name="option_d" value="{{$question->option_d}}" class="form-control input-circle" placeholder="Enter option d">
                    @if ($errors->has('option_d'))
                    <p class="help-block">{{ $errors->first('option_d') }}</p>

                    @endif
                     </div>

                     </div>
                     </div>

                     <br><br>

                     <div class="form-group">
                       <label class="col-md-4 control-label">IS Correct</label>
                                               <div class="col-md-6">
                                                 <div class="@if ($errors->has('is_correct')) has-error @endif">
                                                 <?php echo Form::select('is_correct', array('1' => 'A', '2' => 'B','3'=>'C','4'=>'D'),$question->is_correct, array('class' => 'form-control')) ?>


                                                   @if ($errors->has('is_correct'))
                                                   <p class="help-block">{{ $errors->first('is_correct') }}</p>
                                                   @endif </div>
                                               </div>
                                             </div>
                                              <br><br>



                      <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>

                     </div>

                  {!! Form::close() !!}
                </div>
              </div>
            </div>

@endsection