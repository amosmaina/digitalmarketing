@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20 max-w-4xl">
    <div class="flex items-center space-x-4 mb-12">
        <a href="{{ route('admin.clients.index') }}" class="text-indigo-400 hover:text-indigo-300">← Back</a>
        <h1 class="text-4xl font-bold font-serif">Create Invoice for {{ $client->name }}</h1>
    </div>

    <form action="{{ route('admin.invoices.store') }}" method="POST" class="glass p-12 rounded-3xl space-y-8">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-2">
                <label class="text-gray-400 font-bold text-sm">Due Date</label>
                <input type="date" name="due_date" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
            </div>
            <div class="space-y-2">
                <label class="text-gray-400 font-bold text-sm">Invoice Number</label>
                <input type="text" value="Auto-generated" disabled class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none w-full opacity-50 italic">
            </div>
        </div>

        <div class="space-y-4">
            <div class="flex justify-between items-center border-b border-white/5 pb-4">
                <h2 class="text-2xl font-bold">Invoice Items</h2>
                <button type="button" id="add-item" class="text-indigo-400 font-bold hover:text-indigo-300 transition flex items-center text-sm">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Add Item
                </button>
            </div>
            
            <div id="items-container" class="space-y-4">
                <div class="item-row grid grid-cols-12 gap-4 items-center">
                    <div class="col-span-6 space-y-1">
                        <label class="text-[10px] uppercase text-gray-500 font-bold">Description</label>
                        <input type="text" name="items[0][description]" required class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm" placeholder="Service description">
                    </div>
                    <div class="col-span-2 space-y-1">
                        <label class="text-[10px] uppercase text-gray-500 font-bold">Qty</label>
                        <input type="number" name="items[0][quantity]" required min="1" value="1" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm">
                    </div>
                    <div class="col-span-3 space-y-1">
                        <label class="text-[10px] uppercase text-gray-500 font-bold">Unit Price ($)</label>
                        <input type="number" step="0.01" name="items[0][unit_price]" required min="0" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm" placeholder="0.00">
                    </div>
                    <div class="col-span-1 pt-5">
                        <button type="button" class="remove-item text-red-500 opacity-50 hover:opacity-100 transition">&times;</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="w-full py-4 bg-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
            Generate Invoice
        </button>
    </form>
</div>

<script>
    let itemCount = 1;
    const itemsContainer = document.getElementById('items-container');
    const addItemBtn = document.getElementById('add-item');

    addItemBtn.addEventListener('click', () => {
        const row = document.createElement('div');
        row.className = 'item-row grid grid-cols-12 gap-4 items-center';
        row.innerHTML = `
            <div class="col-span-6 space-y-1">
                <input type="text" name="items[${itemCount}][description]" required class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm" placeholder="Service description">
            </div>
            <div class="col-span-2 space-y-1">
                <input type="number" name="items[${itemCount}][quantity]" required min="1" value="1" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm">
            </div>
            <div class="col-span-3 space-y-1">
                <input type="number" step="0.01" name="items[${itemCount}][unit_price]" required min="0" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full text-sm" placeholder="0.00">
            </div>
            <div class="col-span-1">
                <button type="button" class="remove-item text-red-500 opacity-50 hover:opacity-100 transition text-2xl">&times;</button>
            </div>
        `;
        itemsContainer.appendChild(row);
        itemCount++;
    });

    itemsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.item-row').remove();
        }
    });
</script>
@endsection
