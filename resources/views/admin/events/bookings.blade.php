@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Event Booking Inquiries</h1>
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
                    <th class="px-8 py-4 font-normal">Customer</th>
                    <th class="px-8 py-4 font-normal">Date & Location</th>
                    <th class="px-8 py-4 font-normal">Items</th>
                    <th class="px-8 py-4 font-normal">Estimated Total</th>
                    <th class="px-8 py-4 font-normal">Status</th>
                    <th class="px-8 py-4 font-normal text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="px-8 py-4">
                        <p class="font-bold">{{ $booking->customer_name }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->email }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->phone }}</p>
                    </td>
                    <td class="px-8 py-4">
                        <p class="font-bold text-indigo-400">{{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $booking->location }}</p>
                    </td>
                    <td class="px-8 py-4">
                        <div class="text-xs text-gray-400">
                            @foreach($booking->items as $item)
                                <span class="block">• {{ $item->service ? $item->service->name : 'Deleted Service' }} (x{{ $item->quantity }})</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-8 py-4 font-bold text-lg">{{ number_format($booking->total_price, 2) }} KES</td>
                    <td class="px-8 py-4">
                        @if($booking->status == 'pending')
                            <span class="px-3 py-1 bg-yellow-600/10 text-yellow-500 rounded-full text-xs font-bold uppercase">Pending</span>
                        @elseif($booking->status == 'confirmed')
                            <span class="px-3 py-1 bg-green-600/10 text-green-500 rounded-full text-xs font-bold uppercase">Confirmed</span>
                        @elseif($booking->status == 'invoiced')
                            <span class="px-3 py-1 bg-indigo-600/10 text-indigo-400 rounded-full text-xs font-bold uppercase">Invoiced</span>
                        @endif
                    </td>
                    <td class="px-8 py-4 text-right">
                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('admin.event-bookings.show', $booking->id) }}" class="text-indigo-400 hover:text-white transition text-sm font-bold">View</a>
                            @if($booking->status != 'invoiced')
                                <form action="{{ route('admin.event-bookings.invoice', $booking->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-indigo-600 rounded-xl hover:bg-indigo-700 transition text-xs font-bold text-white shadow-lg shadow-indigo-600/20">
                                        Confirm & Invoice
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-12 text-center text-gray-500 italic">No event bookings yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
