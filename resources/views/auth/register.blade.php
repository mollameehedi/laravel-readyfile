{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
</div>
@endsection --}}

@extends('layouts.singn_app')
@section('singn_content')
<div class="form-group">
    <form method="POST" action="{{ route('register') }}">
        @csrf
    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your username" name="name" value="{{ old('name') }}" required>
    @error('name')
         <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
                </span>
             @enderror
  </div><!-- form-group -->
  <div class="form-group">
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" required>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div><!-- form-group -->
  <div class="form-group">
    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required>
    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
  </div><!-- form-group -->
  <div class="form-group">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter your confirmation password " required>
  </div><!-- form-group -->
  
  <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
  <button type="submit" class="btn btn-info btn-block">Sign Up</button>
</form>
  <div class="mg-t-40 tx-center">Already have an account? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div
@endsection
