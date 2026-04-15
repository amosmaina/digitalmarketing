@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20 max-w-5xl">
    <div class="flex items-center space-x-4 mb-12">
        <a href="{{ route('admin.index') }}" class="text-indigo-400 hover:text-indigo-300">← Back</a>
        <h1 class="text-4xl font-bold font-serif">Edit Service: {{ $service->title }}</h1>
    </div>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        @csrf
        @method('PUT')

        <div class="lg:col-span-2 space-y-8">
            <div class="glass p-8 rounded-3xl space-y-6">
                <h2 class="text-2xl font-bold border-b border-white/5 pb-4">Content Management</h2>
                
                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Service Title</label>
                    <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-bold">Upload Image</label>
                        <input type="file" name="image_file" class="bg-white/5 border border-white/10 rounded-xl px-6 py-3 focus:outline-none focus:border-indigo-600 w-full">
                    </div>
                    <div class="space-y-2">
                        <label class="text-gray-400 text-sm font-bold">Or Image URL</label>
                        <input type="text" name="image_url" value="{{ old('image', $service->image) }}" class="bg-white/5 border border-white/10 rounded-xl px-6 py-3 focus:outline-none focus:border-indigo-600 w-full">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Short Description</label>
                    <textarea name="description" rows="3" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">{{ old('description', $service->description) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Main Content</label>
                    <textarea name="content" rows="10" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">{{ old('content', $service->content) }}</textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Features (comma separated)</label>
                    <input type="text" id="features_display" value="{{ implode(', ', $service->features) }}" class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
                    <input type="hidden" name="features[]" id="features_hidden">
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-8">
            <div class="glass p-8 rounded-3xl space-y-6 sticky top-32">
                <h2 class="text-2xl font-bold border-b border-white/5 pb-4">SEO Settings</h2>
                
                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $service->meta_title) }}" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full" placeholder="SEO Title">
                </div>

                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Meta Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $service->meta_keywords) }}" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full" placeholder="SEO Keywords">
                </div>

                <div class="space-y-2">
                    <label class="text-gray-400 text-sm font-bold">Meta Description</label>
                    <textarea name="meta_description" rows="5" class="bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-indigo-600 w-full" placeholder="SEO Description">{{ old('meta_description', $service->meta_description) }}</textarea>
                </div>

                <button type="submit" class="w-full py-4 bg-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-600/20">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    const featuresDisplay = document.getElementById('features_display');
    const form = document.querySelector('form');

    form.addEventListener('submit', function(e) {
        const features = featuresDisplay.value.split(',').map(f => f.trim()).filter(f => f !== '');
        
        // Remove existing hidden features to avoid duplicates
        document.querySelectorAll('input[name="features[]"]').forEach(el => el.remove());
        
        features.forEach(f => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'features[]';
            input.value = f;
            form.appendChild(input);
        });
    });
</script>
@endsection
