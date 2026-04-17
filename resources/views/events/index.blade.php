@extends('layouts.app')

@section('content')
<div class="pt-24">
    <section class="relative overflow-hidden py-20">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -top-20 left-0 h-80 w-80 rounded-full bg-indigo-600/20 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-rose-500/15 blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-[1.2fr,0.8fr] gap-10 items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-indigo-400 font-bold mb-4">Event Management</p>
                    <h1 class="text-5xl md:text-6xl font-bold font-serif mb-6 leading-tight">Plan your event with the exact items and support you need.</h1>
                    <p class="text-xl text-gray-300 max-w-2xl mb-8">
                        Choose from our event equipment and service options, build a quick request, and let our team handle setup, logistics, and delivery.
                    </p>

                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="#event-catalogue" class="px-8 py-4 bg-indigo-600 rounded-full font-bold hover:bg-indigo-700 transition">Browse Event Items</a>
                        <a href="#event-quote" class="px-8 py-4 glass rounded-full font-bold hover:bg-white/10 transition">Request a Quote</a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl">
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Available Categories</p>
                            <p class="text-3xl font-bold">{{ $services->count() }}</p>
                        </div>
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Bookable Items</p>
                            <p class="text-3xl font-bold">{{ $services->flatten()->count() }}</p>
                        </div>
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Support Included</p>
                            <p class="text-3xl font-bold">Full</p>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-[2rem] border border-white/10 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1400&auto=format&fit=crop" alt="Event setup" class="h-full min-h-[360px] w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <section id="event-catalogue" class="pb-20">
        <div class="container mx-auto px-6 grid grid-cols-1 xl:grid-cols-[1.35fr,0.85fr] gap-8 items-start">
            <div class="space-y-10">
                @forelse($services as $category => $items)
                    <section class="glass rounded-[2rem] p-8 border border-white/10">
                        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
                            <div>
                                <p class="text-sm uppercase tracking-[0.3em] text-gray-500 font-bold mb-3">Category</p>
                                <h2 class="text-3xl font-bold font-serif">{{ $category }}</h2>
                            </div>
                            <p class="text-gray-400">{{ $items->count() }} item{{ $items->count() > 1 ? 's' : '' }} available</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($items as $item)
                                <article class="rounded-3xl overflow-hidden bg-white/[0.03] border border-white/10 hover:border-indigo-500/40 transition">
                                    @if($item->image)
                                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="h-48 bg-gradient-to-br from-indigo-600/20 via-slate-900 to-amber-500/20 p-6 flex items-end">
                                            <div>
                                                <p class="text-xs uppercase tracking-[0.3em] text-gray-400 mb-2">{{ $item->category }}</p>
                                                <p class="text-2xl font-bold">{{ $item->name }}</p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="p-6 space-y-4">
                                        <div>
                                            <h3 class="text-xl font-bold">{{ $item->name }}</h3>
                                            <p class="text-sm text-gray-400 mt-2">{{ $item->description ?: 'Professional event support item ready for your booking.' }}</p>
                                        </div>

                                        <div class="flex items-end justify-between gap-4">
                                            <div>
                                                <p class="text-2xl font-bold text-indigo-400">{{ number_format($item->price, 2) }} KES</p>
                                                <p class="text-xs text-gray-500">charged {{ $item->unit }}</p>
                                            </div>

                                            <button
                                                type="button"
                                                onclick="addItem({{ $item->id }}, @js($item->name), {{ $item->price }})"
                                                class="px-5 py-3 rounded-2xl bg-white/5 border border-white/10 hover:bg-indigo-600 hover:border-indigo-600 transition font-bold"
                                            >
                                                Add Item
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @empty
                    <div class="glass rounded-[2rem] p-10 border border-dashed border-white/10 text-center text-gray-400">
                        No active event items are available yet. Add them from the backend event management section and they will show here automatically.
                    </div>
                @endforelse
            </div>

            <aside id="event-quote" class="xl:sticky xl:top-28 space-y-6">
                <div class="glass rounded-[2rem] p-8 border border-white/10">
                    <h2 class="text-3xl font-bold font-serif mb-3">Your Event Quote</h2>
                    <p class="text-gray-400 mb-6">Select event items from the catalogue, review the estimate here, then send your booking request.</p>

                    <div id="selected-items" class="space-y-4 mb-8 max-h-[22rem] overflow-y-auto pr-2 custom-scrollbar">
                        <p class="text-gray-500 text-center py-6">No items selected yet.</p>
                    </div>

                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Selected quantity</span>
                            <span id="total-items-count" class="font-bold">0</span>
                        </div>
                        <div class="flex justify-between items-center text-xl">
                            <span class="font-bold">Estimated total</span>
                            <span id="total-price" class="font-bold text-indigo-400">0.00 KES</span>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-[2rem] p-8 border border-white/10">
                    <h3 class="text-2xl font-bold mb-6">Send Booking Request</h3>

                    <form id="booking-form" class="space-y-4">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Full Name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        <input type="email" name="email" placeholder="Email Address" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        <input type="text" name="phone" placeholder="Phone Number" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        <input type="text" name="location" placeholder="Event Location" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">

                        <div class="space-y-2">
                            <label class="text-xs text-gray-500 uppercase tracking-[0.25em] font-bold px-1">Event Date</label>
                            <input type="date" name="event_date" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                        </div>

                        <textarea name="notes" placeholder="Share guest count, setup needs, venue timing, or any special instructions." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 h-28"></textarea>

                        <button type="submit" id="submit-btn" class="w-full py-4 bg-indigo-600 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Submit Inquiry
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</div>

<script>
    let selectedItems = [];

    function addItem(id, name, price) {
        const existing = selectedItems.find(item => item.id === id);

        if (existing) {
            existing.quantity += 1;
        } else {
            selectedItems.push({ id, name, price, quantity: 1 });
        }

        renderItems();
    }

    function removeItem(id) {
        selectedItems = selectedItems.filter(item => item.id !== id);
        renderItems();
    }

    function updateQuantity(id, delta) {
        const item = selectedItems.find(entry => entry.id === id);

        if (!item) {
            return;
        }

        item.quantity += delta;

        if (item.quantity <= 0) {
            removeItem(id);
            return;
        }

        renderItems();
    }

    function renderItems() {
        const container = document.getElementById('selected-items');
        const totalPriceEl = document.getElementById('total-price');
        const totalCountEl = document.getElementById('total-items-count');
        const submitBtn = document.getElementById('submit-btn');

        if (selectedItems.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-6">No items selected yet.</p>';
            totalPriceEl.textContent = '0.00 KES';
            totalCountEl.textContent = '0';
            submitBtn.disabled = true;
            return;
        }

        let total = 0;
        let count = 0;

        container.innerHTML = selectedItems.map(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            count += item.quantity;

            return `
                <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="font-bold">${item.name}</p>
                            <p class="text-xs text-gray-500 mt-1">${item.price.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })} KES each</p>
                        </div>
                        <button type="button" onclick="removeItem(${item.id})" class="text-red-400 hover:text-red-300 transition text-sm">Remove</button>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center bg-black/20 rounded-xl px-2 py-1">
                            <button type="button" onclick="updateQuantity(${item.id}, -1)" class="px-2 text-indigo-400 hover:text-white transition">-</button>
                            <span class="px-3 text-sm font-bold">${item.quantity}</span>
                            <button type="button" onclick="updateQuantity(${item.id}, 1)" class="px-2 text-indigo-400 hover:text-white transition">+</button>
                        </div>
                        <p class="font-bold text-indigo-400">${itemTotal.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 })} KES</p>
                    </div>
                </div>
            `;
        }).join('');

        totalPriceEl.textContent = total.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' KES';
        totalCountEl.textContent = count;
        submitBtn.disabled = false;
    }

    document.getElementById('booking-form').addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData.entries());
        data.items = selectedItems;

        const button = document.getElementById('submit-btn');
        button.disabled = true;
        button.textContent = 'Submitting...';

        try {
            const response = await fetch('{{ route('events.book') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();

            if (!response.ok) {
                alert(result.message || 'Something went wrong. Please try again later.');
                return;
            }

            alert(result.message);
            selectedItems = [];
            event.target.reset();
            renderItems();
        } catch (error) {
            alert('Something went wrong. Please check your connection and try again.');
        } finally {
            button.disabled = false;
            button.textContent = 'Submit Inquiry';
        }
    });
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.14);
        border-radius: 9999px;
    }
</style>
@endsection
