<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 420px" >
      <div class="modal-content" >
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5> --}}
          <img src="{{asset('assets/images/user_logo.png')}}" alt="user_logo" width="60" height="60" style="margin-right:45%;margin-left:45%">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
                {{-- <label for="email"  class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                <div class="col-md-12">
                    <div class="fontuser">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email" style="padding-left: 35px">
                        <i class="fa fa-user fa-lg"></i>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                <div class="col-md-12">
                    <div class="fontpass">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" style="padding-left: 35px">
                        <i class="fa fa-key" aria-hidden="true"></i>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-12">
                   <button type="submit" class="btn btn-dark w-100">
                        {{ __('Sign in') }}
                    </button>
                    
                  
                    @if (Route::has('password.request'))
                        <a style="color:black" class="btn btn-black" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
           
        </form>
        </div>
       
      </div>
    </div>
  </div>
  