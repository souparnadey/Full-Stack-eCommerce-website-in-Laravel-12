<x-layouts.app title="Cart">

<section class="container mx-auto px-6 md:px-12 py-12">

    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800">🛒 Shopping Cart</h1>
        <p class="text-gray-500 mt-2">Review your selected items before checkout.</p>
    </div>

    @if(count($cartItems) > 0)

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- CART ITEMS --}}
        <div class="lg:col-span-2 space-y-6">

            @foreach($cartItems as $item)

            <div class="bg-white rounded-2xl shadow-lg p-5 flex flex-col md:flex-row gap-5">

                <img
                    src="{{ asset(str_replace('public/', '', trim(explode(',', $item->product->image)[0]))) }}"
                    class="w-full md:w-40 h-40 object-cover rounded-xl"
                    alt="{{ $item->product->name }}"
                >

                <div class="flex-1">

                    <h2 class="text-2xl font-semibold text-gray-800">
                        {{ $item->product->name }}
                    </h2>

                    <p class="text-blue-600 text-xl font-bold mt-2">
                        ₹{{ number_format($item->product->price) }}
                    </p>

                    <p class="text-gray-500 mt-3 text-sm">
                        {{ Str::limit($item->product->description, 120) }}
                    </p>

                    {{-- Quantity --}}
                    <div class="flex items-center gap-3 mt-5">

                        <form action="{{ route('cart.update', $item->product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                            <button type="submit"
                               class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-xl">
                                −
                            </button>
                        </form>

                        <span class="font-semibold text-lg">
                            {{ $item->quantity }}
                        </span>

                        <form action="{{ route('cart.update', $item->product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                            <button type="submit"
                               class="w-10 h-10 rounded-lg bg-gray-100 hover:bg-gray-200 flex items-center justify-center text-xl">
                                +
                            </button>
                        </form>

                    </div>

                </div>

                {{-- Total & Remove --}}
                <div class="flex flex-col justify-between items-end">

                    <p class="text-2xl font-bold text-gray-800">
                        ₹{{ number_format($item->product->price * $item->quantity) }}
                    </p>

                    <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">
                            Remove
                        </button>
                    </form>

                </div>

            </div>

            @endforeach

        </div>

        {{-- SUMMARY --}}
        <div>

            <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-24">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">Order Summary</h2>

                <div class="space-y-4">

                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span>₹{{ number_format($subtotal) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="text-green-600">Free</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">GST</span>
                        <span>₹{{ number_format($gst) }}</span>
                    </div>

                    <hr>

                    <div class="flex justify-between text-xl font-bold">
                        <span>Total</span>
                        <span class="text-blue-600">₹{{ number_format($total) }}</span>
                    </div>

                </div>

                <a href="#"
                   class="block text-center mt-6 bg-blue-600 hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-300 text-white font-semibold py-4 rounded-xl transition">
                    Proceed To Checkout →
                </a>

            </div>

        </div>

    </div>

    @else

    <div class="bg-white rounded-2xl shadow-lg p-12 text-center max-w-lg mx-auto">
        <div class="text-7xl mb-4">🛒</div>
        <h2 class="text-3xl font-bold text-gray-800">Your cart is empty</h2>
        <p class="text-gray-500 mt-3">Looks like you haven't added anything yet.</p>
        <a href="/products"
           class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold transition">
            Browse Products
        </a>
    </div>

    @endif

</section>

{{-- Footer --}}
<footer class="text-center bg-blue-700 text-white py-4 mt-12">
    <p class="text-sm">&copy; 2025  eComm Solutions | Developed by <a href="https://github.com/souparnadey" target="_blank" class="hover:underline">Souparna Dey</a> | All Rights Reserved.</p>
</footer>

</x-layouts.app>