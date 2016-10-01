@extends('layouts.admin')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Add Category</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="get" action="createCategory">

                    <div class="form-group">
                      <label class="col-md-4 control-label">Category Name</label>
                        <div class="col-md-6">
                              <input type="text" id="studentName" required="required" name="name" class="form-control input-circle" placeholder="Enter Category Name">
                       </div>
                    </div>

                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 40%;">Save</button>

                      <a href="{{url('Categories')}}" class="btn btn-success">Cancel</a>
                      </div>

                  </form>
                </div>
              </div>
            </div>



























@endsection