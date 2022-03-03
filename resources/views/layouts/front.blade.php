<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
   @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('frontend/css/bootstrap5.css')}}" rel="stylesheet" />
  <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

  <link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet" />
  
  <link href="{{asset('frontend/css/owl.theme.default.min.css')}}" rel="stylesheet" />


</head>
<body style="font-family:'Roboto",sans-serif>
  {{-- <div id="logo" style="padding: 15px;"><img src="{{asset('assets/images/logo1.png')}}" alt="logo" style="width: 120px;height:80px;"></div> --}}
 
  @include('layouts.inc.frontnav')
  @include('layouts.inc.loginmodal')
  @include('layouts.inc.registermodal')
    <div class="content" >
      
        @yield('content')
    </div>

   
    
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script> 
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script> 
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script> 
  {{-- <script src="{{asset('frontend/js/slim.min.js')}}"></script>  --}}
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $(document).ready(function(){
               cartcount();
               
      function cartcount()
               {
                   $.ajax({
                       method:"GET",
                       url:"/load-cart-data",
                       success:function(response)
                       {
                           $('.cartcount').html(response.count);
                           console.log(response.count)
                       }
                   });
               }
      })
     </script>
    @if(session('deny'))
    <script>
      swal("{{session('deny')}}");
    </script>
  @endif
    @if(session('status1'))
    <script>
      swal("{{session('status1')}}");
      {{Session::forget('status1')}};
    </script>
  @endif
  @if(session('stat'))
  <script>
    swal("{{session('stat')}}");
    {{Session::forget('status1')}};
  </script>
@endif
  {{-- @if(session('home'))
    <script>
      swal("{{session('home')}}");
    </script>
  @endif --}}
  @yield('scripts')
    </body>
    
    </html>


