@extends('layouts.author')

@section('content')
        <!--Middle Content-->
<div class="">
            <div class="x_panel_mc1"style="background: #f5f5f5">
              <div class="x_title" >
                <h2 style="margin-left: 13%;color: #000000"><strong>Detail of <?php echo $data->title." " ?> Book</strong></h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                  <div class="" style="background: #ffffff">

                  <div class="detail1">
                    <strong class="border-seprater">Book Title!</strong>
                    <p style="padding: 4%">
                        <?php echo $data->title?>
                    </p>

                    <strong class="border-seprater">Category!</strong>
                    <p style="padding: 4%">
                        <?php
                            $cat=DB::table('categories')->where('id',$data->category_id)->first();
                                echo $cat->category_name?>
                    </p>

                    <strong class="border-seprater">Discription!</strong>
                    <p style="padding: 4%">
                        <?php echo $data->description?>
                    </p>

                  </div>

                    </div>
                </div>

              </div>
            </div>
          </div>

@endsection