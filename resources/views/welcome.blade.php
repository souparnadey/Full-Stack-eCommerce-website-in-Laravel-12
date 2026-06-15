{{-- resources/views/welcome.blade.php --}}
<x-layouts.app title="eComm">

  {{-- Hero Section --}}
  <x-hero
    heading="Unbeatable Deals, Endless Choices"
    tagline="Your one-stop shop for quality products at the best prices."
    buttonText="Shop Now"
    buttonLink="/products"
    image="{{ asset('images/hero_banner_bg.jpg') }}"
  />

  {{-- Small Banners --}}
  <section class="container mx-auto py-13 px-7 grid md:grid-cols-3 gap-5">
    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 p-6 rounded-xl shadow-lg text-center font-bold text-xl hover:scale-105 transition">
      🎉 Mega Sale - Up to 50% Off
    </div>
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white p-6 rounded-xl shadow-lg text-center font-bold text-xl hover:scale-105 transition">
      🚚 Free Shipping on Orders Over ₹999
    </div>
    <div class="bg-gradient-to-r from-pink-500 to-red-500 text-white p-6 rounded-xl shadow-lg text-center font-bold text-xl hover:scale-105 transition">
      🛒 Limited Time: Buy 3 Get 1 Free
    </div>
  </section>

  {{-- Sale Banner Image --}}
  <section class="container mx-auto my-10 px-0">
    <a href="/products">
      <div class="overflow-hidden shadow-lg hover:scale-105 transition transform">
        <img src="{{ asset('images/sale_banner3.jpg') }}" 
           alt="E-commerce Sale Banner" 
           class="w-full h-auto">
      </div>
    </a>
  </section>

  {{-- Sale Announcement Video --}}
  <section class="container mx-auto my-2 px-20">
    <div class="rounded-xl overflow-hidden shadow-xl">
      <video autoplay loop muted playsinline class="w-full rounded-xl">
        <source src="{{ asset('videos/sale-announcement.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
  </section>

  {{-- Featured Skin Care --}}
  <section class="container mx-auto my-15 px-15">
    <h2 class="text-3xl font-bold text-center">Featured Skin Care Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
      <x-product-card id="7" image="products/facecream.jpg" title="Lorem Ipsum Face Cream" price="650" />
      <x-product-card id="8" image="products/allinoneset.jpg" title="Lorem Ipsum All In One Cosmetic Set" price="1,450" />
      <x-product-card id="9" image="products/aloevera.jpg" title="Lorem Ipsum Aloe Vera Cream & Gel Set" price="2,200" />
    </div>
  </section>

  {{-- Sale Banner Image (Clickable) --}}
  <section class="container mx-auto my-10 px-20">
    <a href="/products">
      <div class="rounded-xl overflow-hidden shadow-lg hover:scale-105 transition transform">
        <img src="{{ asset('images/sale_banner.jpg') }}" 
           alt="E-commerce Sale Banner" 
           class="w-full h-auto rounded-xl">
      </div>
    </a>
  </section>

  {{-- Featured Grooming --}}
  <section class="container mx-auto my-15 px-15">
    <h2 class="text-3xl font-bold text-center">Featured Men's Grooming</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
      <x-product-card id="2" image="products/facewash.jpg" title="Premium Charcoal Facewash" price="449" />
      <x-product-card id="11" image="products/trimmer1.jpg" title="Trimmer" price="1,499" />
      <x-product-card id="5" image="products/Mgroom3.jpg" title="Premium Shaving Kit" price="750" />
    </div>
  </section>

  {{-- Electronics Gadgets --}}
  <section class="container mx-auto my-15 px-15">
    <h2 class="text-3xl font-bold text-center">Featured Electronics Gadgets</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
      <x-product-card id="4" image="products/headset.jpg" title="Headset" price="5,010" />
      <x-product-card id="15" image="products/smartwatch.jpg" title="Smart Watch" price="4,990" />
      <x-product-card id="12" image="products/earbuds.jpg" title="Earbuds" price="4,450" />
    </div>
  </section>

  {{-- Sale Banner Image --}}
  <section class="container mx-auto my-10 px-0">
    <a href="/products">
      <div class="overflow-hidden shadow-lg hover:scale-105 transition transform">
        <img src="{{ asset('images/sale_banner2.jpg') }}" 
           alt="E-commerce Sale Banner" 
           class="w-full h-auto">
      </div>
    </a>
  </section>

  {{-- Best Sellers --}}
  <section class="container mx-auto my-15 px-15">
    <h2 class="text-3xl font-bold text-center">Our Best Selling Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
      <x-product-card id="12" image="products/sneaker9.png" title="Sneakers" price="6,910" />
      <x-product-card id="2" image="products/facewash.jpg" title="Premium Charcoal Facewash" price="449" />
      <x-product-card id="9" image="products/aloevera.jpg" title="Aloe Vera Cream & Gel Set" price="2,200" />
    </div>
  </section>

  {{-- Why Choose Us --}}
  <section class="text-center bg-gray-800 text-white py-16 px-4">
      <h2 class="text-3xl font-bold">Why Choose Us?</h2>
      <p class="mt-4 text-lg opacity-90">
          ✔️ Best Prices ✔️ High-Quality Products ✔️ Fast Delivery ✔️ Trusted by 10,00,000+ Customers
      </p>
      <a href="/products" class="mt-6 inline-block px-6 py-3 bg-yellow-400 text-gray-900 font-semibold rounded-lg shadow-lg hover:bg-yellow-500 transition">
          Start Shopping
      </a>
      <br><br>
      <div class="flex items-center justify-center gap-3 mt-6">
          <img src="{{ asset('images/logo2.png') }}" alt="Logo" class="h-13 w-13 object-contain">
          <span style="font-family: 'Bitcount Single', sans-serif; font-weight: 350; font-size: 32px;">eComm Solutions</span>
      </div>
      <p style="font-family: sans-serif; font-size: 12px;">The One Stop Shop</p>
  </section>

  {{-- Footer --}}
  <footer class="text-center bg-blue-700 text-white py-6 mt-0">
    <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
  </footer>

</x-layouts.app>
