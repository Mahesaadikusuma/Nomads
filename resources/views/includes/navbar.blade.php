<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{ asset('frontend/image/drawable-ldpi/logo_nomads.png') }}" alt="logo_nomads" />
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link active">Home</a>
                </li>

                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Paket Travel</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbardrop"
                        data-toggle="dropdown">Service</a>

                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                        <a href="#" class="dropdown-item">Link</a>
                    </div>
                </li>

                <li class="nav-item mx-md-2">
                    <a href="#" class="nav-link">Testimonial</a>
                </li>
            </ul>
            <!-- Mobile Button -->

            @guest
                <x-button url='login' classForm='form-inline d-sm-blok d-md-none' class="btn btn-login my-2 my-sm-0"
                    message="Masuk" />
            @endguest

            {{-- <form class="form-inline d-sm-blok d-md-none">
                <button class="btn btn-login my-2 my-sm-0">Masuk</button>
            </form> --}}

            <!-- Desktop Button -->

            @guest
                <x-button url='login' classForm='form-inline my-2 my-lg-0 d-none d-md-block'
                    class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" message="Masuk" />
            @endguest


            @auth

                @if (Auth::user()->roles == 'ADMIN')
                    <x-button url='admin' classForm='form-inline my-2 my-lg-0 d-none d-md-block'
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" message="Dashboard" />
                @else
                    @if (Auth::user()->roles == 'USER')
                        <form action="{{ route('logout') }}" method="post">
                            @csrf

                            <button>logout</button>
                        </form>
                    @endif

                    {{-- <x-button url='dashboard' classForm='form-inline my-2 my-lg-0 d-none d-md-block'
                        class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" message="Dashboard" /> --}}
                @endif

                {{-- <x-button url='admin' classForm='form-inline my-2 my-lg-0 d-none d-md-block'
                    class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" message="Dashboard" /> --}}

            @endauth



        </div>
    </nav>
</div>
