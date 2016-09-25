@extends('layouts.admin')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Add Author</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="authorSignUp">

                    <div class="form-group">
                      <label class="col-md-4 control-label">Author Name: </label>
                      <div class="col-md-6">
                        <input type="text" class="form-control " id="name" name="name" required="required"  value="{{old('name')}}">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label">Email: </label>
                      <div class="col-md-6">
                        <input type="email" id="email" name="user_id" required="@" value="{{old('user_id')}}" class="form-control">
                       </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Password:</label>
                        <div class="col-md-6">
                            <input id="Password"  type="password" name="password" value="{{old('password')}}" class="form-control">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirm Password:</label>
                        <div class="col-md-6">
                            <input id="confirmPassword" class="form-control"  type="password" name="confirmPassword" value="{{old('confirmPassword')}}">
                        </div>
                      </div>
                      <div class="form-group">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                       </div>

                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>
                      <a href="{{url('AuthorsList')}}" class="btn btn-success">Cancel</a>
                        </div>

                  </form>
                </div>
              </div>
            </div>



























@endsection