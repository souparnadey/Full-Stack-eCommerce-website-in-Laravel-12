{{-- resources/views/components/product-card.blade.php --}}
@props([
  'id',
  'image',
  'title',
  'price',
  'badge' => null, {{-- optional: "Sale", "New", "Hot" --}}
])

<div class="bg-white rounded-xl shadow-md overflow-hidden transform hover:scale-105 hover:shadow-xl transition relative">
  
  {{-- Badge --}}
  @if($badge)
    <span class="absolute top-3 left-3 bg-red-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow">
      {{ $badge }}
    </span>
  @endif

  {{-- Image --}}
  <div class="overflow-hidden">
    <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}"
         class="w-full h-56 object-cover transform hover:scale-110 transition duration-500">
  </div>

  {{-- Content --}}
  <div class="p-5 text-center">
    <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $title }}</h3>
    <p class="text-gray-600 font-medium text-xl mt-2">₹{{ $price }}</p>
    
    {{-- Modern Buy Now Button --}}
    <a href="{{ route('product.show', $id) }}"
       class="mt-4 inline-block px-6 py-2 
              bg-gradient-to-r from-blue-500 to-indigo-600 
              text-white rounded-lg font-medium 
              shadow-md hover:shadow-lg hover:scale-105 
              transition transform duration-300 ease-in-out
              hover:from-indigo-600 hover:to-blue-500">
      Buy Now
    </a>
  </div>
</div>
