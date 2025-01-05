<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container mt-2 mb-2">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            {{ config('app.name', 'Connect Friend') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
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
                <div class="d-flex align-items-center" style="gap: 10px">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view-shop') }}">{{ __('Shop') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('topup-coins') }}">{{ __('Top Up Coins') }}</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" style="text-decoration: none; color:black " href="#">
                            <span>Coins: </span> {{ Auth::user()->coins }}
                        </a>
                    </li>
                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('visible-setting') }}">
                                {{ __('Visible') }}
                            </a>

                            <hr class="mt-1 mb-1">
                            
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
                </div>
                
                @endguest
            </ul>
        </div>
    </div>
</nav>