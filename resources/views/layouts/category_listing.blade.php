<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" 
      rel="stylesheet" />
      
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

      <!-- Boostrap Css -->
      @vite(['resources/css/app.css'])

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
                  <a href="#" class="link-dark btn position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cart">
                     <i class="fa-solid fa-cart-shopping fs-5"></i>
                     @auth 
                     <span class="position-absolute p-1 top-0 start-100 translate-middle badge 
                     rounded-pill bg-danger">10 
                        <span class="visually-hidden">
                           on cart
                        </span>
                     </span>
                     @endauth
                  </a>

                  @auth
                  <div>
                     <a class="link-dark btn" href="{{ route('account') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Account">
                        <i class="fa-regular fa-user fs-5"></i>
                     </a>
                  </div>
                  @endauth

                  @auth
                     @if(Auth::user()->role == 'admin')
                     <div>
                        <a class="btn btn-outline-dark" href="{{ route('admin.dashboard') }}">
                           Admin
                        </a>
                     </div>
                     @endif
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

      <section class="content" class="d-flex">
         <div class="sidebar bg-light border shadow-sm" id="side_nav">
            <div class="px-2 pt-5">
               <div class="card bg-body border-0">
                  <div class="card-body">
                     <div class="card-title">
                        <h6 class="fw-bold">Brands</h6>
                     </div>

                  </div>
               </div>
            </div>

            <hr class="h-color mx-2">

            <div class="px-2">
               <div class="card bg-body border-0">
                  <div class="card-body">
                     <div class="card-title">
                        <h6 class="fw-bold">Sort by price</h6>
                     </div>
                     
                     <div class="d-flex justify-content-between">
                        <div class="">
                           <input type="number" wire:model="min_price" class="form-control">
                           {{-- <label for="name" class="form-label fw-bold">Brand </label>
                           <input type="text" class="form-control @error('name') is-invalid  @enderror
                           @if($name) '' @endif"
                           id="name" placeholder="Brand Name"
                           wire:model.debounce.500ms="name">
                           @error('name') 
                           <small class="text-danger">{{ $message }}</small>
                           @enderror --}}
                        </div>

                        <div class="px-2 pt-1">
                           <span>
                              <i class="fa-solid fa-minus"></i>
                           </span>
                        </div>

                        <div class="">
                           <input type="number"  wire:model="max_price" class="form-control">
                        </div>
                     </div>

                  </div>
               </div>
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

      <!-- Boostrap Js -->
      @vite(['resources/js/app.js'])

      <!-- Livewire Scripts -->
      @livewireScripts
   </body>
</html>
