@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Event Rental Services</h1>
        <button onclick="document.getElementById('add-service-modal').classList.remove('hidden')" class="px-6 py-3 bg-indigo-600 rounded-full hover:bg-indigo-700 transition font-bold shadow-lg shadow-indigo-600/20">
            + Add New Service
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass rounded-3xl overflow-hidden border border-white/10">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white/5 border-b border-white/10 text-gray-400 text-sm uppercase tracking-wider">
                    <th class="px-8 py-4 font-normal">Name</th>
                    <th class="px-8 py-4 font-normal">Category</th>
                    <th class="px-8 py-4 font-normal">Price</th>
                    <th class="px-8 py-4 font-normal text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="px-8 py-4">
                        <p class="font-bold">{{ $service->name }}</p>
                        <p class="text-xs text-gray-500">{{ Str::limit($service->description, 50) }}</p>
                    </td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 bg-indigo-600/10 text-indigo-400 rounded-full text-xs font-bold">{{ $service->category }}</span>
                    </td>
                    <td class="px-8 py-4">
                        <p class="font-bold">{{ number_format($service->price, 2) }} KES</p>
                        <p class="text-xs text-gray-500">per {{ $service->unit }}</p>
                    </td>
                    <td class="px-8 py-4 text-right">
                        <form action="{{ route('admin.event-services.destroy', $service->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500/50 hover:text-red-500 transition" onclick="return confirm('Delete this service?')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-12 text-center text-gray-500 italic">No event services found. Add your first one above!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add Service Modal -->
    <div id="add-service-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] flex items-center justify-center hidden">
        <div class="glass w-full max-w-lg rounded-3xl overflow-hidden border border-white/10 shadow-2xl">
            <div class="p-8 border-b border-white/10 flex justify-between items-center bg-white/5">
                <h2 class="text-2xl font-bold">Add New Event Service</h2>
                <button onclick="document.getElementById('add-service-modal').classList.add('hidden')" class="text-gray-500 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('admin.event-services.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Service Name</label>
                        <input type="text" name="name" required placeholder="e.g., Luxury Tent" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Category</label>
                        <input type="text" name="category" required placeholder="e.g., Tents" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Price (KES)</label>
                        <input type="number" step="0.01" name="price" required placeholder="5000" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Unit</label>
                        <input type="text" name="unit" required placeholder="per day" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Description</label>
                    <textarea name="description" placeholder="Short description for the customer..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 h-24"></textarea>
                </div>
                <button type="submit" class="w-full py-4 bg-indigo-600 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
                    Save Service
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
