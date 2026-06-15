{{-- resources/views/components/hero.blade.php --}}
@props([
  'heading' => 'Welcome to  eCom.com',
  'tagline' => 'Best products at unbeatable prices.',
  'buttonText' => 'Shop Now',
  'buttonLink' => '/products',
  'image' => null, {{-- optional background image --}}
])

<header class="relative w-full h-[550px] flex items-center justify-center text-center text-white overflow-hidden">
  
  {{-- Background Image --}}
  @if ($image)
    <div class="absolute inset-0">
      <img src="{{ $image }}" alt="Hero Banner" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/30"></div>
    </div>
  @else
    <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-600"></div>
  @endif

  {{-- Content --}}
  <div class="relative z-10 px-6 max-w-3xl">
    <h1 class="text-4xl md:text-6xl font-extrabold drop-shadow-lg">
      {{ $heading }}
    </h1>
    <p class="mt-4 text-lg md:text-xl opacity-90">
      {{ $tagline }}
    </p>
    <a href="{{ $buttonLink }}"
       class="mt-6 inline-block px-8 py-3 bg-yellow-400 text-gray-900 font-semibold rounded-lg shadow-lg hover:scale-105 hover:bg-yellow-500 transition transform">
      {{ $buttonText }}
    </a>
  </div>
</header>
