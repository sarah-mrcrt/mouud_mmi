@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center align-self-center">
        <div class="col-md-6 background">
            <div class="text-center">
                <h3 class="card-header">{{ __('Login') }}
            </h3>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        --}}
                        {{-- <div class="col-md-6"> --}}
                        <div class="validate-input ">
                            <input type="email" class="form-control account @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus placeholder="Email *">
                            <span class="symbol-account">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        {{-- </div> --}}
                    </div>

                    <div class="form-group row">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6"> --}}
                            <div class="validate-input ">
                                <input id="password" type="password"
                                    class="form-control account @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password *" />
                                <span class="symbol-account">
                                    <i class="fas fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            {{-- </div> --}}
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4" style="margin: auto;">
                                <div class="form-check">
                                    <label class="checkbox bounce">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <svg viewBox="0 0 21 21">
                                            <polyline points="5 10.75 8.5 14.25 16 6"></polyline>
                                        </svg>
                                    </label>
                                    {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}> --}}
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" style="margin: auto;">
                                <button type="submit" class="btn btn_fondOrange">
                                    {{ __('Login') }}
                                </button>
                                {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link font_orange" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                                </a>
                                @endif --}}
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
