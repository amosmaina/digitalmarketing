@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex items-center space-x-4 mb-12">
        <a href="{{ route('admin.index') }}" class="text-indigo-400 hover:text-indigo-300">← Back</a>
        <h1 class="text-4xl font-bold font-serif">Inquiries</h1>
    </div>

    <div class="glass rounded-3xl overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-white/5">
                    <th class="px-8 py-4">Date</th>
                    <th class="px-8 py-4">Name</th>
                    <th class="px-8 py-4">Email</th>
                    <th class="px-8 py-4">Service</th>
                    <th class="px-8 py-4">Message</th>
                    <th class="px-8 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                <tr class="border-b border-white/5 hover:bg-white/5 transition">
                    <td class="px-8 py-4 text-gray-400">{{ $inquiry->created_at->format('M d, Y') }}</td>
                    <td class="px-8 py-4 font-bold">{{ $inquiry->name }}</td>
                    <td class="px-8 py-4 text-indigo-400">{{ $inquiry->email }}</td>
                    <td class="px-8 py-4">
                        <span class="px-3 py-1 bg-indigo-600/20 rounded-full text-xs font-bold text-indigo-400 uppercase tracking-wider">
                            {{ $inquiry->service ? $inquiry->service->title : 'General' }}
                        </span>
                    </td>
                    <td class="px-8 py-4 text-gray-300 max-w-xs truncate">{{ $inquiry->message }}</td>
                    <td class="px-8 py-4">
                        <form action="{{ route('admin.inquiries.convert', $inquiry->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-indigo-400 hover:text-indigo-300 transition text-sm font-bold flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Convert to Client
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="p-8">
            {{ $inquiries->links() }}
        </div>
    </div>
</div>
@endsection
