<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width:420px">
      <div class="modal-content" style="background-color:#F9F5F5;">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalCenterTitle">Register</h5> --}}
          <img src="{{asset('assets/images/user_logo.png')}}" alt="user_logo" width="60" height="60" style="margin-right:45%;margin-left:45%">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row mb-3">
                {{-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> --}}

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="First Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> --}}

                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Re-type Password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-dark w-100">
                        {{ __('Sign Up') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
        
      </div>
    </div>
  </div>