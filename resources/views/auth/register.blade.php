@extends('layouts.auth_layout')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="container login-container">
    <div class="login-contents py-4">
        <div class="card mx-auto mt-5" style="width: 35rem;">
          <div class="card-body pt-4 shadow">
            <h5 class="card-subtitle mt-3 mb-4 text-center" style="color: #4169e1;">Register your account</h6>
            <div class="icon-wrapper text-center pb-2">
                <i class="fa-regular fa-circle-user fa-5x" style="color: gray;"></i>
            </div>
            @error('regist')
            <div class="text-center text-danger">{{ $message }}</div>
            @enderror
            <form class="mt-2" method="post" action="{{ route('register') }}">
                @csrf
              <div class="mb-2">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                @error('email')
                <div class="text-danger py-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="user_name" class="form-label">Username</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="user_name" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger py-1">{{ $message }}</div>
                @enderror
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                <div class="text-danger py-1">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-2">
                <label for="password-confirm" class="form-label">Retype Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                {{-- {% if errArr.password2 | length > 0 %}
                <div class="text-danger py-1">{{errArr.password2}}</div>
                {% endif %} --}}
              </div>
              {{-- {# <div class="g-recaptcha mb-3" data-sitekey="サイトキー" data-callback="myAlert"></div> #} --}}
              <button type="submit" class="btn btn-primary mt-3">Register</button>
            </form>
          </div>
        </div>
    </div>
</section>

@endsection
