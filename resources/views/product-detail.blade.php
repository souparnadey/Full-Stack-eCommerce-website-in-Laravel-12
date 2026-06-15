<x-layouts.app title="{{ $product->name }}">

    <section class="container mx-auto my-12 px-6 md:px-12">

        <div class="flex flex-col md:flex-row gap-8 items-stretch ">

            {{-- LEFT: Images (no card, just floating) --}}
            <div class="md:w-1/3 flex flex-col gap-3">

                {{-- Main Image --}}
                <img
                    id="mainImage"
                    src="{{ asset(str_replace('public/', '', trim($images[0]))) }}"
                    alt="{{ $product->name }}"
                    class="w-full h-96 object-cover rounded-2xl shadow-md"
                >

                {{-- Thumbnails (only if more than 1 image) --}}
                @if(count($images) > 1)
                    <div class="flex gap-3 flex-wrap">
                        @foreach($images as $img)
                            <img
                                src="{{ asset(str_replace('public/', '', trim($img))) }}"
                                alt="{{ $product->name }}"
                                onclick="document.getElementById('mainImage').src = this.src"
                                class="w-20 h-20 object-cover rounded-xl border-2 border-transparent hover:border-blue-500 cursor-pointer transition-all duration-200 shadow-sm"
                            >
                        @endforeach
                    </div>
                @endif

            </div>

            {{-- RIGHT: Details card --}}
            <div class="md:w-2/3 bg-white rounded-2xl shadow-lg p-8 flex flex-col gap-5 h-350px">

                {{-- Name --}}
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>

                {{-- Price --}}
                <p class="text-3xl font-bold text-blue-600">₹{{ number_format($product->price) }}</p>

                {{-- Stock Status --}}
                <div>
                    @if($product->stock == 0)
                        <span class="text-red-600 font-semibold text-lg">Out Of Stock ‼️</span>
                    @elseif($product->stock == 1)
                        <span class="text-red-600 font-semibold text-lg">Hurry ‼️ Only One Left</span>
                    @elseif($product->stock <= 5)
                        <span class="text-red-500 font-semibold text-lg">Very Few Left ‼️</span>
                    @else
                        <span class="text-green-600 font-semibold text-lg">In Stock ✅</span>
                    @endif
                </div>

                {{-- Description --}}
                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>

                {{-- Add to Cart --}}
                @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-4 inline-block px-6 py-3 cursor-pointer
                                   bg-gradient-to-r from-blue-500 to-indigo-600
                                   text-white rounded-lg font-medium text-lg
                                   shadow-md hover:shadow-lg hover:scale-105
                                   transition transform duration-300 ease-in-out
                                   hover:from-indigo-600 hover:to-blue-500
                                   active:scale-95">
                            🛒 Add to Cart
                        </button>
                    </form>
                @else
                    <button disabled class="bg-gray-300 text-gray-500 font-semibold py-3 px-10 rounded-xl text-lg cursor-not-allowed w-fit">
                        🛒 Add to Cart
                    </button>
                @endif
            </div>
        </div>

    </section>

    {{-- Footer --}}
    <footer class="text-center bg-blue-700 text-white py-6 mt-12">
        <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
    </footer>

</x-layouts.app>