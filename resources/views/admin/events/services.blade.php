@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20 space-y-10">
    <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
        <div class="max-w-3xl">
            <p class="text-sm uppercase tracking-[0.3em] text-indigo-400 font-bold mb-3">Event Management</p>
            <h1 class="text-4xl md:text-5xl font-bold font-serif mb-4">Manage Event Items We Offer</h1>
            <p class="text-gray-400 text-lg">
                Add the tents, chairs, sound systems, decor packages, cameras, and other event items you offer here.
                Every active item saved on this page appears automatically on the public events page as a selectable option.
            </p>
        </div>
        <a href="{{ route('admin.event-bookings.index') }}" class="inline-flex items-center justify-center px-6 py-3 glass rounded-full hover:bg-white/10 transition font-bold">
            View Event Bookings
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-2xl border border-green-500/20">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="glass rounded-3xl p-6 border border-white/10">
            <p class="text-gray-400 text-sm mb-2">Total Event Items</p>
            <p class="text-4xl font-bold">{{ $services->count() }}</p>
        </div>
        <div class="glass rounded-3xl p-6 border border-white/10">
            <p class="text-gray-400 text-sm mb-2">Active On Frontend</p>
            <p class="text-4xl font-bold text-indigo-400">{{ $activeServicesCount }}</p>
        </div>
        <div class="glass rounded-3xl p-6 border border-white/10">
            <p class="text-gray-400 text-sm mb-2">Categories</p>
            <p class="text-4xl font-bold">{{ $categorySummary->count() }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-[1.05fr,1.4fr] gap-8">
        <div class="glass rounded-[2rem] border border-white/10 overflow-hidden">
            <div class="p-8 border-b border-white/10 bg-white/5">
                <h2 class="text-2xl font-bold mb-2">Add New Event Item</h2>
                <p class="text-gray-400">Create an item once and it will be available for customers to pick on the events page.</p>
            </div>

            <form action="{{ route('admin.event-services.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Item Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="e.g. VIP Tent" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        @error('name')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Category</label>
                        <input list="event-categories" type="text" name="category" value="{{ old('category') }}" required placeholder="e.g. Tents" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        <datalist id="event-categories">
                            @foreach($categorySummary as $category)
                                <option value="{{ $category->category }}"></option>
                            @endforeach
                        </datalist>
                        @error('category')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Price (KES)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}" required placeholder="5000" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        @error('price')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Billing Unit</label>
                        <input type="text" name="unit" value="{{ old('unit') }}" required placeholder="per day, per piece, per event" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        @error('unit')
                            <p class="text-red-400 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Short Description</label>
                    <textarea name="description" rows="4" placeholder="Describe what the customer gets when selecting this item." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-xs text-gray-500 uppercase font-bold tracking-wider">Item Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    @error('image')
                        <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-4 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }} class="rounded border-white/20 bg-transparent text-indigo-600 focus:ring-indigo-500">
                    <span>
                        <span class="block font-bold">Show on public events page</span>
                        <span class="block text-sm text-gray-400">Keep this enabled if customers should be able to book this item.</span>
                    </span>
                </label>

                <button type="submit" class="w-full py-4 bg-indigo-600 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
                    Save Event Item
                </button>
            </form>
        </div>

        <div class="space-y-8">
            <div class="glass rounded-[2rem] border border-white/10 overflow-hidden">
                <div class="p-8 border-b border-white/10 bg-white/5">
                    <h2 class="text-2xl font-bold mb-2">Current Event Inventory</h2>
                    <p class="text-gray-400">These are the event items customers can browse or request depending on status.</p>
                </div>

                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                    @forelse($services as $service)
                        <div class="rounded-3xl border border-white/10 bg-white/[0.03] overflow-hidden">
                            @if($service->image)
                                <img src="{{ $service->image }}" alt="{{ $service->name }}" class="w-full h-40 object-cover">
                            @else
                                <div class="h-40 bg-gradient-to-br from-indigo-600/30 via-slate-900 to-rose-500/20 flex items-end p-5">
                                    <span class="text-lg font-bold">{{ $service->name }}</span>
                                </div>
                            @endif

                            <div class="p-5 space-y-4">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="font-bold text-lg">{{ $service->name }}</p>
                                        <p class="text-sm text-gray-400">{{ $service->category }}</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold {{ $service->is_active ? 'bg-green-500/10 text-green-400' : 'bg-white/10 text-gray-400' }}">
                                        {{ $service->is_active ? 'Active' : 'Hidden' }}
                                    </span>
                                </div>

                                <p class="text-sm text-gray-400 min-h-[3rem]">{{ $service->description ?: 'No description added yet.' }}</p>

                                <div class="flex items-end justify-between gap-4">
                                    <div>
                                        <p class="text-2xl font-bold text-indigo-400">{{ number_format($service->price, 2) }} KES</p>
                                        <p class="text-xs text-gray-500">charged {{ $service->unit }}</p>
                                    </div>

                                    <form action="{{ route('admin.event-services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 rounded-xl bg-red-500/10 text-red-400 hover:bg-red-500/20 transition text-sm font-bold" onclick="return confirm('Delete this event item?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="md:col-span-2 rounded-3xl border border-dashed border-white/10 p-10 text-center text-gray-500">
                            No event items yet. Add your first item from the form on the left.
                        </div>
                    @endforelse
                </div>
            </div>

            @if($categorySummary->isNotEmpty())
                <div class="glass rounded-[2rem] border border-white/10 p-8">
                    <h2 class="text-2xl font-bold mb-4">Category Overview</h2>
                    <div class="flex flex-wrap gap-3">
                        @foreach($categorySummary as $category)
                            <div class="px-4 py-3 rounded-2xl bg-white/5 border border-white/10">
                                <span class="block font-bold">{{ $category->category }}</span>
                                <span class="text-sm text-gray-400">{{ $category->total }} item{{ $category->total > 1 ? 's' : '' }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
