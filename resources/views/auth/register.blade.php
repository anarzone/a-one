@extends('layouts.app')

@section('content')

<div id="main">
  <div class="inner">
    <div class="col-6 col-6-medium">
      <div>
        <h2 id="content">{{ __('Register') }}</h2>
      </div>
      <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
          @csrf
        <div class="row gtr-uniform">
          <div class="aln-center col-6 col-12-medium">
            <div class="col-12 col-12-medium">
              <input id="name" type="text" placeholder="name" name="name" value="{{ old('name') }}" required autofocus>
  
              @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
            <!-- Break -->
            <br>
            <div class="col-12 col-12-medium">
              <input id="email" type="email"  name="email" placeholder="email" value="{{ old('email') }}" required>
  
              @if ($errors->has('email'))
                <span role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>
            <!-- Break -->
            <br>
            <div class="col-12 col-12-medium">
              <input id="password" type="password"  name="password" required>
  
              @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif
            </div>
            <!-- Break -->
            <br>
            <div class="col-12 col-12-medium">
              <input id="password-confirm" type="password" name="password_confirmation" required>
            </div>
            <!-- Break -->
            <br>
            <div class="col-12 col-12-medium mb-0">
              <button type="submit" class="button button-primary">
                {{ __('Register') }}
              </button>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
