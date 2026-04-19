@extends('layouts.app')

@section('content')
<div class="pt-40 pb-20 container mx-auto px-6 text-center">
    <div class="max-w-2xl mx-auto glass p-12 rounded-[2rem] border border-white/10">
        <div class="w-20 h-20 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-8 text-black">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        </div>
        <h1 class="text-4xl font-bold font-serif mb-4">Thank You!</h1>
        <p class="text-xl text-gray-400 mb-8">Your adventure request has been submitted successfully. Our team will review your details and get back to you with a custom quote shortly.</p>
        <a href="{{ url('/') }}" class="btn-primary px-8 py-4 rounded-full inline-block">Back to Home</a>
    </div>
</div>
@endsection
