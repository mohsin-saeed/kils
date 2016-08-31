@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">


                  <h3 style="margin-left: 34%;"><b>Edit Video </b></h3>

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
                         <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url();?>/editvideo/<?php echo($data[0]->id)?>">

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-group">
                              <label  for="first-name" style="margin-left: 2%;"><span class="required">Video Title </span></label>
                              <input type="text" id="name" name="title" value="<?php echo($data[0]->title)?>" required="required" style="width: 70%;padding: 3px;margin-left: 3%;">
                            </div>

                            <div class="form-group">
                              <label  for="first-name" style="margin-left: 2%;"><span class="required">Video URL </span></label>
                              <input type="text" id="name" name="url" value="<?php echo($data[0]->url)?>" required="required" style="width: 70%;padding: 3px;margin-left: 3%;">
                            </div>

                            <div class="form-group">
                              <label  for="last-name" > <span class="required">Description </span></label>
                              <textarea name="description" required=""  style="padding: 20px;vertical-align: middle;width: 70%;margin-left: 3%;border-radius: 3%;">
                                <?php echo($data[0]->description)?>
                              </textarea>
                            </div>




                             <div class="form-group">
                              <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>
                              <button type="submit" class="btn btn-success">Cancel</button>
                             </div>

                          </form>
                  </div>
              </div>
            </div>

@endsection