@extends('layouts.author')

@section('content')
       <div class="row tile_count">

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Books</span>
              <div class="count">{{$data['books']}}</div>
             
            </div>
          <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Quizes</span>
              <div class="count">{{$data['quiz']}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Questions</span>
              <div class="count">{{$data['questions']}}</div>
            
            </div> 
           
             <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Videos</span>
              <div class="count">{{$data['videos']}}</div>
              
            </div>
            
            
          </div>
@endsection