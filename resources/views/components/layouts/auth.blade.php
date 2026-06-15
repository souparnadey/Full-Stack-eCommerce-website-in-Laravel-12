{{-- resources/views/components/layouts/auth.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'eCom' }}</title>
  <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Bitcount+Single:wght@100..900&display=swap');
    
    /* Full background */
    body {
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background: url('{{ asset("images/auth_bg.jpg") }}') no-repeat center center/cover;
      position: relative;
    }

    /* Dark overlay for readability */
    body::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0, 0, 0, 0.45);
      z-index: 0;
    }

    /* Make sure content appears above overlay */
    .content-wrapper {
      position: relative;
      z-index: 1;
      flex-grow: 1;
      display: flex;
      flex-direction: column;
    }

    /* Glassmorphism card */
    .auth-card {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 16px;
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      padding: 28px;
      width: 100%;
      max-width: 390px;
      color: #fff;
    }

    .auth-card input,
    .auth-card select {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      border-radius: 8px;
      color: #fff;
    }

    .auth-card input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    /* Fix button to be Bootstrap blue */
    .auth-card .btn-primary {
      background-color: #0d6efd;
      border: none;
      font-weight: bold;
      box-shadow: 0 4px 10px rgba(13, 110, 253, 0.4);
    }

    .auth-card .btn-primary:hover {
      background-color: #0b5ed7;
    }

    /* Links inside card (login/register) */
    .auth-card a {
      color: #0d6efd;
      font-weight: 600;
      text-decoration: none;
    }

    .auth-card a:hover {
      color: #0b5ed7;
      text-decoration: underline;
    }

    /* Navbar transparent */
    .navbar-dark {
      background: rgba(0, 0, 0, 0.7) !important;
    }
  </style>

  @livewireStyles
</head>
<body>
  <div class="content-wrapper">

  <!-- Dark navbar -->
  <nav class="navbar navbar-dark">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-decoration-none">
          <img src="{{ asset('images/logo2.png') }}" alt="Logo" style="height:32px; width:32px; object-fit:contain;">
          <span class="text-white" style="font-family: 'Bitcount Single', sans-serif; font-weight: 350; font-size: 25px;">eComm</span>
      </a>
      <ul class="navbar-nav d-flex flex-row gap-3">
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('contact') }}">Contact us</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="{{ route('about') }}">About us</a></li>
      </ul>
    </div>
  </nav>


    <!-- Slot content -->
    <main class="flex-grow-1 d-flex align-items-center justify-content-center" style="padding: 48px 0;">
      {{ $slot }}
    </main>

  </div>

  @livewireScripts
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
