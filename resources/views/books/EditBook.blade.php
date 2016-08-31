@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="margin-left: 20%;"><b>Edit Book<?php echo " ".strtoupper($data->title);?></b></h3>

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

                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url()?>/editbook/<?php echo $data->id?>">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label  for="first-name" style="margin-left: 2%;"><span class="required">Book Title </span></label>
                      <input type="text" id="name" value="<?php echo $data->title?>" name="title" required="required"  style="width: 70%;padding: 3px;margin-left: 3%;">
                    </div>

                    <div class="form-group">
                      <label  for="last-name" > <span class="required">Description </span></label>
                      <textarea name="description"  style="padding: 20px;vertical-align: middle;width: 70%;margin-left: 3%;border-radius: 3%;" required="required"><?php echo $data->description?> </textarea>
                    </div>




                    <?php $cat= DB::table('categories')->get();

                    ?>

                     <div class="form-group">
                         <label  for="first-name" > <span class="required" >Category Name</span></label>
                         <select name="category_id" class="btn3 btn-success dropdown-toggle stats-list"  style="width: 40%;padding: 1%" required="required" >


                             <option value="">Options</option>
                              <?php foreach ($cat as $data)
                                {
                                  ?>
                                  <option value="<?php echo $data->id?>" >
                                  <tr>
                                  <td><?php echo $data->category_name?></td>
                                  <td> </td>
                                  </tr>
                                  </option>>
                                  <?php
                                  }
                              ?>
                           </select>
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