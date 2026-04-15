@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">POS Inventory</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Dashboard</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Add Product Form -->
        <div class="lg:col-span-1">
            <div class="glass p-8 rounded-3xl sticky top-32">
                <h2 class="text-2xl font-bold mb-6">Add New Product</h2>
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Product Name</label>
                        <input type="text" name="name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">SKU</label>
                        <input type="text" name="sku" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2">Price ($)</label>
                            <input type="number" step="0.01" name="price" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-400 mb-2">Stock</label>
                            <input type="number" name="stock" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Product Image</label>
                        <input type="file" name="image" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-bold transition shadow-lg shadow-indigo-600/20">
                        Add to Inventory
                    </button>
                </form>
            </div>
        </div>

        <!-- Inventory Table -->
        <div class="lg:col-span-2">
            <div class="glass rounded-3xl overflow-hidden">
                <div class="p-8 border-b border-white/10 flex justify-between items-center">
                    <h2 class="text-2xl font-bold">Current Stock</h2>
                    <span class="text-gray-500 text-sm">{{ $products->total() }} Products total</span>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5">
                            <th class="px-8 py-4">Product</th>
                            <th class="px-8 py-4">SKU</th>
                            <th class="px-8 py-4">Price</th>
                            <th class="px-8 py-4">Stock</th>
                            <th class="px-8 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition">
                            <td class="px-8 py-4 flex items-center">
                                @if($product->image)
                                    <img src="{{ $product->image }}" class="w-10 h-10 rounded-lg object-cover mr-4" alt="{{ $product->name }}">
                                @else
                                    <div class="w-10 h-10 bg-indigo-600/20 rounded-lg flex items-center justify-center mr-4 text-indigo-400">P</div>
                                @endif
                                <div class="font-bold">{{ $product->name }}</div>
                            </td>
                            <td class="px-8 py-4 text-gray-400 font-mono text-xs">{{ $product->sku }}</td>
                            <td class="px-8 py-4 font-bold">${{ number_format($product->price, 2) }}</td>
                            <td class="px-8 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $product->stock < 10 ? 'bg-red-600/20 text-red-400' : 'bg-green-600/20 text-green-400' }}">
                                    {{ $product->stock }} in stock
                                </span>
                            </td>
                            <td class="px-8 py-4 text-indigo-400 hover:text-indigo-300 cursor-pointer">Edit</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-8">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
