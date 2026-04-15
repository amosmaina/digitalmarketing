<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('seo')
        @yield('seo')
    @else
        <title>Digital Services - Premium Solutions</title>
        <meta name="description" content="We offer premium digital solutions ranging from branding to AI automation.">
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/framer-motion@10.12.16/dist/framer-motion.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .gradient-text { background: linear-gradient(45deg, #6366f1, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-gray-950 text-white overflow-x-hidden">
    <div id="app">
        <header class="fixed w-full z-50">
            <!-- Social Media Top Strip -->
            <div class="bg-indigo-600/10 border-b border-white/5 py-2 hidden md:block backdrop-blur-md">
                <div class="container mx-auto px-6 flex justify-between items-center text-xs text-gray-400">
                    <div class="flex items-center space-x-6">
                        <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> contact@digital.com</span>
                        <span class="flex items-center"><svg class="w-3.5 h-3.5 mr-2 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> +1 234 567 890</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="#" class="hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.336 3.608 1.31.974.974 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.336 2.633-1.31 3.608-.974.974-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.336-3.608-1.31-.974-.974-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.336-2.633 1.31-3.608.974-.974 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                        <a href="#" class="hover:text-white transition"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    </div>
                </div>
            </div>
            
            <nav class="glass backdrop-blur-md">
                <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center font-bold text-xl">D</div>
                    <span class="text-2xl font-bold gradient-text">DIGITAL</span>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="hamburger-icon" class="block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ url('/') }}" class="hover:text-indigo-400 transition">Home</a>
                    <a href="{{ url('/#about') }}" class="hover:text-indigo-400 transition">About</a>
                    <div class="relative group py-4">
                        <button class="hover:text-indigo-400 transition flex items-center">
                            Services <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute top-full left-0 w-64 pt-2 opacity-0 group-hover:opacity-100 transition-all pointer-events-none group-hover:pointer-events-auto">
                            <div class="glass rounded-xl overflow-hidden shadow-2xl">
                                @php $services = \App\Models\Service::all(); @endphp
                                @foreach($services as $service)
                                    <a href="{{ url('/services/' . $service->slug) }}" class="block px-4 py-3 hover:bg-white/10 transition">{{ $service->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('/#contact') }}" class="hover:text-indigo-400 transition">Contact</a>
                    @guest
                        <a href="{{ route('login') }}" class="px-6 py-2 bg-indigo-600 rounded-full hover:bg-indigo-700 transition">Login</a>
                    @else
                        <div class="relative group py-4">
                            <button class="hover:text-indigo-400 transition flex items-center">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="absolute top-full right-0 w-48 pt-2 opacity-0 group-hover:opacity-100 transition-all pointer-events-none group-hover:pointer-events-auto">
                                <div class="glass rounded-xl overflow-hidden shadow-2xl">
                                    <a href="{{ url('/dashboard') }}" class="block px-4 py-3 hover:bg-white/10 transition">Dashboard</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-3 hover:bg-white/10 transition">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </nav>

            <!-- Mobile Menu Overlay -->
            <div id="mobile-menu" class="fixed inset-0 bg-gray-950 z-[9999] hidden md:hidden flex flex-col">
                <div class="flex justify-between items-center px-6 py-4 border-b border-white/5 bg-gray-950">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 bg-indigo-600 rounded-lg flex items-center justify-center font-bold text-xl">D</div>
                        <span class="text-2xl font-bold gradient-text">DIGITAL</span>
                    </a>
                    <button id="close-mobile-menu" class="text-white focus:outline-none p-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <div class="flex-1 overflow-y-auto px-6 py-8">
                    <div class="flex flex-col space-y-8">
                        <div class="space-y-4">
                            <p class="text-gray-500 text-xs uppercase tracking-[0.2em] font-bold">Navigation</p>
                            <div class="grid grid-cols-1 gap-4">
                                <a href="{{ url('/') }}" class="text-3xl font-bold hover:text-indigo-400 transition">Home</a>
                                <a href="{{ url('/#about') }}" class="text-3xl font-bold hover:text-indigo-400 transition">About</a>
                                <a href="{{ url('/#contact') }}" class="text-3xl font-bold hover:text-indigo-400 transition">Contact</a>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <p class="text-gray-500 text-xs uppercase tracking-[0.2em] font-bold">Our Services</p>
                            <div class="grid grid-cols-1 gap-4">
                                @foreach($services as $service)
                                    <a href="{{ url('/services/' . $service->slug) }}" class="flex items-center group">
                                        <div class="w-1.5 h-1.5 bg-indigo-600 rounded-full mr-4 group-hover:scale-150 transition"></div>
                                        <span class="text-xl text-gray-300 group-hover:text-white transition">{{ $service->title }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-8 border-t border-white/5 space-y-6">
                            @guest
                                <a href="{{ route('login') }}" class="block w-full py-4 bg-indigo-600 rounded-2xl text-center font-bold text-lg shadow-lg shadow-indigo-600/20">Login to Account</a>
                            @else
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-indigo-600/20 rounded-full flex items-center justify-center font-bold text-indigo-400">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <p class="font-bold">{{ Auth::user()->name }}</p>
                                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-500 hover:text-indigo-400">View Dashboard</a>
                                        </div>
                                    </div>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="p-3 bg-red-500/10 text-red-500 rounded-xl">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    </a>
                                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>

                <!-- Footer in Menu -->
                <div class="px-6 py-8 border-t border-white/5 bg-gray-950">
                    <p class="text-gray-500 text-xs uppercase tracking-[0.2em] font-bold mb-6 text-center">Follow Us</p>
                    <div class="flex justify-center space-x-8">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.336 3.608 1.31.974.974 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.336 2.633-1.31 3.608-.974.974-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.336-3.608-1.31-.974-.974-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.336-2.633 1.31-3.608.974-.974 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="bg-gray-900 py-12">
            <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
                <div>
                    <h3 class="text-xl font-bold mb-6">Digital Services</h3>
                    <p class="text-gray-400">Transforming ideas into digital reality with cutting-edge technology and creative design.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-6">Services</h3>
                    <ul class="space-y-4 text-gray-400">
                        @foreach($services as $service)
                            <li><a href="{{ url('/services/' . $service->slug) }}" class="hover:text-white transition">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-6">Company</h3>
                    <ul class="space-y-4 text-gray-400">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-6">Newsletter</h3>
                    <form class="flex">
                        <input type="email" placeholder="Email" class="bg-gray-800 px-4 py-2 rounded-l-lg focus:outline-none w-full">
                        <button class="bg-indigo-600 px-4 py-2 rounded-r-lg hover:bg-indigo-700 transition">Join</button>
                    </form>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
                &copy; {{ date('Y') }} Digital Services. All rights reserved.
            </div>
        </footer>
    </div>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMobileMenu = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        function toggleMenu(show) {
            if (show) {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        mobileMenuButton.addEventListener('click', () => toggleMenu(true));
        closeMobileMenu.addEventListener('click', () => toggleMenu(false));

        // Close menu when clicking on links
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => toggleMenu(false));
        });
    </script>
</body>
</html>
