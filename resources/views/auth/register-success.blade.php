<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Successful 🎉</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col justify-center items-center min-h-screen bg-gradient-to-br from-blue-100 to-blue-300 text-center">

  <div class="bg-white p-10 rounded-2xl shadow-xl max-w-md w-full">
    <h1 class="text-3xl font-bold text-blue-700 mb-4">🎉 Registration Successful!</h1>
    <p class="text-gray-700 mb-6">Welcome aboard, <span class="font-semibold">{{ session('name') ?? 'new user' }}</span>!<br>
      You’re just one step away — please log in to continue. 🚀</p>
    
    <a href="{{ route('login') }}"
       class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition">
       Proceed to Login →
    </a>
  </div>

</body>
</html>
