@extends('layouts.app')

@section('content')

<div id="main"> {{-- Main content --}}
  <section id="one">
    <div class="inner">
      <div class="col-6 col-12-medium">
        <div>
          <h2 id="content"> {{ trans("login.login") }} </h2>
        </div>
        <form method="POST" action="{{ route('login') }}" aria-label="{{ trans("login.login") }}">
          @csrf
          <div class="row gtr-uniform">
            <div class="aln-center col-6 col-12-medium">
              <div class="col-12 col-12-medium">
                  <label for="email">{{ trans('login.email') }}</label>
                  <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" {{-- <-- add class is-invalid --}}
                    name="email" value="{{ old('email') }}">
                </div>
                @if ($errors->has('email'))
                  <span role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
    
              
                <div class="col-12 col-12-medium">
                  <label for="password" >{{ trans('login.password')  }}</label>
                  <input id="password" type="password" 
                    class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"> {{-- <-- add class is-invalid --}}
                </div>
              
                @if ($errors->has('password'))
                  <span role="alert">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
                  <div class="col-6 col-12-small">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                      {{ trans("login.rememberme")  }}
                    </label>
                  </div>
                  <ul class="actions">
                    <li>
                      <input type="submit" value="{{ trans('login.login')  }}">
                    </li>
                  </ul>
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ trans("login.forgot")  }}
                  </a>                    
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div> {{-- /Main Content  --}}

       
@endsection
