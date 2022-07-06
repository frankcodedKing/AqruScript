@extends("layouts.layout")
@section('body')
@include('nav')

      <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="content-wrapper auth p-5 theme-two">
                    <div class="row d-flex align-items-stretch">
                        <div class="col-12 col-md-12 h-100 card">
                            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
                                <div class="nav-get-started">


                  <p>Don't have an account?</p>
                  <a class="btn get-started-btn" href="{{route('register')}}">GET STARTED</a>
                </div>
                  <form action="#" method="post">
                      @csrf

                      <!--<a href='{{route('register')}}'>-->
                      <!--<img alt="" src="../images/logo-white.png" style='height: 40px; width: auto;'>-->
                      <!--</a>-->

                  <!--<h3 class="mt-3 mr-auto">Welcome</h3>-->
                  <br>
                  <p class="mr-auto">Enter your details below.</p>


                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i style="color: #74c947 !important" class="fa fa-user"></i>
                        </span>
                      </div>
                      <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i style="color: #74c947 !important" class="fa fa-lock"></i>
                        </span>
                      </div>
                      <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                  </div>
                  <p class='text-danger'><a href='{{route('password.request')}}'>Forgot Password?</a></p>
                  <div class="form-group">
                      <button type="submit" name="login" class="btn btn-primary submit-btn">SIGN IN <i class="fa fa-sign-in"></i></button>
                  </div>
                   </div>
                    </div>
                     </div>
                      </div>
                       </div>
                        </div>
                     

@endsection
