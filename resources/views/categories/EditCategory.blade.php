@extends('layouts.admin')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Edit Category</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="get" action="<?php echo url()?>/UpdateCategoryRecord/<?php echo $data[0]->id?>">

                    <div class="form-group">
                      <label class="col-md-4 control-label">Category Name</label>
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="studentName"  name="name" value="<?php echo $data[0]->category_name?>">
                      </div>
                    </div>

                     <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="margin-left: 40%;">Save</button>
                        <a class="btn btn-success" href="{{url('admin/books')}}">Cancel</a>

                     </div>

                  </form>
                </div>
              </div>
            </div>



























@endsection