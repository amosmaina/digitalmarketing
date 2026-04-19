@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <div>
            <a href="{{ route('admin.index') }}" class="text-yellow-500 flex items-center mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Dashboard
            </a>
            <h1 class="text-4xl font-bold font-serif">Adventure Requests</h1>
        </div>
    </div>

    <div class="glass rounded-[2rem] overflow-hidden border border-white/10">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white/5 text-gray-400 uppercase text-xs tracking-widest">
                    <th class="px-8 py-6">Date</th>
                    <th class="px-8 py-6">Customer</th>
                    <th class="px-8 py-6">Arrival</th>
                    <th class="px-8 py-6">Nights</th>
                    <th class="px-8 py-6">Budget</th>
                    <th class="px-8 py-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @foreach($requests as $req)
                <tr class="hover:bg-white/[0.02] transition">
                    <td class="px-8 py-6 text-sm text-gray-500">{{ $req->created_at->format('M d, Y') }}</td>
                    <td class="px-8 py-6">
                        <p class="font-bold text-white">{{ $req->full_name }}</p>
                        <p class="text-xs text-gray-500">{{ $req->email }}</p>
                    </td>
                    <td class="px-8 py-6 text-sm">{{ $req->arrival_date->format('M d, Y') }} ({{ $req->date_type }})</td>
                    <td class="px-8 py-6 text-sm">{{ $req->nights }}</td>
                    <td class="px-8 py-6 text-sm italic text-yellow-500/80">{{ Str::limit($req->budget_range, 30) }}</td>
                    <td class="px-8 py-6 text-right">
                        <a href="{{ route('admin.booking-requests.show', $req->id) }}" class="btn-primary px-4 py-2 rounded-full text-xs">View Details</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($requests->isEmpty())
        <div class="p-20 text-center text-gray-500">
            No adventure requests found.
        </div>
        @endif
    </div>
    <div class="mt-8">
        {{ $requests->links() }}
    </div>
</div>
@endsection
