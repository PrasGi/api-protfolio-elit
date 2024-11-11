@extends('partials.index-no-layout')

@section('head')
<title>Candu Movie | Sign In</title>
@endsection

@section('content')
<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
        <div class="container-fluid pe-0">
          <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
            Moive
          </a>
          <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
              {{-- <li class="nav-item">
                <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('admin.index') }}">
                  <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-2" href="#">
                  <i class="fa fa-user opacity-6 text-dark me-1"></i>
                  Users
                </a>
              </li> --}}
            </ul>
            <li class="nav-item d-flex align-items-center">
              <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" href="{{ route('home') }}">Watch now</a>
            </li>
            <ul class="navbar-nav d-lg-block d-none">
                @if(auth()->check())
                    <li class="nav-item">
                        <a href="{{ route('auth.sign-out') }}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('auth.sign-in.index') }}" class="btn btn-sm btn-round mb-0 me-1 bg-gradient-dark">Sign In</a>
                    </li>
                @endif
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
    </div>
  </div>
</div>
<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card card-plain mt-8">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                <p class="mb-0">Enter your email and password to sign in</p>
              </div>
              <div class="card-body">
                <form role="form" action="{{ route('auth.sign-in.store') }}" method="post">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                    @if(!auth()->check())
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                        </div>
                        {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-sm mx-auto">
                                Don't have an account?
                                <a href="{{ route('auth.sign-up.index') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
                            </p>
                        </div> --}}
                    @endif
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('/assets/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
