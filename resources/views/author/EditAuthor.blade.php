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
                      <label  for="first-name" style="margin-left: 83px;">Author Name <span class="required"></span></label>

                        <input type="text" name="name" value="<?php echo $data[0]->name ?>" >

                    </div>

                    <div class="form-group">
                      <label  for="last-name" style="margin-left: 130px;">Email <span class="required"></span> </label>

                      <input type="text" name="user_id" value="<?php echo $data[0]->user_id ?>" >

                    </div>

                    <div class="form-group">
                        <label  style="margin-left: 101px;">Password</label>
                        <input type="text" name="password" value="<?php echo $data[0]->password ?>" placeholder="Roll No" >
                        <input id="Password"  type="password" name="password" >
                      </div>


                    <div class="form-group">
                        <label for="confirmPassword" style="margin-left: 49px;">Confirm Password</label>
                        <input id="confirmPassword"  type="password" name="confirmPassword" >
                      </div>
                      <div class="form-group">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
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