@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="margin-left: 34%;"><b>Add Video</b></h3>

                  <div class="clearfix">
                    @if (count($errors) > 0)
                              <div class="error-msg-default">
                                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                    @endif
                  </div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="addvideo">

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                      <label class="col-md-4 control-label">Video Title </label>
                      <div class="col-md-6">
                      <input class="form-control" type="text" id="name" name="title" required="required">
                       </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label">Video URL </label>
                      <div class="col-md-6">
                      <input type="text" id="name" name="url" required="required" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label">Description </label>
                      <div class="col-md-6">
                       <textarea name="description" required="" class="form-control"></textarea>
                      </div>
                    </div>




                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>
                      <a href="{{url('videos')}}" class="btn btn-success">Cancel</a>
                        </div>

                  </form>
                </div>
              </div>
            </div>

@endsection