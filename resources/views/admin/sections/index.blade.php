@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-bold font-serif">Page Section Management</h1>
        <div class="flex space-x-4">
            <a href="{{ route('admin.index') }}" class="px-6 py-2 glass rounded-full hover:bg-white/10 transition">Dashboard</a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Add Section Form -->
        <div class="lg:col-span-1">
            <div class="glass p-8 rounded-3xl sticky top-32">
                <h2 class="text-2xl font-bold mb-6">Add New Section</h2>
                <form action="{{ route('admin.sections.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Target Page</label>
                        <select name="page_name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition appearance-none">
                            <option value="welcome" class="bg-gray-900">Home Page</option>
                            <option value="services.show" class="bg-gray-900">Service Detail Page</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Type</label>
                        <select name="section_type" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition appearance-none">
                            <option value="banner" class="bg-gray-900">Banner</option>
                            <option value="features" class="bg-gray-900">Features Grid</option>
                            <option value="cta" class="bg-gray-900">Call to Action</option>
                            <option value="faq" class="bg-gray-900">FAQ Section</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Title</label>
                        <input type="text" name="title" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Content</label>
                        <textarea name="content" rows="4" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-400 mb-2">Section Image</label>
                        <input type="file" name="image" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 transition">
                    </div>
                    <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 rounded-xl font-bold transition shadow-lg shadow-indigo-600/20">
                        Create Section
                    </button>
                </form>
            </div>
        </div>

        <!-- Sections List -->
        <div class="lg:col-span-2 space-y-8">
            @foreach(['welcome', 'services.show'] as $page)
                <div class="glass rounded-3xl overflow-hidden">
                    <div class="p-8 border-b border-white/10 bg-white/5">
                        <h2 class="text-2xl font-bold uppercase tracking-widest text-sm text-indigo-400">Page: {{ ucfirst($page) }}</h2>
                    </div>
                    <div class="p-8 space-y-4">
                        @php $pageSections = $sections->where('page_name', $page); @endphp
                        @if($pageSections->isEmpty())
                            <p class="text-gray-500 italic">No dynamic sections added to this page yet.</p>
                        @else
                            @foreach($pageSections as $section)
                                <div class="flex items-center justify-between p-6 bg-white/5 rounded-2xl border border-white/5 hover:border-indigo-600/50 transition">
                                    <div class="flex items-center space-x-6">
                                        <div class="w-12 h-12 bg-indigo-600/20 rounded-xl flex items-center justify-center font-bold text-indigo-400 uppercase text-xs">
                                            {{ substr($section->section_type, 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-lg">{{ $section->title }}</h4>
                                            <p class="text-xs text-gray-500">{{ strtoupper($section->section_type) }} | Order: {{ $section->order }}</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-4">
                                        <button class="text-indigo-400 hover:text-indigo-300 transition text-sm font-bold">Edit</button>
                                        <button class="text-red-500 hover:text-red-400 transition text-sm font-bold">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
