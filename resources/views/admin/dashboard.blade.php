@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Admin Dashboard</h1>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.users') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Manage Users</a>
            <a href="{{ route('admin.clients.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Clients</a>
            <a href="{{ route('admin.invoices.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Invoices</a>
            <a href="{{ route('admin.booking-requests.index') }}" class="px-6 py-2 btn-primary rounded-full">Adventure Requests</a>
            <a href="{{ route('admin.event-bookings.index') }}" class="px-6 py-2 bg-white/10 rounded-full hover:bg-white/20 transition font-bold">Event Bookings</a>
            <a href="{{ route('admin.event-services.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Manage Event Items</a>
            <a href="{{ route('admin.products.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">POS/Products</a>
            <a href="{{ route('admin.sections.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Page Sections</a>
            <a href="{{ route('admin.inquiries') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Inquiries</a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
        <div class="glass p-8 rounded-3xl text-center group hover:bg-white/5 transition">
            <div class="w-16 h-16 bg-indigo-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-indigo-600 transition">
                <svg class="w-8 h-8 text-indigo-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            </div>
            <h3 class="text-gray-400 mb-2">Total Services</h3>
            <p class="text-5xl font-bold">{{ $servicesCount }}</p>
        </div>
        <div class="glass p-8 rounded-3xl text-center group hover:bg-white/5 transition">
            <div class="w-16 h-16 bg-purple-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-purple-600 transition">
                <svg class="w-8 h-8 text-purple-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            </div>
            <h3 class="text-gray-400 mb-2">Total Inquiries</h3>
            <p class="text-5xl font-bold">{{ $inquiriesCount }}</p>
        </div>
        <div class="glass p-8 rounded-3xl text-center group hover:bg-white/5 transition">
            <div class="w-16 h-16 bg-pink-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-pink-600 transition">
                <svg class="w-8 h-8 text-pink-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <h3 class="text-gray-400 mb-2">System Users</h3>
            <p class="text-5xl font-bold">{{ $usersCount }}</p>
        </div>
        <div class="glass p-8 rounded-3xl text-center group hover:bg-white/5 transition">
            <div class="w-16 h-16 bg-green-600/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-green-600 transition">
                <svg class="w-8 h-8 text-green-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-gray-400 mb-2">Total Clients</h3>
            <p class="text-5xl font-bold">{{ $clientsCount }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="glass rounded-3xl overflow-hidden">
            <div class="p-8 border-b border-white/10 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Manage Services</h2>
                <a href="#" class="text-indigo-400 font-bold">+ Add New</a>
            </div>
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-white/5">
                        <th class="px-8 py-4">Title</th>
                        <th class="px-8 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Service::all() as $service)
                    <tr class="border-b border-white/5 hover:bg-white/5 transition">
                        <td class="px-8 py-4 font-bold">{{ $service->title }}</td>
                        <td class="px-8 py-4">
                            <a href="{{ route('services.edit', $service->id) }}" class="text-indigo-400 hover:text-indigo-300 transition">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="glass rounded-3xl overflow-hidden">
            <div class="p-8 border-b border-white/10">
                <h2 class="text-2xl font-bold">Latest Inquiries</h2>
            </div>
            <div class="p-8 space-y-6">
                @foreach($latestInquiries as $inquiry)
                <div class="flex items-center justify-between border-b border-white/5 pb-4 last:border-0">
                    <div>
                        <p class="font-bold text-white">{{ $inquiry->name }}</p>
                        <p class="text-xs text-gray-500">{{ $inquiry->service ? $inquiry->service->title : 'General' }}</p>
                    </div>
                    <div class="text-right text-xs text-gray-500">
                        {{ $inquiry->created_at->diffForHumans() }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
