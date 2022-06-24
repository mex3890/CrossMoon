<nav id="nav" class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="header">
        <button onclick="sidebar()" id="toggle" style="display:none;color:#fff;background: transparent;border: none;align-self: center">
            <i class='bx bx-menu'></i>
        </button>
        <a class="navbar-logo" href="{{ url('/') }}">
            <img src="{{asset('img/logo.png')}}" alt="@CrossMoon">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul id="ul-links" class="navbar-nav nav-links">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
        </div>
        <div id="div-auth">
            <!-- Right Side Of Navbar -->
            <ul id="ul-auth" class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li id="li-authenticated" class="nav-item dropdown">
                        <i class='bx bxs-bell'></i>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #ffffff" href="#"
                           role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img style="height: 44px" src="{{asset('img/user_n1.png')}}" alt="freePik">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<style>
    .active{
        display: flex!important;
    }
</style>
