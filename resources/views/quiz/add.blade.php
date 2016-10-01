@extends('layouts.author')

@section('content')


        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="margin-left: 34%;"><b>Add Quiz</b></h3>

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
                  {!! Form::open(array('url' => 'quiz/create')) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                          <label class="col-md-4 control-label">Quiz Title</label>
                          <div class="col-md-6">
                        <div class="@if ($errors->has('title')) has-error @endif">
                          <input type="text" name="title" value="{{Input::old('title')}}" class="form-control input-circle" placeholder="Enter question Title">
                          @if ($errors->has('title'))
                          <p class="help-block">{{ $errors->first('title') }}</p>
                          @endif
                        </div>

                          </div>
                 </div>

                                 <br> <br><br>




                       <div class="form-group">
                                           <label class="col-md-4 control-label">Category Name</label>
                                                                   <div class="col-md-6">
                                                                     <div class="@if ($errors->has('categories_id')) has-error @endif">
                                                                     <?php echo Form::select('categories_id', $categories, null, array('class' => 'form-control')) ?>

                                                                       @if ($errors->has('categories_id'))
                                                                       <p class="help-block">{{ $errors->first('categories_id') }}</p>
                                                                       @endif </div>
                                                                   </div>
                                                                 </div>

                    <br> <br>
 <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>

                     </div>

                  {!! Form::close() !!}
                </div>
              </div>
            </div>

@endsection