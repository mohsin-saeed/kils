@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel2">
                <div class="x_title">


                  <h3 style="margin-left: 3%;"><b>Customise Page<?php echo $data[0]->page_id?></b></h3>


                  <div class="clearfix"></div>
                </div>
                <div class="x_content">



                        <ul>
                            <li>

                            </li>
                        </ul>
                  <form id="demo-form2"  class="form-horizontal form-label-left" method="post" action="<?php echo url();?>/UpdatePageRecord/<?php echo $data[0]->id?>" enctype="multipart/form-data">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <?php echo print_r($data);?>
                  </form>
                </div>
              </div>
            </div>

@endsection