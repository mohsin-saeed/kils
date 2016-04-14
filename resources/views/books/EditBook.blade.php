@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Edit Book</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="get" action="<?php echo url();?>/updateBookRecord/<?php echo $data[0]->id?>">

                    <div class="form-group">
                      <label  for="first-name" style="margin-left: 22%;">Book Title <span class="required"></span></label>
                      <input type="text" id="studentName" value="<?php echo $data[0]->title ?>" name="title">
                    </div>

                    <div class="form-group">
                      <label  for="last-name" style="margin-left: 20%;">Description <span class="required"></span></label>
                      <textarea name="description" rows="4" cols="100"><?php echo $data[0]->description ?></textarea>

                    </div>


                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 40%;">Save</button>
                      <button type="submit" class="btn btn-success">Cancel</button>
                        </div>

                  </form>
                </div>
              </div>
            </div>
@endsection