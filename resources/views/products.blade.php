<x-layouts.app title="Products">

    <section class="container mx-auto my-15 px-20">
        <h2 class="text-3xl font-bold text-center">Our Products</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mt-8">
            @forelse ($products as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                    <img
                        src="{{ asset(str_replace('public/', '', explode(',', $product->image)[0])) }}"
                        alt="{{ $product->name }}"
                        class="w-full h-64 object-cover"
                    >
                    <div class="p-5 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="text-xl font-bold text-gray-700 mt-1">₹{{ number_format($product->price) }}</p>
                        <a href="{{ route('product.show', $product->id) }}"
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
            @empty
                <p class="text-center col-span-3">No products found.</p>
            @endforelse
        </div>
    </section>

    {{-- Footer --}}
    <footer class="text-center bg-blue-700 text-white py-6 mt-0">
        <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
    </footer>

</x-layouts.app>