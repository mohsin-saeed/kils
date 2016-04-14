@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                <?php $conter=1;?>
                  <h3 style="margin-left: 34%;"><b>Add Book</b></h3>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="get" action="CreateBook">

                    <div class="form-group">
                      <label  for="first-name" style="margin-left: 20%;">Book Title <span class="required"></span></label>
                      <input type="text" id="name" name="title" required="required" >
                    </div>

                    <div class="form-group">
                      <label  for="last-name" style="margin-left:3%;">Description about Book <span class="required"></span></label>
                      <textarea name="description" ></textarea>
                    </div>

                     <div class="form-group">
                         <label  for="first-name" style="margin-left: 13%;">Category Name <span class="required"></span></label>
                         <select name="category_id">

                             <option >Options</option>
                              <?php foreach ($data as $data)
                                {
                                  ?>
                                  <option value="$data->id." >
                                  <tr>
                                  <td><?php echo($conter++."  "); ?></td>
                                  <td> <?php echo($data->category_name." ");?></td>
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