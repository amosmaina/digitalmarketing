@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Client Management</h1>
        <div class="flex space-x-4">
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
                    <th class="px-8 py-4">Client Details</th>
                    <th class="px-8 py-4">Company</th>
                    <th class="px-8 py-4">Total Invoices</th>
                    <th class="px-8 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="px-8 py-4">
                        <div class="font-bold">{{ $client->name }}</div>
                        <div class="text-xs text-gray-500">{{ $client->email }}</div>
                        <div class="text-xs text-gray-500">{{ $client->phone }}</div>
                    </td>
                    <td class="px-8 py-4 text-gray-300">{{ $client->company ?? 'N/A' }}</td>
                    <td class="px-8 py-4">
                        <span class="bg-indigo-600/20 text-indigo-400 px-3 py-1 rounded-full text-xs font-bold">
                            {{ $client->invoices_count ?? $client->invoices()->count() }} Invoices
                        </span>
                    </td>
                    <td class="px-8 py-4">
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.invoices.create', $client->id) }}" class="text-indigo-400 hover:text-indigo-300 transition text-sm font-bold">Create Invoice</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-8">
            {{ $clients->links() }}
        </div>
    </div>
</div>
@endsection
