@extends('layouts.author')

@section('content')
       <div class="row tile_count">

            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count" style="background-color: seagreen;color: #ffffff">


              <span class="count_top"><i class="fa fa-clock-o"></i> Total Books</span>
              <div class="count">{{$data['books']}}</div>

             
            </div>
          <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count " style="background: firebrick;color: #ffffff">

              <span class="count_top"><i class="fa fa-user"></i> Total Quizes</span>
              <div class="count">{{$data['quiz']}}</div>
              
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count" style="background: darkred;color: #ffffff">

              <span class="count_top"><i class="fa fa-user"></i> Total Questions</span>
              <div class="count">{{$data['questions']}}</div>
            
            </div> 
           
             <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count"style="background: darkcyan;color: #ffffff">

              <span class="count_top"><i class="fa fa-user"></i> Total Videos</span>
              <div class="count">{{$data['videos']}}</div>
              
            </div>
            
            
          </div>

          <style> .tile_stats_count{
          padding: 15px 0px !important;
          width: 20%;
          height: 110px;
          text-align: center;
          margin-left: 3.5%;
          }</style>
@endsection