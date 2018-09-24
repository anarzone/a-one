<!-- Header -->
<header id="header" class="alt">
  <a href="{{ url('/') }}" class="logo"><strong>A-One</strong> <span>opinions for sharing</span></a>
  <nav>
    <a href="#menu">Menu</a>
  </nav>
</header>

<nav id="menu">
<!-- Menu -->
  <ul class="links">
    <li><a href="dashboard">Dashboard</a></li>
  </ul>
  <ul class="actions stacked">
    @guest
      <li>
        <a class="button primary" href="{{ route('login') }}" class="button fit">{{ trans('login.login') }}</a>
      </li>
      <li>
        <a class="button" href="{{ route('register') }}">{{ trans('register.register') }}</a>
      </li>
    @else
      <li>
        {{ Auth::user()->name }}
      </li>
      <li>
        {{-- <a href="{{ route('logout') }}"
          onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a> --}}
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          <button class="button small">{{ trans("login.logout")}}</button>
          @csrf
        </form>
      </li>
    @endguest
    <li>
      <select name="locale" id="locale" onchange="locale()">
        <option value="az">Az</option>
        <option value="en">En</option>
      </select>
    </li>
  </ul>
</nav>