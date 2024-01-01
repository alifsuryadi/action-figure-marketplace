<nav
    class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down"
    >
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="/images/logo.svg" alt="Logo" />
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item  {{ (request()->is('categories*')) ? 'active' : '' }}">
                    <a href="{{ route('categories') }}" class="nav-link">Categories</a>
                </li>
                <li class="nav-item  {{ (request()->is('/rewards*')) ? 'active' : '' }}" >
                    <a href="#" class="nav-link">Rewards</a>
                </li>

                {{-- Jika belum login --}}
                @guest
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a
                        href="{{ route('login') }}"
                        class="nav-link btn btn-success px-4 text-white"
                        >Sign In
                        </a>
                    </li>
                @endguest

            </ul>

            {{-- Jika sudah login --}}
            @auth
            
            <!-- Desktop -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a
                    href="#"
                    class="nav-link"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    >
                        <img
                            src="/images/profile-picture.png"
                            alt="Profile picture"
                            class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, {{ Auth::user()->name }}

                        <div class="dropdown-menu">

                            {{-- IF --}}
                            @php
                                $user_roles = Auth::user()->roles;
                            @endphp

                            @if ($user_roles == 'USER')
                                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>    
                            @else
                                <a href="{{ url('/admin') }}" class="dropdown-item">Admin</a>
                                <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endif

                            <a href="{{ route('dashboard-settings-account') }}" class="dropdown-item"
                                >Setting</a
                            >
                            <div class="dropdown-divider"></div>
                            <a href=href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" 
                                class="dropdown-item">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">

                        @php
                            $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        @endphp

                        @if ($carts > 0)
                            <img src="/images/icon-filled-cart.svg" alt="" />
                            <div class="card-badge">{{ $carts }}</div>
                        @else
                            <img src="/images/icon-empty-cart.svg" alt="" />
                        @endif
                        
                    </a>
                </li>
            </ul>

            <!-- Phone -->
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="{{ route('dashboard-settings-account') }}" class="nav-link">Hi, {{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block">Cart</a>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                    Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>