<div class="p-10">
    <h1 class="text-3xl font-bold text-center mb-8 text-blue-800">🛒 Admin Product Manager</h1>

    <!-- Flash Message -->
    @if (session('success'))
        <div class="mb-6 text-center text-green-700 bg-green-100 border border-green-400 rounded-lg py-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Product Form -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-10 max-w-3xl mx-auto">
        <h2 class="text-xl font-semibold mb-4">
            {{ $editingProduct ? '✏️ Edit Product' : '➕ Add New Product' }}
        </h2>

        <form wire:submit.prevent="save" class="space-y-4">
            <input type="text" wire:model="name" placeholder="Product Name" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300" />

            <textarea wire:model="description" placeholder="Description (optional)" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300"></textarea>

            <input type="number" wire:model="price" placeholder="Price" step="0.01" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300" />

            <input type="number" wire:model="stock" placeholder="Stock" class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300" />

            <input type="file" wire:model="image" class="w-full border rounded-lg p-2" />

            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-6 py-2 rounded-lg shadow-md transition">
                {{ $editingProduct ? 'Update Product' : 'Add Product' }}
            </button>

            @if ($editingProduct)
                <button type="button" wire:click="resetForm" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">
                    Cancel
                </button>
            @endif
        </form>
    </div>

    <!-- Product Table -->
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl">
        <table class="min-w-full text-center border-collapse">
            <thead class="bg-blue-900 text-white">
                <tr>
                    <th class="py-3 px-4">Image</th>
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Description</th>
                    <th class="py-3 px-4">Price (₹)</th>
                    <th class="py-3 px-4">Stock</th>
                    <th class="py-3 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="border-b hover:bg-gray-100 transition">
                        <td class="py-3">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg mx-auto">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>
                        <td class="font-semibold">{{ $product->name }}</td>
                        <td class="text-gray-600">{{ $product->description ?? '—' }}</td>
                        <td class="font-semibold text-blue-700">₹{{ number_format($product->price, 2) }}</td>
                        <td>
                            @if ($product->stock == 1)
                                <span class="text-red-600 font-semibold">Hurry, only 1 left‼️</span>
                            @elseif ($product->stock == 2)
                                <span class="text-red-600 font-semibold">Hurry, only 2 left‼️</span>
                            @elseif ($product->stock == 3)
                                <span class="text-red-600 font-semibold">Hurry, only few left‼️</span>
                            @elseif ($product->stock > 3)
                                <span class="text-green-600 font-semibold">In stock ✅</span>
                            @else
                                <span class="text-gray-500 font-semibold">Out of stock ❌</span>
                            @endif
                        </td>
                        <td>
                            <button wire:click="edit({{ $product->id }})" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-lg">Edit</button>
                            <button wire:click="delete({{ $product->id }})" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg ml-2">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-6 text-gray-500">No products yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
