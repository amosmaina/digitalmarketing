@extends('layouts.app')

@section('content')
<div class="relative min-h-screen flex items-center pt-20 overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-indigo-600/20 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s"></div>
    </div>
    
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
        <div class="text-left">
            <h1 class="text-5xl md:text-7xl font-bold mb-8 font-serif leading-tight">
                <span id="typed-header"></span><br>
                <span class="gradient-text">Digital Presence</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-12 max-w-xl">
                We're a team of creative minds and technical experts dedicated to pushing the boundaries of what's possible in the digital world.
            </p>
            <div class="flex flex-wrap gap-6">
                <a href="#services" class="px-8 py-4 bg-indigo-600 rounded-full font-bold hover:bg-indigo-700 transition transform hover:scale-105 shadow-lg shadow-indigo-600/20">Our Services</a>
                <a href="#contact" class="px-8 py-4 glass rounded-full font-bold hover:bg-white/20 transition flex items-center">
                    Let's Talk <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
            
            <!-- Small Stats/Trust Elements -->
            <div class="mt-12 flex items-center space-x-8">
                <div class="flex -space-x-4">
                    <img src="https://i.pravatar.cc/100?u=1" class="w-12 h-12 rounded-full border-4 border-gray-950" alt="User">
                    <img src="https://i.pravatar.cc/100?u=2" class="w-12 h-12 rounded-full border-4 border-gray-950" alt="User">
                    <img src="https://i.pravatar.cc/100?u=3" class="w-12 h-12 rounded-full border-4 border-gray-950" alt="User">
                    <div class="w-12 h-12 rounded-full bg-indigo-600 border-4 border-gray-950 flex items-center justify-center text-xs font-bold">+500</div>
                </div>
                <p class="text-gray-500 text-sm">Trusted by <span class="text-white font-bold">500+</span> companies worldwide</p>
            </div>
        </div>
        
        <div class="relative">
            <!-- Playful Illustration/Image Composition -->
            <div class="relative z-10 animate-float">
                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=1200&h=1200&auto=format&fit=crop" class="rounded-[3rem] shadow-2xl border-8 border-white/5" alt="Digital Marketing Team">
                
                <!-- Floating Interactive Cards -->
                <div class="absolute -top-10 -right-10 glass p-6 rounded-2xl shadow-xl animate-float" style="animation-delay: 1s">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center text-green-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Conversion Rate</p>
                            <p class="text-lg font-bold text-white">+24%</p>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -bottom-10 -left-10 glass p-6 rounded-2xl shadow-xl animate-float" style="animation-delay: 2s">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-indigo-500/20 rounded-lg flex items-center justify-center text-indigo-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Active Clients</p>
                            <p class="text-lg font-bold text-white">1.2k</p>
                        </div>
                    </div>
                </div>

                <!-- Playful Floating Icons -->
                <div class="absolute top-0 -left-10 w-16 h-16 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center animate-bounce shadow-xl border border-white/20" style="animation-duration: 3s">
                    <svg class="w-8 h-8 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </div>
                <div class="absolute bottom-20 -right-10 w-20 h-20 bg-white/10 backdrop-blur-md rounded-full flex items-center justify-center animate-bounce shadow-xl border border-white/20" style="animation-duration: 4s; animation-delay: 1s">
                    <svg class="w-10 h-10 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.336 3.608 1.31.974.974 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.336 2.633-1.31 3.608-.974.974-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.336-3.608-1.31-.974-.974-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.336-2.633 1.31-3.608.974-.974 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
            </div>
            </div>
            
            <!-- Decorative Circles -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] border border-white/5 rounded-full -z-10 animate-spin-slow"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[140%] h-[140%] border border-white/5 rounded-full -z-10 animate-reverse-spin-slow"></div>
        </div>
    </div>
</div>

<!-- Features Spotlight (Small Interactive Cards) -->
<section class="py-24 relative overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="glass p-6 rounded-2xl group hover:bg-indigo-600 transition duration-500 cursor-pointer">
                <div class="w-12 h-12 bg-indigo-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white/20 transition">
                    <svg class="w-6 h-6 text-indigo-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-white">Strategy</h4>
                <p class="text-sm text-gray-500 group-hover:text-white/80">Planning for long-term growth.</p>
            </div>
            <div class="glass p-6 rounded-2xl group hover:bg-purple-600 transition duration-500 cursor-pointer">
                <div class="w-12 h-12 bg-purple-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white/20 transition">
                    <svg class="w-6 h-6 text-purple-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a2 2 0 11-4 0V4zM4 13a2 2 0 012-2h2a2 2 0 012 2v3a2 2 0 01-2 2H6a2 2 0 01-2-2v-3z"></path></svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-white">Creative</h4>
                <p class="text-sm text-gray-500 group-hover:text-white/80">Design that makes an impact.</p>
            </div>
            <div class="glass p-6 rounded-2xl group hover:bg-pink-600 transition duration-500 cursor-pointer">
                <div class="w-12 h-12 bg-pink-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white/20 transition">
                    <svg class="w-6 h-6 text-pink-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-white">Growth</h4>
                <p class="text-sm text-gray-500 group-hover:text-white/80">Scaling your business rapidly.</p>
            </div>
            <div class="glass p-6 rounded-2xl group hover:bg-green-600 transition duration-500 cursor-pointer">
                <div class="w-12 h-12 bg-green-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-white/20 transition">
                    <svg class="w-6 h-6 text-green-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-white">Security</h4>
                <p class="text-sm text-gray-500 group-hover:text-white/80">Data protection at its best.</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-24 bg-gray-900/50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Premium Services</h2>
            <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($services as $service)
                <div class="glass overflow-hidden rounded-3xl hover:bg-white/10 transition group transform hover:-translate-y-2">
                    <div class="h-48 overflow-hidden relative">
                        <img src="{{ $service->image }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $service->title }}">
                        <div class="absolute inset-0 bg-indigo-600/20 group-hover:bg-transparent transition"></div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-4">{{ $service->title }}</h3>
                        <p class="text-gray-400 mb-6 line-clamp-2">{{ $service->description }}</p>
                        <a href="{{ route('services.show', $service->slug) }}" class="text-indigo-400 font-bold flex items-center group-hover:text-indigo-300">
                            Explore <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach

            <!-- Event Management Card -->
            <div class="glass overflow-hidden rounded-3xl hover:bg-white/10 transition group transform hover:-translate-y-2 border-2 border-indigo-600/30">
                <div class="h-48 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=1200&h=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="Event Management">
                    <div class="absolute inset-0 bg-indigo-600/20 group-hover:bg-transparent transition"></div>
                    <div class="absolute top-4 right-4 bg-indigo-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">New Service</div>
                </div>
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-4">Event Management</h3>
                    <p class="text-gray-400 mb-6 line-clamp-2">Complete event solutions. Rent tents, sound systems, cameras, and everything you need for a successful celebration.</p>
                    <a href="{{ route('events.index') }}" class="text-indigo-400 font-bold flex items-center group-hover:text-indigo-300">
                        Rent Equipment <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="py-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                <h2 class="text-4xl md:text-5xl font-bold mb-8 font-serif">We Build The <span class="gradient-text">Future of Digital</span></h2>
                <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                    With over a decade of experience in the digital landscape, we've helped hundreds of businesses transform their online presence. Our multidisciplinary team of designers, developers, and strategists work together to deliver exceptional results.
                </p>
                <div class="grid grid-cols-2 gap-8 mb-8">
                    <div>
                        <h4 class="text-4xl font-bold text-indigo-500 mb-2">500+</h4>
                        <p class="text-gray-500 uppercase tracking-widest text-sm">Projects Completed</p>
                    </div>
                    <div>
                        <h4 class="text-4xl font-bold text-indigo-500 mb-2">98%</h4>
                        <p class="text-gray-500 uppercase tracking-widest text-sm">Client Satisfaction</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 relative">
                <div class="glass p-4 rounded-3xl transform -rotate-3 hover:rotate-0 transition duration-500">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1200&h=800&auto=format&fit=crop" class="rounded-2xl shadow-2xl" alt="Our Team">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-24 bg-indigo-900/10">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Why Choose Us</h2>
            <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Innovation First</h3>
                <p class="text-gray-400">We stay ahead of the curve by implementing the latest technologies and methodologies in every project.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">On-Time Delivery</h3>
                <p class="text-gray-400">We value your time and stick to strict deadlines without compromising on the quality of our work.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-indigo-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Dedicated Support</h3>
                <p class="text-gray-400">Our relationship doesn't end at delivery. We provide ongoing support to ensure your continued success.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-24 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Client Success Stories</h2>
            <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="glass p-8 rounded-3xl relative">
                <div class="text-indigo-400 mb-4 flex">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
                <p class="text-gray-300 mb-6 italic">"The AI automation solutions provided by this team have completely transformed our operations. We've seen a 40% increase in efficiency."</p>
                <div class="flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/150?u=1" class="w-12 h-12 rounded-full border-2 border-indigo-600" alt="Client">
                    <div>
                        <h4 class="font-bold">Sarah Johnson</h4>
                        <p class="text-gray-500 text-sm">CEO, TechFlow</p>
                    </div>
                </div>
            </div>
            <div class="glass p-8 rounded-3xl relative">
                <div class="text-indigo-400 mb-4 flex">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
                <p class="text-gray-300 mb-6 italic">"Our new branding is perfect. They captured our essence beautifully and the response from our customers has been overwhelmingly positive."</p>
                <div class="flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/150?u=2" class="w-12 h-12 rounded-full border-2 border-indigo-600" alt="Client">
                    <div>
                        <h4 class="font-bold">Michael Chen</h4>
                        <p class="text-gray-500 text-sm">Founder, Artisan Co.</p>
                    </div>
                </div>
            </div>
            <div class="glass p-8 rounded-3xl relative">
                <div class="text-indigo-400 mb-4 flex">
                    @for($i=0; $i<5; $i++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    @endfor
                </div>
                <p class="text-gray-300 mb-6 italic">"The SEO results speak for themselves. We're now on the first page for all our major keywords, and our lead volume has doubled."</p>
                <div class="flex items-center space-x-4">
                    <img src="https://i.pravatar.cc/150?u=3" class="w-12 h-12 rounded-full border-2 border-indigo-600" alt="Client">
                    <div>
                        <h4 class="font-bold">Emily Rodriguez</h4>
                        <p class="text-gray-500 text-sm">Marketing Director, Globalize</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-gray-900/50">
    <div class="container mx-auto px-6 max-w-3xl">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4 font-serif">Frequently Asked Questions</h2>
            <div class="w-24 h-1 bg-indigo-600 mx-auto"></div>
        </div>
        <div class="space-y-4">
            <details class="glass p-6 rounded-2xl group">
                <summary class="list-none flex justify-between items-center cursor-pointer font-bold text-xl">
                    How long does a typical project take?
                    <svg class="w-6 h-6 transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <p class="mt-4 text-gray-400">Project timelines vary depending on complexity. A branding project usually takes 3-4 weeks, while a complex web application can take 3-6 months. We provide detailed timelines during the discovery phase.</p>
            </details>
            <details class="glass p-6 rounded-2xl group">
                <summary class="list-none flex justify-between items-center cursor-pointer font-bold text-xl">
                    Do you offer maintenance after delivery?
                    <svg class="w-6 h-6 transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <p class="mt-4 text-gray-400">Yes, we offer various maintenance packages to keep your website or application secure, up-to-date, and performing at its best.</p>
            </details>
            <details class="glass p-6 rounded-2xl group">
                <summary class="list-none flex justify-between items-center cursor-pointer font-bold text-xl">
                    What is your pricing model?
                    <svg class="w-6 h-6 transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </summary>
                <p class="mt-4 text-gray-400">We offer both fixed-price projects and monthly retainers, depending on your needs and the nature of the service. Contact us for a custom quote.</p>
            </details>
        </div>
    </div>
</section>

<!-- Contact/Inquiry Section -->
<section id="contact" class="py-24">
    <div class="container mx-auto px-6">
        <div class="glass p-12 rounded-3xl grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-4xl font-bold mb-6 font-serif">Get in Touch</h2>
                @if(session('success'))
                    <div class="bg-green-600/20 text-green-400 p-4 rounded-xl mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                <p class="text-gray-400 mb-8">Ready to start your project? Fill out the form and our team will get back to you within 24 hours.</p>
                
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-indigo-600/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span>info@vantagedigitalagency.co.ke</span>
                    </div>
                </div>
            </div>
            
            <form action="{{ route('inquiry.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="Name" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
                    <input type="email" name="email" placeholder="Email" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full">
                </div>
                <select name="service_id" class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full appearance-none">
                    <option value="" disabled selected>Select Service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" class="bg-gray-900">{{ $service->title }}</option>
                    @endforeach
                </select>
                <textarea name="message" rows="5" placeholder="Message" required class="bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-indigo-600 w-full"></textarea>
                <button type="submit" class="w-full py-4 bg-indigo-600 rounded-xl font-bold hover:bg-indigo-700 transition">Send Inquiry</button>
            </form>
        </div>
    </div>
</section>

<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    
    @keyframes spin-slow {
        from { transform: translate(-50%, -50%) rotate(0deg); }
        to { transform: translate(-50%, -50%) rotate(360deg); }
    }
    .animate-spin-slow { animation: spin-slow 20s linear infinite; }
    
    @keyframes reverse-spin-slow {
        from { transform: translate(-50%, -50%) rotate(360deg); }
        to { transform: translate(-50%, -50%) rotate(0deg); }
    }
    .animate-reverse-spin-slow { animation: reverse-spin-slow 25s linear infinite; }

    .typed-cursor {
        color: #6366f1;
        font-size: 1em;
        animation: blink 0.7s infinite;
    }
    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }
</style>

<script>
    // Typing Effect
    const headerElement = document.getElementById('typed-header');
    const words = ["Elevate Your", "Revolutionize Your", "Master Your", "Transform Your"];
    let wordIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let typeSpeed = 150;

    function type() {
        const currentWord = words[wordIndex];
        
        if (isDeleting) {
            headerElement.textContent = currentWord.substring(0, charIndex - 1);
            charIndex--;
            typeSpeed = 100;
        } else {
            headerElement.textContent = currentWord.substring(0, charIndex + 1);
            charIndex++;
            typeSpeed = 200;
        }

        if (!isDeleting && charIndex === currentWord.length) {
            isDeleting = true;
            typeSpeed = 1000; // Pause at end
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            wordIndex = (wordIndex + 1) % words.length;
            typeSpeed = 500;
        }

        setTimeout(type, typeSpeed);
    }

    document.addEventListener('DOMContentLoaded', () => {
        type();
    });
</script>
@endsection
