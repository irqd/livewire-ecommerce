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
   <body class="bg-light">
      <section id="nav" class="container-fluid py-3">
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
               <div class="">
                  <a class="navbar-brand fs-3" href="/">
                     <span class="bg-dark text-white rounded shadow px-2 me-2">B&D</span>
                     <span>Ecommerce</span>
                     <span class="text-capitalize fw-bold">
                        {{ request()->route()->getName() }}
                     </span>
                  </a>
               </div>
            </div>
         </nav>
      </section>
      
      @yield('content')

      
      <!-- Boostrap Js -->
      @vite(['resources/js/app.js'])

      <!-- Livewire Scripts -->
      @livewireScripts
   </body>
</html>