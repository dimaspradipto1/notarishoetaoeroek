@extends('layouts.dashboard.template')

@include('layouts.dashboard.styles')
@include('layouts.dashboard.scripts')

@section('content')
@include('sweetalert::alert')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="#" class="logo d-flex align-items-center w-auto" style="text-decoration: none">
            {{-- <img src="assets/img/logo.png" alt=""> --}}
            <span class="d-none d-lg-block" >Notaris Hoetaoeroek</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
              <p class="text-center small">Enter your username & password to login</p>
            </div>

            <form action="{{ route('loginauth') }}" class="row g-3 needs-validation" method="POST">
              @csrf

              <div class="col-12">
                <label for="yourUsername" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="yourUsername" value="{{ old('email') }}">
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="yourPassword">
              </div>

              <div class="col-12">
                <button class="btn btn-success w-100" type="submit">Login</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

</section>

@endsection