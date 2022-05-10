<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #232222 ">
  <a class="navbar-brand" href="{{url('/')}}" style="padding-left: 10px">WO:SA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav" >
      <div class="search" style="float: right">
        <form action="{{url('searchproduct')}}" method="POST">
          @csrf
      <div class="input-group">
        <input type="search" name="search" required class="form-control" id="search_product" placeholder="Search Product" aria-label="Search" aria-describedby="basic-addon1">
        <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i></button>
        </div>
      </form>
      
      </div>
      <ul class="navbar-nav ms-auto " style="margin-left:auto">
        <li class="nav-item {{Request::is('/')?'active':''}}" style="padding-left: 6px">
          <a class="nav-link" href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;&nbsp;Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{Request::is('categories_front')?'active':''}}" style="padding-left: 8px">
          <a class="nav-link" href="{{url('/categories_front')}}"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Categories</a>
        </li>
        <li class="nav-item {{Request::is('cart')?'active':''}}" style="padding-left: 8px">
          <a class="nav-link" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i>&nbsp;Cart&nbsp;
          <span class="badge badge-danger cartcount" style="font-size:14px">0</span>
          </a>
        </li>
        
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="dropdown" style="margin: auto;">
          @guest
          @if (Route::has('login'))
          <li class="nav-item" style="padding-left: 8px">
            <a class="nav-link" href="{{ route('register') }}" data-toggle="modal" data-target="#register"> <i class="fa fa-sign-in"></i>&nbsp;{{ __('Sign Up') }}</a>
          </li>
              <li class="nav-item" style="padding-left: 8px">
                  <a  class="nav-link" href="{{ route('login') }}" data-toggle="modal" data-target="#exampleModalCenter"> <i class="fa fa-sign-in"></i>&nbsp;{{ __('Login') }}</a>
              </li>
             
          @endif

         
          @else
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #998D33;text-decoration:none;padding-left:12px;"><i class="fa fa-user"></i>&nbsp;&nbsp;{{Auth::user()->name}} {{Auth::user()->lname}}
          <span class="caret"></span></a>
          <ul class="dropdown-menu" style="width:10px">
            <div class="rec">
             <li><a class="dropdown-item you" href="{{url('recommendation')}}" >For You !!           
             </a>
             </li>
            </div>
            <li><a class="dropdown-item" href="{{url('my-orders')}}">My Orders           
            </a>
           </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('Logout') }}
           </a>
          

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form></li>
           
           
          </ul>
          @endguest
        </li>
      </ul>
        </div>
      
   
   
  </nav>
