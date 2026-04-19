@extends('layouts.app')

@section('seo')
    <title>{{ $service->meta_title ?? $service->title . ' - Vantage Digital Agency' }}</title>
    <meta name="description" content="{{ $service->meta_description ?? $service->description }}">
    <meta name="keywords" content="{{ $service->meta_keywords }}">
@endsection

@section('content')
<div class="relative min-h-screen">
    <!-- Service Background Image -->
    <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
        <img src="{{ $service->image }}" class="w-full h-full object-cover opacity-20" alt="{{ $service->title }}">
        <div class="absolute inset-0 bg-gradient-to-b from-gray-950 via-transparent to-gray-950"></div>
    </div>

    <div class="container mx-auto px-6 pt-40 pb-20 relative z-10">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            <div class="lg:w-1/2">
                <h1 class="text-5xl md:text-7xl font-bold font-serif mb-6 leading-tight">{{ $service->title }}</h1>
                <p class="text-xl text-gray-300 max-w-2xl mb-10 leading-relaxed">
                    {{-- Dynamically wrap the service name in a link to home --}}
                    {!! str_replace($service->title, '<a href="'.url('/').'" class="text-yellow-500 hover:underline">'.$service->title.'</a>', $service->description) !!}
                    Stay updated with the latest trends on our <a href="https://blogs.vantagedigitalagency.co.ke" target="_blank" class="text-yellow-500 hover:underline">Vantage Blog</a>.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                    @foreach($service->features as $feature)
                        <div class="flex items-center space-x-3">
                            <div class="w-6 h-6 bg-indigo-600 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="text-gray-300">{{ $feature }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="flex space-x-6">
                    <a href="#inquiry" class="px-8 py-4 btn-primary rounded-full">Get Started</a>
                    <a href="{{ route('services.brochure', $service->slug) }}" class="px-8 py-4 btn-outline rounded-full flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Download Brochure
                    </a>
                </div>
            </div>
            
            <div class="lg:w-1/2 relative">
                <div class="glass p-4 rounded-3xl transform rotate-3 hover:rotate-0 transition duration-500">
                    <img src="{{ $service->image }}" class="rounded-2xl shadow-2xl" alt="{{ $service->title }}">
                </div>
                <!-- Interactive Animation Element -->
                <div id="service-animation" class="absolute -top-10 -right-10 w-40 h-40 -z-10"></div>
            </div>
        </div>
    </div>
</div>

<!-- Process Section -->
<section class="py-24 bg-indigo-900/10">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Our Working Process</h2>
            <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="relative text-center">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold relative z-10">1</div>
                <div class="hidden md:block absolute top-8 left-1/2 w-full h-0.5 bg-indigo-600/30 -z-0"></div>
                <h3 class="text-xl font-bold mb-2">Discovery</h3>
                <p class="text-gray-400">We start by understanding your goals and requirements.</p>
            </div>
            <div class="relative text-center">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold relative z-10">2</div>
                <div class="hidden md:block absolute top-8 left-1/2 w-full h-0.5 bg-indigo-600/30 -z-0"></div>
                <h3 class="text-xl font-bold mb-2">Strategy</h3>
                <p class="text-gray-400">Developing a tailored roadmap for your project.</p>
            </div>
            <div class="relative text-center">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold relative z-10">3</div>
                <div class="hidden md:block absolute top-8 left-1/2 w-full h-0.5 bg-indigo-600/30 -z-0"></div>
                <h3 class="text-xl font-bold mb-2">Execution</h3>
                <p class="text-gray-400">Our experts bring the strategy to life with precision.</p>
            </div>
            <div class="relative text-center">
                <div class="w-16 h-16 bg-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold relative z-10">4</div>
                <h3 class="text-xl font-bold mb-2">Delivery</h3>
                <p class="text-gray-400">Final review and launching your digital solution.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="py-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2 order-2 lg:order-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="glass p-8 rounded-3xl">
                        <div class="text-indigo-500 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2">Fast Results</h4>
                        <p class="text-gray-400">Optimized workflows to get you up and running quickly.</p>
                    </div>
                    <div class="glass p-8 rounded-3xl">
                        <div class="text-indigo-500 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2">Secure & Reliable</h4>
                        <p class="text-gray-400">Built with security as a top priority from day one.</p>
                    </div>
                    <div class="glass p-8 rounded-3xl">
                        <div class="text-indigo-500 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2">Scalable Solutions</h4>
                        <p class="text-gray-400">Our systems grow with your business needs.</p>
                    </div>
                    <div class="glass p-8 rounded-3xl">
                        <div class="text-indigo-500 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold mb-2">Cost Effective</h4>
                        <p class="text-gray-400">Maximizing value while minimizing unnecessary costs.</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 order-1 lg:order-2">
                <h2 class="text-4xl font-bold mb-8 font-serif">Why Choose ours '{{ $service->title }}' service?</h2>
                <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                    Our approach to {{ $service->title }} combines technical expertise with a deep understanding of business goals. we don't just deliver a service; we provide a strategic partnership that drives real growth.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center space-x-3">
                        <div class="w-6 h-6 text-indigo-500">
                            <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-gray-300">Tailored solutions for your specific industry</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div class="w-6 h-6 text-indigo-500">
                            <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-gray-300">Data-driven decision making process</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div class="w-6 h-6 text-indigo-500">
                            <svg fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-gray-300">Transparent communication and regular updates</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="inquiry" class="py-24 bg-gray-900/50">
    <div class="container mx-auto px-6 max-w-4xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Inquire About This Service</h2>
            @if(session('success'))
                <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-6 max-w-md mx-auto">
                    {{ session('success') }}
                </div>
            @endif
            <p class="text-gray-400">Tell us about your needs and we'll get back to you shortly.</p>
        </div>
        
        <form action="{{ route('inquiry.store') }}" method="POST" class="glass p-12 rounded-3xl space-y-6">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <input type="text" name="name" placeholder="Name" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
                <input type="email" name="email" placeholder="Email" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
            </div>
            <textarea name="message" rows="5" placeholder="Tell us about your project" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500 w-full"></textarea>
            <button type="submit" class="w-full py-4 bg-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition">Send Message</button>
        </form>
    </div>
</section>

<script>
    // Service Page Three.js Animation
    const scene = new THREE.Scene();
    const container = document.getElementById('service-animation');
    const camera = new THREE.PerspectiveCamera(75, 1, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true });
    renderer.setSize(160, 160);
    container.appendChild(renderer.domElement);

    const geometry = new THREE.IcosahedronGeometry(1, 0);
    const material = new THREE.MeshPhongMaterial({ color: 0x6366f1, wireframe: true });
    const mesh = new THREE.Mesh(geometry, material);
    scene.add(mesh);

    const light = new THREE.PointLight(0xffffff, 1, 100);
    light.position.set(10, 10, 10);
    scene.add(light);

    camera.position.z = 3;

    function animate() {
        requestAnimationFrame(animate);
        mesh.rotation.x += 0.01;
        mesh.rotation.y += 0.01;
        renderer.render(scene, camera);
    }
    animate();
</script>
@endsection
