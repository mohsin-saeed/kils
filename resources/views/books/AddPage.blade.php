@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">


                  <h3><b><p style="text-align: center">Add Page <?php echo $data->title?></p></b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url();?>/SavePage/<?php echo $data->id?>" enctype="multipart/form-data">

                    <div class="form-group">
                       <label  for="first-name" style="margin-left: 84px;">Select Page Background <span class="required"></span></label>
                        <input type="file" name="filename"  accept="image/gif, image/jpeg, image/png,image/jpg" >
                    </div>

                   <div class="form-group">
                      <label  for="first-name" style="margin-left: 84px;">Select Page Narration <span class="required"></span></label>
                      <input type="file" name="audio"  accept=".mp3,audio/*" >
                   </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 38%;">Save</button>
                      <button type="submit" class="btn btn-success">Cancel</button>
                        </div>

                  </form>
                </div>
              </div>
            </div>

@endsection