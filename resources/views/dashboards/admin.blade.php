@extends('layouts.admin')

@section('content')
       <div class="row tile_count">
        <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count" style="background-color: seagreen;color: #ffffff">

              <span class="count_top"><i class="fa fa-user"></i> Total User's</span>
              <div class="count">{{$data['users']}}</div>
             
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count " style="background: firebrick;color: #ffffff">

              <span class="count_top"><i class="fa fa-folder"></i> Total Categories</span>
              <div class="count">{{$data['category']}}</div>
             
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count" style="background: darkred;color: #ffffff">

              <span class="count_top"><i class="fa fa-book"></i> Total Books</span>
              <div class="count">{{$data['books']}}</div>
             
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count" style="background: darkcyan; color: #ffffff">

              <span class="count_top"><i class="fa fa-file-video-o"></i> Total Videos</span>
              <div class="count">{{$data['videos']}}</div>
              
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count"style="background: rebeccapurple;color: #ffffff">

              <span class="count_top"><i class="fa fa-question"></i> Total Questions</span>
              <div class="count">{{$data['questions']}}</div>
            
            </div>
            <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count"style="background: darkslateblue;color: #ffffff">

              <span class="count_top"><i class="fa fa-file"></i> Total Quizes</span>
              <div class="count">{{$data['quiz']}}</div>
              
            </div>
            
          </div>

           <style> .tile_stats_count{
                    padding: 15px 0px !important;
                    width: 15%;
                    height: 95px;
                    text-align: center;
                    margin-left: 1.5%;

                    }</style>

@endsection