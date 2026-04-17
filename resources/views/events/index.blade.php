@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="text-center mb-16">
        <h1 class="text-5xl font-bold font-serif mb-4">Event Management & Rentals</h1>
        <p class="text-gray-400 max-w-2xl mx-auto text-lg">Select the equipment and services you need for your event. We handle the setup and logistics so you can focus on the celebration.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Selection Area -->
        <div class="lg:col-span-2 space-y-12">
            @foreach($services as $category => $items)
                <div class="space-y-6">
                    <h2 class="text-2xl font-bold border-b border-white/10 pb-2">{{ $category }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($items as $item)
                            <div class="glass p-6 rounded-3xl flex flex-col justify-between hover:bg-white/5 transition border border-white/5 group">
                                <div>
                                    <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-400 transition">{{ $item->name }}</h3>
                                    <p class="text-gray-400 text-sm mb-4">{{ $item->description }}</p>
                                    <div class="text-indigo-400 font-bold mb-4">{{ number_format($item->price, 2) }} KES <span class="text-gray-500 text-xs font-normal">/ {{ $item->unit }}</span></div>
                                </div>
                                <button 
                                    onclick="addItem({{ $item->id }}, '{{ $item->name }}', {{ $item->price }})"
                                    class="w-full py-3 bg-white/5 border border-white/10 rounded-xl hover:bg-indigo-600 hover:border-indigo-600 transition font-bold"
                                >
                                    Add to Event
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Booking & Summary Area -->
        <div class="lg:col-span-1">
            <div class="glass p-8 rounded-3xl sticky top-32 border border-white/10">
                <h3 class="text-2xl font-bold mb-6">Your Event Summary</h3>
                
                <div id="selected-items" class="space-y-4 mb-8 max-h-60 overflow-y-auto pr-2 custom-scrollbar">
                    <p class="text-gray-500 text-center py-4">No items selected yet.</p>
                </div>

                <div class="border-t border-white/10 pt-6 mb-8">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-400">Total Items</span>
                        <span id="total-items-count" class="font-bold">0</span>
                    </div>
                    <div class="flex justify-between items-center text-xl">
                        <span class="font-bold">Estimated Total</span>
                        <span id="total-price" class="font-bold text-indigo-400">0.00 KES</span>
                    </div>
                </div>

                <form id="booking-form" class="space-y-4">
                    @csrf
                    <input type="text" name="customer_name" placeholder="Full Name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    <input type="email" name="email" placeholder="Email Address" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    <input type="text" name="phone" placeholder="Phone Number" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    <input type="text" name="location" placeholder="Event Location" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    <div class="space-y-1">
                        <label class="text-xs text-gray-500 px-1">Event Date</label>
                        <input type="date" name="event_date" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600">
                    </div>
                    <textarea name="notes" placeholder="Special requirements..." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 h-24"></textarea>
                    
                    <button type="submit" id="submit-btn" class="w-full py-4 bg-indigo-600 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                        Submit Inquiry
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let selectedItems = [];

    function addItem(id, name, price) {
        const existing = selectedItems.find(i => i.id === id);
        if (existing) {
            existing.quantity++;
        } else {
            selectedItems.push({ id, name, price, quantity: 1 });
        }
        renderItems();
    }

    function removeItem(id) {
        selectedItems = selectedItems.filter(i => i.id !== id);
        renderItems();
    }

    function updateQuantity(id, delta) {
        const item = selectedItems.find(i => i.id === id);
        if (item) {
            item.quantity += delta;
            if (item.quantity <= 0) removeItem(id);
            else renderItems();
        }
    }

    function renderItems() {
        const container = document.getElementById('selected-items');
        const totalPriceEl = document.getElementById('total-price');
        const totalCountEl = document.getElementById('total-items-count');
        const submitBtn = document.getElementById('submit-btn');

        if (selectedItems.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-4">No items selected yet.</p>';
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
                <div class="flex justify-between items-center bg-white/5 p-4 rounded-2xl">
                    <div class="flex-1">
                        <p class="font-bold text-sm">${item.name}</p>
                        <p class="text-xs text-gray-500">${item.price.toLocaleString()} KES each</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="flex items-center bg-black/20 rounded-lg px-2 py-1">
                            <button onclick="updateQuantity(${item.id}, -1)" class="text-indigo-400 hover:text-white px-1">-</button>
                            <span class="mx-2 text-sm">${item.quantity}</span>
                            <button onclick="updateQuantity(${item.id}, 1)" class="text-indigo-400 hover:text-white px-1">+</button>
                        </div>
                        <button onclick="removeItem(${item.id})" class="text-red-500/50 hover:text-red-500 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
            `;
        }).join('');

        totalPriceEl.textContent = total.toLocaleString(undefined, { minimumFractionDigits: 2 }) + ' KES';
        totalCountEl.textContent = count;
        submitBtn.disabled = false;
    }

    document.getElementById('booking-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const data = Object.fromEntries(formData.entries());
        data.items = selectedItems;

        const btn = document.getElementById('submit-btn');
        btn.disabled = true;
        btn.textContent = 'Submitting...';

        try {
            const response = await fetch('{{ route('events.book') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            if (result.success) {
                alert(result.message);
                selectedItems = [];
                e.target.reset();
                renderItems();
            } else {
                alert(result.message);
            }
        } catch (error) {
            alert('Something went wrong. Please check your internet connection.');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Submit Inquiry';
        }
    });
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 10px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.2); }
</style>
@endsection
