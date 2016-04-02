@extends('layouts.admin')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Add Student</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="get" action="StudentSignUp">

                    <div class="form-group">
                      <label  for="first-name" style="margin-left: 85px;">Student Name <span class="required"></span>
                      </label>
                        <input type="text" id="studentName" required="required" name="name">
                    </div>

                    <div class="form-group">
                      <label  for="last-name" style="margin-left: 129px;">Roll No <span class="required" ></span>
                      </label>
                      <input type="text" id="rollNumber" name="rollnumber" required="@">
                    </div>

                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 38%;">Save</button>
                      <button type="submit" class="btn btn-success">Cancel</button>
                        </div>

                  </form>
                </div>
              </div>
            </div>



























@endsection