@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Invoices</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.clients.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Manage Clients</a>
            <a href="{{ route('admin.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Dashboard</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass rounded-3xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-8 py-4">Invoice #</th>
                    <th class="px-8 py-4">Client</th>
                    <th class="px-8 py-4">Total Amount</th>
                    <th class="px-8 py-4">Due Date</th>
                    <th class="px-8 py-4">Status</th>
                    <th class="px-8 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="px-8 py-4 font-bold text-indigo-400">{{ $invoice->invoice_number }}</td>
                    <td class="px-8 py-4">
                        <div class="font-bold text-white">{{ $invoice->client->name }}</div>
                        <div class="text-xs text-gray-500">{{ $invoice->client->email }}</div>
                    </td>
                    <td class="px-8 py-4 font-bold text-white">${{ number_format($invoice->total_amount, 2) }}</td>
                    <td class="px-8 py-4 text-gray-400">{{ $invoice->due_date }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                            {{ $invoice->status === 'paid' ? 'bg-green-600/20 text-green-400' : 
                               ($invoice->status === 'pending' ? 'bg-yellow-600/20 text-yellow-400' : 'bg-red-600/20 text-red-400') }}">
                            {{ $invoice->status }}
                        </span>
                    </td>
                    <td class="px-8 py-4">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.invoices.download', $invoice->id) }}" class="text-indigo-400 hover:text-indigo-300 transition text-sm font-bold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download PDF
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-8">
            {{ $invoices->links() }}
        </div>
    </div>
</div>
@endsection
