<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary">
            <img style="height: 40px;" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span>Prasad</span>
        </h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Services</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="{{ url('/service/wash') }}" class="dropdown-item">Car Wash</a>
                    <a href="{{ url('/service/alignment') }}" class="dropdown-item">Car Alignment</a>
                </div>
            </div>
            <a href="{{ url('/about') }}" class="nav-item nav-link {{ Request::is('about') ? 'active' : '' }}">About</a>
            <a href="{{ url('/contact') }}"
                class="nav-item nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact</a>
            @guest
                @if (Route::has('login'))
                    <a class="nav-item nav-link {{ Request::is('login') ? 'active' : '' }}"
                        href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="nav-item nav-link {{ Request::is('register') ? 'active' : '' }}"
                        href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="nav-item dropdown bg-primary">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
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
                </div>
            @endguest
        </div>

        {{-- <div class="dropdown bg-primary py-4 px-4">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu fade-up m-0">
                <a href="booking.html" class="dropdown-item">Booking</a>
                <a href="team.html" class="dropdown-item">Technicians</a>
                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                <a href="404.html" class="dropdown-item">404 Page</a>
            </div>
        </div> --}}
    </div>
</nav>
