@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="text-align: center"><b>Edit Book<?php echo " ".ucwords($data->title);?></b></h3>

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
                       <label class="col-md-4 control-label">Book Title</label>
                       <div class="col-md-6">
                        <input type="text" id="name" value="<?php echo $data->title?>" name="title" required="required" class="form-control" >
                       </div>
                    </div>

                    <div class="form-group">
                       <label class="col-md-4 control-label">Description</label>
                         <div class="col-md-6">
                         <textarea name="description" class="form-control" required="required"><?php echo $data->description?> </textarea>
                         </div>
                    </div>




                    <?php $cat= DB::table('categories')->get();

                    ?>

                     <div class="form-group">

                         <label class="col-md-4 control-label">Category Name</label>
                         <select name="category_id" class="btn3 btn-success dropdown-toggle stats-list"  style="width: 47%;padding: 1%" required="required" >


                             <option value="">options</option>
                              <?php foreach ($cat as $categry)
                                {
                                    $selected = "";
                                    if($categry->id == $data->category_id){
                                        $selected = "selected='selected'";
                                    }
                                  ?>
                                  <option <?php echo $selected?> value="<?php echo $categry->id?>" >

                                  <td><?php echo $categry->category_name?></td>


                                  </option>>
                                  <?php
                                  }
                              ?>
                           </select>
                     </div>


                     <div class="form-group">
                      <button type="submit" class="btn btn-primary" style="margin-left: 36%;">Save</button>
                      <a href="{{url('books')}}" class="btn btn-success">Cancel</a>
                        </div>

                  </form>
                </div>
              </div>
            </div>

@endsection