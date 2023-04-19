<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>


      <!-- Boostrap Js -->
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
                  <input class="form-control" type="search" 
                  placeholder="Search" aria-label="Search">
                  <button class="btn d-none d-md-block" type="submit">
                     <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
               </form>
               
               <div class="d-flex justify-content-end">
                  <a href="#" class="link-secondary btn position-relative">
                     <i class="fa-solid fa-cart-shopping fs-5"></i>
                     @auth 
                     <span class="position-absolute top-0 start-100 translate-middle badge 
                     rounded-pill bg-secondary"> 10 
                        <span class="visually-hidden">
                           unread messages
                        </span>
                     </span>
                     @endauth
                  </a>

                  @auth
                  <div>
                     <a class="link-secondary btn" href="{{ route('account') }}">
                        <i class="fa-regular fa-user fs-5"></i>
                     </a>
                  </div>
                  @endauth

                  @auth
                     @if(Auth::user()->role == 'admin')
                     <div>
                        <a class="btn btn-outline-secondary" href="{{ route('admin.dashboard') }}">
                           Admin
                        </a>
                     </div>
                     @endif
                  @endauth

                  @guest
                  <a class="link-secondary btn fs-6" href="{{ route('login') }}">
                     Login
                  </a>
                  <a class="link-secondary btn fs-6" href="{{ route('register') }}">
                     Signup
                  </a>
                  @endguest
               </div>
            </div>
         </nav>
      </section>

      <section class="content" class="d-flex">
         <div class="sidebar bg-light border shadow-sm" id="side_nav">
            <ul class="list-unstyled px-2">
               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Dashboard
                  </a>
               </li>
               <li class="active">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Sliders
                  </a>
               </li>
               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Products
                  </a>
               </li>
               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                     <span><i class="fa-solid fa-chart-line"></i> Orders</span>
                     <span id="pill" class="bg-dark text-white rounded-pill py-0 px-2"> 99+</span>
                  </a>
               </li>
               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Users
                  </a>
               </li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled px-2">
               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Settings
                  </a>
               </li>

               <li class="">
                  <a href="#" class="text-decoration-none px-3 py-2 d-block">
                     <i class="fa-solid fa-chart-line"></i> Notification
                  </a>
               </li>
            </ul>

            <div class="logout d-grid px-3 pb-2">
               <livewire:auth.logout />
            </div>
         </div>

         <div class="d-md-none d-block" id="opn-cls-btn">
            <button class="btn px-1 py-0 open-btn">
               <i class="fa-solid fa-bars-staggered"></i>
            </button>
         </div> 

         <div class="px-4 py-5">
            @yield('content')
         </div>
      </section>
      
      
      <!-- JQuery -->
      <script src="https://code.jquery.com/jquery-3.6.4.js" 
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" 
      crossorigin="anonymous"></script>

      

      <!-- Livewire Scripts -->
      @livewireScripts
   </body>
</html>
