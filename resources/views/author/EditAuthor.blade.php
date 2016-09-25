@extends('layouts.admin')

<?php use Illuminate\Contracts\Encryption\DecryptException;
?>
@section('content')

        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h3 style="margin-left: 34%;"><b>Edit Author</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url();?>/updateAuthorRecord/<?php echo $data->id?>">

                    <div class="form-group">
                      <label class="col-md-4 control-label">Author Name: </label>
                    <div class="col-md-6">

                        <input type="text" name="name" value="<?php echo $data->name ?>" class="form-control" required="">
                    </div>

                    </div>

                    <div class="form-group">
                      <label  class="col-md-4 control-label">Email:  </label>
                      <div class="col-md-6">
                        <input type="text" name="userid" value="<?php echo  $data->email?>" class="form-control" required="">
                      </div>
                    </div>

                    <div class="form-group">
                        <label  class="col-md-4 control-label">Password:</label>
                        <div class="col-md-6">
                            <input type="text" name="password"  class="form-control" required="">
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">New Password:</label>
                        <div class="col-md-6">
                            <input id="Password"  type="password" name="password" value="{{old('password')}}" class="form-control" required="">
                        </div>
                  </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Confirm Password:</label>
                        <div class="col-md-6">
                        <input id="confirmPassword"  type="password" name="confirmPassword" class="form-control" required="">
                        </div>
                      </div>
                      <div class="form-group">
                           <input type="hidden" name="_token" value="{{csrf_token()}}">
                       </div>

                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>
                      <a href="{{url('AuthorsList')}}" type="submit" class="btn btn-success">Cancel</a>
                        </div>

                  </form>
                </div>
              </div>
            </div>
@endsection