<! DOCTYPE html>
<head>
<title></title>

</head>

<body>


    @if(Session::has('success'))

        <div class="alert alert-success alert-success fade in" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span></button>
                      <strong>Congrats!</strong>

         </div>
    @endif


   @if(Session::has('error'))
        <div class="alert alert-warning alert-danger fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"></span></button>
          <strong>Sorry!</strong> &nbsp;
           {{Session::get('error')}}
           </div>

 @endif

  @if(Session::has('messages'))
         <div class="alert alert-warning alert-danger fade in" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">×</span></button>
           <strong>Sorry!</strong>  You have failed.
           <ul>
           @foreach (Session::get('messages')->all() as $message)
               <li>{{ $message  }}</li>
           @endforeach
           </ul>
         </div>
  @endif


  {{--@if(Session::has('messages'))--}}
              {{--<div class="alert alert-warning alert-danger fade in" role="alert">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                {{--<span aria-hidden="true">×</span></button>--}}
                {{--<strong>Sorry!</strong>--}}
                {{--{{Session::get('messages')}}</div>--}}

              {{--</div>--}}
          {{--@endif--}}


    @yield('content')
</body>
</html>