@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">


                  <h3 style="margin-left: 34%;"><b>Edit Object  </b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url();?>/UpdateObjectRecord/<?php echo $data[0]->id?>" enctype="multipart/form-data">

                    <div class="form-group">
                       <label  for="first-name" style="margin-left: 84px;">Select Page Object<span class="required"></span></label>
                        <input type="file" name="filename"  accept="image/gif, image/jpeg, image/png,image/jpg" >
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