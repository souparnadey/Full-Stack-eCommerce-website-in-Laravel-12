{{-- resources/views/about.blade.php --}}
<x-layouts.app title="About Us">
  <div class="max-w-6xl mx-auto py-16 px-6 space-y-16">

    <!-- Hero Section -->
    <div class="grid md:grid-cols-2 gap-10 items-center">
      
      <!-- Text Content -->
      <div>
        <h1 class="text-4xl font-extrabold mb-6">
          About <span class="text-blue-600"> eComm Solutions</span>
        </h1>
        <p class="text-lg text-gray-700 mb-4">
          We built <strong> eComm Solutions</strong> to bring you great products at unbeatable prices. 
          Fast delivery, friendly returns, and a team that truly cares.
        </p>
        <p class="text-gray-600 mb-6">
          Our mission is simple: make everyday shopping joyful and leave every customer with a smile.  
          This page is just a placeholder for now — feel free to add your story, vision, or team details here.
        </p>
        
        <a href="/contact" 
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-lg transition">
          Contact Us
        </a>
      </div>

      <!-- Image -->
      <div class="flex justify-center">
        <img src="{{ asset('images/about.jpg') }}" 
             alt="About" 
             class="rounded-2xl shadow-lg w-full max-w-md md:max-w-lg object-cover">
      </div>
    </div>

    <!-- Values / Features Section -->
    <div class="text-center">
      <h2 class="text-3xl font-bold mb-8">Why Choose <span class="text-blue-600">Us</span>?</h2>
      
      <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Feature 1 -->
        <div class="bg-white bg-opacity-70 backdrop-blur-lg rounded-2xl shadow-lg p-8 transition hover:scale-105">
          <div class="text-blue-600 text-5xl mb-4">🚚</div>
          <h3 class="text-xl font-semibold mb-2">Fast Delivery</h3>
          <p class="text-gray-600">Get your orders delivered quickly with our trusted shipping partners.</p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white bg-opacity-70 backdrop-blur-lg rounded-2xl shadow-lg p-8 transition hover:scale-105">
          <div class="text-blue-600 text-5xl mb-4">💳</div>
          <h3 class="text-xl font-semibold mb-2">Secure Payments</h3>
          <p class="text-gray-600">Shop with confidence using safe and encrypted payment options.</p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white bg-opacity-70 backdrop-blur-lg rounded-2xl shadow-lg p-8 transition hover:scale-105">
          <div class="text-blue-600 text-5xl mb-4">😊</div>
          <h3 class="text-xl font-semibold mb-2">Happy Customers</h3>
          <p class="text-gray-600">Thousands of satisfied customers trust us for their shopping needs.</p>
        </div>
      </div>
    </div>
  </div>
  {{-- Footer --}}
  <footer class="text-center bg-blue-700 text-white py-6 mt-0">
    <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
  </footer>
</x-layouts.app>
