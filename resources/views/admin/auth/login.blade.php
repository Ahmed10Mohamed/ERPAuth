@extends('admin.auth.layout.app')

@section('content')
   <!-- Content -->

   <div class="authentication-wrapper authentication-cover authentication-bg">
    <div class="authentication-inner row">
      <!-- /Left Text -->
      <div class="d-none d-lg-flex col-lg-7 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
          <img
            src="{{asset('admin/img/illustrations/auth-login-illustration-light.png')}}"
            alt="auth-login-cover"
            class="img-fluid my-5 auth-illustration"
            data-app-light-img="{{asset('admin/illustrations/auth-login-illustration-light.png')}}"
            data-app-dark-img="{{asset('admin/illustrations/auth-login-illustration-dark.png')}}"
          />

          <img
            src="{{asset('admin/img/illustrations/bg-shape-image-light.png')}}"
            alt="auth-login-cover"
            class="platform-bg"
            data-app-light-img="{{asset('admin/illustrations/bg-shape-image-light.png')}}"
            data-app-dark-img="{{asset('admin/illustrations/bg-shape-image-dark.png')}}"
          />
        </div>
      </div>
      <!-- /Left Text -->

      <!-- Login -->
      <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
        <div class="w-px-400 mx-auto">
          <!-- Logo -->
          <div class="app-brand mb-4">
            <a href="index.html" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <img src="{{ asset('admin/img/agentlogo.png') }}" alt="">
              </span>
            </a>
          </div>
          <!-- /Logo -->
          <h3 class="mb-1 fw-bold">Welcome to ERP! 👋</h3>
          <p class="mb-4">Please sign-in to your account and start the adventure</p>

            <form class="mb-3" id="formAuthentication" action="{{route('admin_login')}}" method="post">
                {{csrf_field()}}
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="text"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email"
                autofocus
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                <a href="JavaScript::void();">
                  <small>Forgot Password?</small>
                </a>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                />
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
          </form>




        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>

  <!-- / Content -->

@endsection