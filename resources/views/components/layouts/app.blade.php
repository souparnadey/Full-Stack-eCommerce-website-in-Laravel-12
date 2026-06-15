<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'eCom' }}</title>
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bitcount+Single:wght@100..900&display=swap');
  </style>
</head>
<body class="bg-gray-100 text-gray-900">

  @if (session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
  @endif

  <!-- Navigation -->
  <nav class="bg-blue-900 px-4 py-2 text-white shadow-md fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center">
      <a href="{{ route('home') }}" class="flex items-center gap-2 text-decoration-none">
        <img src="{{ asset('images/logo2.png') }}" alt="Logo" style="height:32px; width:32px; padding: 0; object-fit:contain;">
        <span style="font-family: 'Bitcount Single', sans-serif; font-weight: 350; font-size: 25px; padding: 0;" fs-5>eComm</span>
      </a>

      <ul class="flex space-x-6 text-lg items-center">
        <!-- Cart Icon -->
        <li>
          <a href="/cart" class="relative group" aria-label="Cart">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 fill="none" viewBox="0 0 24 24" 
                 stroke-width="1.5" stroke="currentColor" 
                 class="w-7 h-7 text-white transition group-hover:text-yellow-300 group-hover:scale-110">
              <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            @if(\App\Models\Cart::count() > 0)
            <span class="absolute -top-2 -right-2 bg-red-600 text-xs text-white px-1.5 py-0.5 rounded-full font-semibold shadow">
              {{ \App\Models\Cart::count() }}
            </span>
            @endif
          </a>
        </li>
        <li><a href="{{ route('products') }}" class="nav-link">Browse</a></li>
        <li><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
        <li><a href="{{ route('about') }}" class="nav-link">About</a></li>

        @guest
          <li><a href="{{ route('login') }}" class="nav-link">Log in</a></li>
          <li>
            <a href="{{ route('register') }}"
               class="glass-button px-5 py-2 rounded-xl text-white font-semibold hover:text-yellow-200">
               Register
            </a>
          </li>
        @endguest

        @auth
        <!-- Admin Dashboard -->
        @if(Auth::user()->role === 'admin')
        <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
        @endif     
        <!-- Logged-in user dropdown -->
        <li class="relative group">
          <button class="flex items-center gap-2 hover:text-blue-400 focus:outline-none">
            👋 Hi, {{ Auth::user()->name }}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <!-- Dropdown Menu -->
          <ul class="absolute right-0 pt-2 w-40 bg-gray-800 rounded-lg shadow-lg hidden group-hover:block">
            <li>
              <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-700 rounded-t-lg">Profile</a>
            </li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700 rounded-b-lg">
                  Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
        @endauth
      </ul>
    </div>
  </nav>

  <main class="container mx-auto pt-10">
    {{ $slot ?? '' }}
  </main>

</body>
</html>
