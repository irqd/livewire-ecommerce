<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <meta name="keywords" content="@yield('meta_keywords','')">
    <meta name="description" content="@yield('meta_description','')">
    <link rel="canonical" href="{{url()->current()}}"/>

    @vite(['resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles
</head>

<body>
    <section id="nav" class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-light p-3 shadow-sm">
            <div class="container-fluid">
                <div class="d-none d-sm-block">
                    <a class="navbar-brand fs-3" href="/">
                        <span class="bg-dark text-white rounded shadow px-2 me-2">B&D</span>
                        <span>Ecommerce</span>
                    </a>
                </div>

                <form id="search" class="d-flex w-50" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search products..." aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <div class="d-flex justify-content-end">
                  <a href="{{ route('index') }}"
                        class="link-dark btn position-relative py-2 px-1" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" data-bs-title="Home">
                        <i class="fa-solid fa-home fs-5"></i>

                    </a>
                    <a href="@auth {{ route('main.cart') }} @endauth
                                    @guest {{ route('login') }} @endguest"
                        class="link-dark btn position-relative py-2 px-1" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" data-bs-title="Cart">
                        <i class="fa-solid fa-cart-shopping fs-5"></i>
                        @auth
                            @if (optional(Auth::user()->shoppingCart)->stocks)
                                <span
                                    class="position-absolute p-1 top-0 start-100 translate-middle badge 
                                       rounded-pill bg-danger">
                                    {{ Auth::user()->shoppingCart->stocks->count() }}
                            @endif

                            <span class="visually-hidden">
                                on cart
                            </span>
                            </span>
                        @endauth
                    </a>

                    @auth
                    
                        <div class="btn-group dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center"
                                id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-circle"
                                    height="24" alt="Portrait of a Woman" loading="lazy" /> --}}

                                <livewire:components.image-view image='{{ Auth::user()->image }}' className='rounded-circle' height="24" alt="Portrait of a Woman" loading="lazy" isProfile='true'>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">

                                @if (Auth::check() and Auth::user()->role == 'admin')
                                    <li>
                                       <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-toolbox fs-5"></i>Admin</a>
                                   </li>
                                @endif
                              
                                <li>
                                 <a  class="dropdown-item" href="{{ route('account') }}"> <i class="fa-regular fa-user fs-5"></i>My Account</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                 <livewire:auth.logout />
                                </li>
                                
                            </ul>
                        </div>
                    @endauth
                    @guest
                        <a class="link-secondary py-2 px-1 fs-6 text-decoration-none auth" href="{{ route('login') }}">
                            Login
                        </a>
                        <span class="text-secondary py-2 px-1 fs-6">|</span>
                        <a class="link-secondary py-2 px-1 fs-6 text-decoration-none auth" href="{{ route('register') }}">
                            Signup
                        </a>
                    @endguest
                </div>
            </div>
        </nav>
    </section>


    @yield('content')


    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>



    <!-- Livewire Scripts -->
    @livewireScripts
</body>

</html>
