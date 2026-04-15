@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">User Management</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Dashboard</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-600/20 text-red-400 p-4 rounded-xl mb-8">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Add User Form -->
        <div class="lg:col-span-1">
            <div class="glass p-8 rounded-3xl sticky top-32">
                <h2 class="text-2xl font-bold mb-6">Add New User</h2>
                <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Name</label>
                        <input type="text" name="name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Password</label>
                        <input type="password" name="password" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Role</label>
                        <select name="role" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition appearance-none">
                            <option value="marketer" class="bg-gray-900">Marketer</option>
                            <option value="admin" class="bg-gray-900">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-bold transition shadow-lg shadow-indigo-600/20">
                        Create User
                    </button>
                </form>
            </div>
        </div>

        <!-- Users Table -->
        <div class="lg:col-span-2">
            <div class="glass rounded-3xl overflow-hidden">
                <div class="p-8 border-b border-white/10">
                    <h2 class="text-2xl font-bold">System Users</h2>
                </div>
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5">
                            <th class="px-8 py-4">Name</th>
                            <th class="px-8 py-4">Role</th>
                            <th class="px-8 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b border-white/5 hover:bg-white/5 transition">
                            <td class="px-8 py-4">
                                <div class="font-bold">{{ $user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $user->email }}</div>
                            </td>
                            <td class="px-8 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-bold {{ $user->role === 'admin' ? 'bg-indigo-600/20 text-indigo-400' : 'bg-purple-600/20 text-purple-400' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-8 py-4">
                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400 transition">Delete</button>
                                </form>
                                @else
                                <span class="text-gray-600 italic text-sm">You</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-8">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
