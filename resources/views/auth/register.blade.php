@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 background">
            <div class="text-center">
                <h3 class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> --}}

                            <div class="col-md-6">
                                <div class="validate-input ">
                                    <input id="name" type="text" class="form-control account @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name *">
                                    <span class="symbol-account">
                                        <i class="fas fa-user" aria-hidden="true"></i>
                                    </span>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                            <div class="col-md-6">
                                <div class="validate-input ">
                                    <input type="email" class="form-control account @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" placeholder="Email *">
                                    <span class="symbol-account">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                    </span>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6">
                                <div class="validate-input ">
                                    <input id="password" type="password"
                                    class="form-control account @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password" placeholder="Password *"/>
                                    <span class="symbol-account">
                                    <i class="fas fa-lock" aria-hidden="true"></i>
                                    </span>
                                </div>
                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                            <div class="col-md-6">
                                <div class="validate-input ">
                                        <input id="password-confirm" type="password"
                                        class="form-control account @error('password') is-invalid @enderror" name="password_confirmation" required
                                        autocomplete="new-password" placeholder="Confirm password *"/>
                                            <span class="symbol-account">
                                        <i class="fas fa-lock" aria-hidden="true"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" style="margin: auto;">
                                <button type="submit" class="btn btn_fondOrange">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection