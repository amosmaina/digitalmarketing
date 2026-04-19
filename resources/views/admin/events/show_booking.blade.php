@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <a href="{{ route('admin.event-bookings.index') }}" class="text-indigo-400 hover:text-white transition flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            <span>Back to Bookings</span>
        </a>
        <h1 class="text-3xl font-bold font-serif">Booking Details</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Customer Info -->
        <div class="lg:col-span-1 space-y-8">
            <div class="glass p-8 rounded-3xl border border-white/10">
                <h3 class="text-xl font-bold mb-6 text-gray-400 uppercase tracking-widest text-xs">Customer Information</h3>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Name</p>
                        <p class="font-bold text-lg text-white">{{ $booking->customer_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Email</p>
                        <p class="font-bold text-white">{{ $booking->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Phone</p>
                        <p class="font-bold text-white">{{ $booking->phone }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Location</p>
                        <p class="font-bold text-white">{{ $booking->location }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Event Date</p>
                        <p class="font-bold text-indigo-400">{{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</p>
                    </div>
                    @if($booking->notes)
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Notes</p>
                        <p class="text-gray-400 text-sm">{{ $booking->notes }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <div class="glass p-8 rounded-3xl border border-white/10">
                <h3 class="text-xl font-bold mb-6 text-gray-400 uppercase tracking-widest text-xs">Current Status</h3>
                <div class="flex items-center space-x-4">
                    @if($booking->status == 'pending')
                        <span class="px-4 py-2 bg-yellow-600/10 text-yellow-500 rounded-full text-sm font-bold uppercase tracking-widest">Pending Review</span>
                    @elseif($booking->status == 'confirmed')
                        <span class="px-4 py-2 bg-green-600/10 text-green-500 rounded-full text-sm font-bold uppercase tracking-widest">Confirmed</span>
                    @elseif($booking->status == 'invoiced')
                        <span class="px-4 py-2 bg-indigo-600/10 text-indigo-400 rounded-full text-sm font-bold uppercase tracking-widest">Invoiced</span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="lg:col-span-2 space-y-8">
            <div class="glass rounded-3xl overflow-hidden border border-white/10">
                <div class="p-8 border-b border-white/10 bg-white/5">
                    <h2 class="text-2xl font-bold">Selected Items</h2>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/10 text-gray-400 text-xs uppercase tracking-widest">
                            <th class="px-8 py-4 font-normal">Service</th>
                            <th class="px-8 py-4 font-normal text-center">Quantity</th>
                            <th class="px-8 py-4 font-normal text-right">Price</th>
                            <th class="px-8 py-4 font-normal text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->items as $item)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition">
                            <td class="px-8 py-4 font-bold">{{ $item->service ? $item->service->name : 'Deleted Service' }}</td>
                            <td class="px-8 py-4 text-center font-bold text-gray-400">{{ $item->quantity }}</td>
                            <td class="px-8 py-4 text-right">{{ number_format($item->unit_price, 2) }} KES</td>
                            <td class="px-8 py-4 text-right font-bold">{{ number_format($item->total, 2) }} KES</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-white/5">
                            <td colspan="3" class="px-8 py-6 text-right font-bold text-gray-400 uppercase tracking-widest text-xs">Total Estimated Price</td>
                            <td class="px-8 py-6 text-right font-bold text-2xl text-indigo-400">{{ number_format($booking->total_price, 2) }} KES</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            @if($booking->status != 'invoiced')
            <div class="flex justify-end space-x-6">
                <form action="{{ route('admin.event-bookings.invoice', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-12 py-5 bg-indigo-600 rounded-3xl hover:bg-indigo-700 transition font-bold text-white shadow-2xl shadow-indigo-600/30">
                        Confirm & Generate Invoice
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
