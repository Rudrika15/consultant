<div class="topcolor">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap p-3 gap-5">
            <div class="d-flex gap-1">
                <i class="fa fa-envelope pt-1"></i>
                <span>connect@consultantcube.com</span>
                <i class="fa fa-phone pt-1"></i>
                <span>7600891148</span>
            </div>
            <div class="d-flex toplinks gap-lg-3 gap-1">
                <div class="d-flex gap-3 login_links">
                    <i class="fa fa-facebook-f pt-lg-1"></i>
                    <i class="fa fa-instagram pt-lg-1"></i>
                    <i class="fa fa-linkedin pt-lg-1"></i>
                </div>
               
                <div class="d-flex gap-3 login_links">
                    <i class="fa fa-user-circle-o pt-1">
                        {{-- <a href="{{ route('login') }}" class="text-white"
                                style="text-decoration:none;">Login</a></i>
                                <i class="fa fa-plus pt-lg-1"></i>
                            <a href="{{ route('register') }}" class="text-white" style="text-decoration:none;">Sign Up</a>
                                </i> --}}
                        @if (Auth::user())
                            <a href="{{ route('visitor.profile') }}" class="text-white"
                            style="text-decoration:none;">{{Auth::user()->name}}</a></i>        
                        @else
                            <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop"class="text-white"
                                style="text-decoration:none;">Login</a></i>
                                <i class="fa fa-plus pt-1"></i>
                            <a href="{{ route('register') }}" class="text-white" style="text-decoration:none;">Sign Up</a>
                                </i>
                        @endif    
                </div>
                <div class="d-flex gap-3 login_links">
                    @if (Auth::user())
                        <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                            @csrf
                            </form>
                    @else
                        <i class="fa fa-plus pt-1"></i>
                        <span> Become a Consultant</span>
                    @endif
                    {{-- <i class="fa fa-plus pt-lg-1"></i>
                        <span> Become a Consultant</span> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button> --}}
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content w-lg-75">
        <div class="modal-header" >
          <h5 class="modal-title" id="staticBackdropLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form class="user mt-5" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 ">
                    <input type="email" placeholder="Email address" class="form-control p-3 form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3 mt-5">
                    <input type="password" name="password" placeholder="Password" class="form-control p-3 form-control-user @error('password') is-invalid @enderror" id="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="text-center mt-5">
                    <button type="button" class="btn " id="btn-secondary-close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn" id="btn-primary-login" data-bs-dismiss="modal">Login</button>
                </div>
                    
            </form>
            <div class="mb-3 text-center mt-5">
                @if (Route::has('password.request'))
                <a class="small bluetext" id="forgot-link" href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
                <a class="small bluetext" id="create-new-account-link" href="{{ route('register') }}">Create New Account</a>

            </div>
        </div>
        
      </div>
    </div>
  </div>