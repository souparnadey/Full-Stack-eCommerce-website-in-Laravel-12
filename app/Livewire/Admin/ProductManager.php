<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductManager extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $stock, $image;
    public $editingProduct = null;

    public function render()
    {
        $products = Product::latest()->get();

        return view('livewire.admin.product-manager', compact('products'))
            ->layout('components.layouts.app', ['title' => 'Admin Panel']);
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'stock', 'image', 'editingProduct']);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => $this->editingProduct ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        // If editing, remove old image (optional)
        if ($this->editingProduct && $this->image) {
            Storage::disk('public')->delete($this->editingProduct->image);
        }

        $imagePath = $this->image
            ? $this->image->store('products', 'public')
            : ($this->editingProduct->image ?? null);

        Product::updateOrCreate(
            ['id' => $this->editingProduct?->id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'stock' => $this->stock,
                'image' => $imagePath,
            ]
        );

        session()->flash(
            'success',
            $this->editingProduct ? '✅ Product updated successfully!' : '🎉 Product added successfully!'
        );

        $this->resetForm();
    }

    public function edit(Product $product)
    {
        $this->editingProduct = $product;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock = $product->stock;
    }

    public function delete(Product $product)
    {
        // Optional: delete image from storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        session()->flash('success', '🗑️ Product deleted successfully!');
    }
}
