@extends('layouts.auth')

@section('content')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          
          <div class="card mb-3">
            
            <div class="card-body">
              <div class="d-flex justify-content-center py-4">
                <a href="{{ asset('/') }}" class="logo w-auto">
                  <img src="{{ asset('assets/images/polihasnur.png') }}" style="max-height: 100px" alt="">
                  {{-- <span class="d-none d-lg-block">Alumni Polihasnur</span> --}}
                </a>
              </div><!-- End Logo -->

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Sistem Informasi Data Alumni Polihasnur</h5>
                {{-- <p class="text-center small">Enter your username & password to login</p> --}}
              </div>
            <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                @csrf

                <div class="col-12">
                  <label for="yourUsername" class="form-label">Username</label>
                  <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                  <p class="small mb-0">Belum Memiliki Akun? <a href="{{ route('register') }}">Buat Akun</a></p>
                </div>
                <div class="col-12 d-none">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
              </form>

            </div>
          </div>

          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
          </div>

        </div>
      </div>
    </div>

</section>

@endsection
