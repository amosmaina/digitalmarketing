@extends('layouts.app')

@section('content')
<div class="pt-32 md:pt-40">
    <!-- Banner Section -->
    <section class="relative overflow-hidden py-20">
        <div class="absolute inset-0 -z-10">
            <div class="absolute -top-20 left-0 h-80 w-80 rounded-full bg-yellow-500/10 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-yellow-500/10 blur-3xl"></div>
        </div>

        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-[1.2fr,0.8fr] gap-10 items-center">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-yellow-500 font-bold mb-4">Event Management</p>
                    <h1 class="text-5xl md:text-6xl font-bold font-serif mb-6 leading-tight">Plan your event with the exact items and support you need.</h1>
                    <p class="text-xl text-gray-300 max-w-2xl mb-8">
                        Choose from our event equipment and service options, build a quick request, and let our team handle setup, logistics, and delivery.
                    </p>

                    <div class="flex flex-wrap gap-4 mb-10">
                        <a href="#event-catalogue" class="px-8 py-4 btn-primary rounded-full">Hire Equipment</a>
                        <button onclick="openBookingModal()" class="px-8 py-4 btn-outline rounded-full">Start Planning</button>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 max-w-3xl">
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Available Categories</p>
                            <p class="text-3xl font-bold">{{ $services->count() }}</p>
                        </div>
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Bookable Items</p>
                            <p class="text-3xl font-bold">{{ $services->flatten()->count() }}</p>
                        </div>
                        <div class="glass rounded-2xl p-5 border border-white/10">
                            <p class="text-sm text-gray-400 mb-2">Support Included</p>
                            <p class="text-3xl font-bold">Full</p>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-[2rem] border border-white/10 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1400&auto=format&fit=crop" alt="Event setup" class="h-full min-h-[360px] w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Start Planning -->
    <div id="booking-modal" class="fixed inset-0 z-[60] hidden flex items-center justify-center p-4">
        <div class="absolute inset-0 modal-blur" onclick="closeBookingModal()"></div>
        <div class="glass w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-[2rem] border border-white/10 p-8 md:p-12 relative z-10 custom-scrollbar">
            <button onclick="closeBookingModal()" class="absolute top-6 right-6 text-gray-400 hover:text-white transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div id="booking-form-container">
                <h2 class="text-3xl md:text-4xl font-bold font-serif text-center mb-8">Begin Your Adventure With Us</h2>
                
                <div class="bg-green-600/10 border border-green-600/20 p-6 rounded-2xl mb-10 flex flex-col md:flex-row items-center gap-6">
                    <div class="w-20 h-20 shrink-0 bg-yellow-500 rounded-full flex items-center justify-center text-black font-bold text-center p-2 text-xs leading-tight">AWARD BADGE 2025</div>
                    <p class="text-green-400 text-sm">For your complete peace of mind, we are including comprehensive travel insurance for your entire trip with all bookings confirmed by 24 April 2026.</p>
                </div>

                <form id="multi-step-form" class="space-y-12">
                    @csrf
                    <!-- Step 1: Arrival & Details -->
                    <div id="step-1" class="step">
                        <div class="mb-8">
                            <p class="text-xs uppercase tracking-[0.3em] text-gray-500 font-bold mb-2">Step 1 of 5</p>
                            <h3 class="text-2xl font-bold">When would you like to join us?</h3>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-400">Preferred Arrival Date *</label>
                                <input type="date" name="arrival_date" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500">
                                <p class="text-xs text-gray-500">We are currently accepting bookings for travel through 2027.</p>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-400">Length of Stay (nights) *</label>
                                <input type="number" name="nights" min="1" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500">
                            </div>
                        </div>

                        <div class="space-y-4 mb-8">
                            <label class="block text-sm font-bold text-gray-400">My dates are *</label>
                            <div class="flex flex-wrap gap-6">
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="radio" name="date_type" value="Exact" required class="w-5 h-5 accent-yellow-500">
                                    <span>Exact</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer">
                                    <input type="radio" name="date_type" value="Approximate" class="w-5 h-5 accent-yellow-500">
                                    <span>Approximate</span>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-4 mb-10">
                            <label class="block text-sm font-bold text-gray-400">Tell us a bit about your visit *</label>
                            <div class="space-y-4">
                                <label class="flex items-start space-x-3 cursor-pointer p-4 rounded-xl border border-white/10 bg-white/5 hover:border-yellow-500/50 transition">
                                    <input type="radio" name="visit_details" value="First time on safari" required class="mt-1 w-5 h-5 accent-yellow-500">
                                    <span>This is my first time on safari; I'd love the classic experience.</span>
                                </label>
                                <label class="flex items-start space-x-3 cursor-pointer p-4 rounded-xl border border-white/10 bg-white/5 hover:border-yellow-500/50 transition">
                                    <input type="radio" name="visit_details" value="Experienced traveller" class="mt-1 w-5 h-5 accent-yellow-500">
                                    <span>I'm an experienced traveller interested in your unique offerings (e.g., walking safaris, photography).</span>
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="nextStep(2)" class="btn-primary px-12 py-4 rounded-full">Next</button>
                        </div>
                    </div>

                    <!-- Step 2: Safaris & Budget -->
                    <div id="step-2" class="step hidden">
                        <div class="mb-8">
                            <p class="text-xs uppercase tracking-[0.3em] text-gray-500 font-bold mb-2">Step 2 of 5</p>
                            <h3 class="text-2xl font-bold">Every safari is a unique journey, meticulously tailored.</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                            <label class="relative cursor-pointer group rounded-2xl overflow-hidden border-2 border-transparent hover:border-yellow-500 transition">
                                <input type="checkbox" name="selected_safaris[]" value="Kruger National Park" class="absolute top-4 right-4 w-6 h-6 z-10 accent-yellow-500">
                                <img src="https://images.unsplash.com/photo-1516422317184-268d71010db0?q=80&w=400" class="w-full h-40 object-cover opacity-60 group-hover:opacity-100 transition">
                                <div class="p-4 bg-gray-900/90">
                                    <p class="font-bold">Kruger National Park</p>
                                    <p class="text-xs text-gray-500 mt-1">Top safari destination, home to the Big Five.</p>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group rounded-2xl overflow-hidden border-2 border-transparent hover:border-yellow-500 transition">
                                <input type="checkbox" name="selected_safaris[]" value="Sabi Sands" class="absolute top-4 right-4 w-6 h-6 z-10 accent-yellow-500">
                                <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?q=80&w=400" class="w-full h-40 object-cover opacity-60 group-hover:opacity-100 transition">
                                <div class="p-4 bg-gray-900/90">
                                    <p class="font-bold">Sabi Sands</p>
                                    <p class="text-xs text-gray-500 mt-1">Premier private game reserve with exclusive experiences.</p>
                                </div>
                            </label>
                            <label class="relative cursor-pointer group rounded-2xl overflow-hidden border-2 border-transparent hover:border-yellow-500 transition">
                                <input type="checkbox" name="selected_safaris[]" value="Cape Town" class="absolute top-4 right-4 w-6 h-6 z-10 accent-yellow-500">
                                <img src="https://images.unsplash.com/photo-1580060839134-75a5edca2e99?q=80&w=400" class="w-full h-40 object-cover opacity-60 group-hover:opacity-100 transition">
                                <div class="p-4 bg-gray-900/90">
                                    <p class="font-bold">Cape Town</p>
                                    <p class="text-xs text-gray-500 mt-1">Stunning landscapes and world-class dining.</p>
                                </div>
                            </label>
                        </div>

                        <div class="space-y-4 mb-8">
                            <label class="block text-sm font-bold text-gray-400">How can we deliver happiness, are there any specific lodges or activities you are looking for?</label>
                            <textarea name="additional_activities" class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500 h-32" placeholder="Example: Special anniversary, focus on Big Five, interested in walking safaris"></textarea>
                        </div>

                        <div class="space-y-4 mb-10">
                            <label class="block text-sm font-bold text-gray-400">How should we proceed in terms of budget? *</label>
                            <select name="budget_range" required class="w-full bg-gray-800 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500 appearance-none">
                                <option value="Value for money luxury - approx. $1000 per person per day all-incl.">Value for money luxury - approx. $1000 per person per day all-incl.</option>
                                <option value="Ultra-luxury - approx. $2000+ per person per day all-incl.">Ultra-luxury - approx. $2000+ per person per day all-incl.</option>
                                <option value="Affordable safari - approx. $500 per person per day">Affordable safari - approx. $500 per person per day</option>
                            </select>
                            <p class="text-xs text-gray-500">The indicated price is inclusive of lodging, all meals, and daily safari activities (where applicable)</p>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="nextStep(1)" class="btn-outline px-12 py-4 rounded-full">Back</button>
                            <button type="button" onclick="nextStep(3)" class="btn-primary px-12 py-4 rounded-full">Next</button>
                        </div>
                    </div>

                    <!-- Step 3: Traveller Details -->
                    <div id="step-3" class="step hidden">
                        <div class="mb-8">
                            <p class="text-xs uppercase tracking-[0.3em] text-gray-500 font-bold mb-2">Step 3 of 5</p>
                            <h3 class="text-2xl font-bold">Traveller details</h3>
                        </div>

                        <div class="space-y-10 mb-10">
                            <div class="space-y-4">
                                <label class="block text-sm font-bold text-gray-400">Number of adults *</label>
                                <div class="flex flex-wrap gap-3">
                                    @for($i=1; $i<=8; $i++)
                                        <label class="cursor-pointer group">
                                            <input type="radio" name="adults" value="{{ $i }}" {{ $i==1 ? 'checked' : '' }} class="hidden peer">
                                            <div class="w-12 h-12 flex items-center justify-center rounded-lg border border-white/10 bg-white/5 peer-checked:bg-yellow-500 peer-checked:text-black font-bold transition">{{ $i }}</div>
                                        </label>
                                    @endfor
                                </div>
                            </div>

                            <div class="space-y-4">
                                <label class="block text-sm font-bold text-gray-400">Number of children *</label>
                                <div class="flex flex-wrap gap-3">
                                    @for($i=0; $i<=7; $i++)
                                        <label class="cursor-pointer group">
                                            <input type="radio" name="children" value="{{ $i }}" {{ $i==0 ? 'checked' : '' }} class="hidden peer">
                                            <div class="w-12 h-12 flex items-center justify-center rounded-lg border border-white/10 bg-white/5 peer-checked:bg-yellow-500 peer-checked:text-black font-bold transition">{{ $i }}</div>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="nextStep(2)" class="btn-outline px-12 py-4 rounded-full">Back</button>
                            <button type="button" onclick="nextStep(4)" class="btn-primary px-12 py-4 rounded-full">Next</button>
                        </div>
                    </div>

                    <!-- Step 4: Additional Services -->
                    <div id="step-4" class="step hidden">
                        <div class="mb-8">
                            <p class="text-xs uppercase tracking-[0.3em] text-gray-500 font-bold mb-2">Step 4 of 5</p>
                            <h3 class="text-2xl font-bold">Additional services</h3>
                            <p class="text-gray-400 mt-2">Leave it to us, we can handle everything related to your safari</p>
                        </div>

                        <div class="space-y-6 mb-10">
                            <label class="flex items-center gap-6 p-6 rounded-2xl border border-white/10 bg-white/5 hover:border-yellow-500/50 cursor-pointer transition">
                                <input type="checkbox" name="travel_insurance" value="1" class="w-6 h-6 shrink-0 accent-yellow-500">
                                <div>
                                    <p class="font-bold text-lg">Travel insurance</p>
                                    <p class="text-sm text-gray-500 mt-1">We have a trusted supplier relationship that ensures seamless setup with comprehensive cover at highly competitive rates.</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-6 p-6 rounded-2xl border border-white/10 bg-white/5 hover:border-yellow-500/50 cursor-pointer transition">
                                <input type="checkbox" name="international_flights" value="1" class="w-6 h-6 shrink-0 accent-yellow-500">
                                <div>
                                    <p class="font-bold text-lg">International flights</p>
                                    <p class="text-sm text-gray-500 mt-1">We can book your international and domestic flights, ensuring a seamless arrival and departure for your bespoke safari adventure.</p>
                                </div>
                            </label>
                            <label class="flex items-center gap-6 p-6 rounded-2xl border border-white/10 bg-white/5 hover:border-yellow-500/50 cursor-pointer transition">
                                <input type="checkbox" name="safari_hats" value="1" class="w-6 h-6 shrink-0 accent-yellow-500">
                                <div>
                                    <p class="font-bold text-lg">Safari.com hats</p>
                                    <p class="text-sm text-gray-500 mt-1">We have both a Panama Hat and a Bush Hat, available in two sizes. Select this option, and we'll contact you with the available choices.</p>
                                </div>
                            </label>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="nextStep(3)" class="btn-outline px-12 py-4 rounded-full">Back</button>
                            <button type="button" onclick="nextStep(5)" class="btn-primary px-12 py-4 rounded-full">Next</button>
                        </div>
                    </div>

                    <!-- Step 5: Contact Details -->
                    <div id="step-5" class="step hidden">
                        <div class="mb-8">
                            <p class="text-xs uppercase tracking-[0.3em] text-gray-500 font-bold mb-2">Step 5 of 5</p>
                            <h3 class="text-2xl font-bold">Your contact details</h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-400">Full Name *</label>
                                <input type="text" name="full_name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500">
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-bold text-gray-400">Email Address *</label>
                                <input type="email" name="email" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500">
                            </div>
                        </div>

                        <div class="space-y-2 mb-8">
                            <label class="block text-sm font-bold text-gray-400">Contact Number *</label>
                            <input type="text" name="phone" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500" placeholder="+254 700 000000">
                        </div>

                        <div class="space-y-4 mb-8">
                            <label class="block text-sm font-bold text-gray-400">Preferred contact method(s)</label>
                            <div class="flex flex-wrap gap-4">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="contact_methods[]" value="Email" class="w-5 h-5 accent-yellow-500">
                                    <span>Email</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="contact_methods[]" value="WhatsApp" class="w-5 h-5 accent-yellow-500">
                                    <span>WhatsApp</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="contact_methods[]" value="iMessage" class="w-5 h-5 accent-yellow-500">
                                    <span>iMessage</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="checkbox" name="contact_methods[]" value="Telephone" class="w-5 h-5 accent-yellow-500">
                                    <span>Telephone</span>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-4 mb-10">
                            <label class="block text-sm font-bold text-gray-400">Any additional comments? *</label>
                            <textarea name="additional_comments" required class="w-full bg-white/5 border border-white/10 rounded-xl px-6 py-4 focus:outline-none focus:border-yellow-500 h-32" placeholder="Share any details (special occasions, needs) so we can personalise your experience."></textarea>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="nextStep(4)" class="btn-outline px-12 py-4 rounded-full">Back</button>
                            <button type="submit" id="final-submit-btn" class="btn-primary px-12 py-4 rounded-full">Submit</button>
                        </div>
                    </div>
                </form>

                <!-- Footer info in modal -->
                <div class="mt-16 pt-10 border-t border-white/5 text-center text-xs text-gray-500 space-y-4">
                    <p>Recognised for Excellence - World Travel Awards, 2024 & 2025</p>
                    <p>Welcoming discerning guests since 2006. <a href="#" class="text-yellow-500">See our reviews.</a></p>
                    <div class="flex flex-wrap justify-center gap-6">
                        <span>SATSA Member</span>
                        <span>ATTA® Member</span>
                    </div>
                    <p>© Safari.com is operated under license by Afritrip Group (Pty) Ltd. <br> <a href="#" class="hover:text-white">Terms of Use</a> | <a href="#" class="hover:text-white">Privacy Policy</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Playful Events Section -->
    <section class="py-24 bg-white/5 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <p class="text-sm uppercase tracking-[0.3em] text-yellow-500 font-bold mb-4">What We Do</p>
                <h2 class="text-4xl md:text-5xl font-bold font-serif">Events We Handle With Flair</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="glass p-8 rounded-[2.5rem] border border-white/10 hover:border-yellow-500/50 transition group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-500/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 transition duration-500">
                        <svg class="w-8 h-8 text-yellow-500 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Corporate Events</h3>
                    <p class="text-gray-400">From AGMs to product launches, Vantage delivers professional excellence with a touch of sophistication.</p>
                </div>

                <div class="glass p-8 rounded-[2.5rem] border border-white/10 hover:border-yellow-500/50 transition group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-500/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 transition duration-500">
                        <svg class="w-8 h-8 text-yellow-500 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Social Gatherings</h3>
                    <p class="text-gray-400">Weddings, birthdays, or anniversaries. We create memories that last a lifetime with our unique setups.</p>
                </div>

                <div class="glass p-8 rounded-[2.5rem] border border-white/10 hover:border-yellow-500/50 transition group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-500/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 transition duration-500">
                        <svg class="w-8 h-8 text-yellow-500 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Concerts & Festivals</h3>
                    <p class="text-gray-400">High-end sound, lighting, and stage management for the ultimate entertainment experience.</p>
                </div>

                <div class="glass p-8 rounded-[2.5rem] border border-white/10 hover:border-yellow-500/50 transition group hover:-translate-y-2">
                    <div class="w-16 h-16 bg-yellow-500/10 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 transition duration-500">
                        <svg class="w-8 h-8 text-yellow-500 group-hover:text-black transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Exhibitions</h3>
                    <p class="text-gray-400">Bespoke booth designs and logistics for trade fairs that make your brand stand out.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Moments Section (Experience the Vibe) -->
    <section class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
                <div class="max-w-2xl">
                    <p class="text-sm uppercase tracking-[0.3em] text-yellow-500 font-bold mb-4">Experience the Vibe</p>
                    <h2 class="text-4xl md:text-6xl font-bold font-serif leading-tight">Vantage <span class="text-yellow-500">Moments</span></h2>
                    <p class="text-gray-400 mt-6 text-lg">See our setups in action. From luxury weddings to corporate galas, we bring the energy and elegance to every event.</p>
                </div>
                <a href="https://www.instagram.com/vantagedigitalagency" target="_blank" class="flex items-center space-x-4 glass p-4 pr-8 rounded-full hover:bg-white/10 transition group shrink-0">
                    <div class="w-14 h-14 bg-gradient-to-tr from-yellow-400 via-yellow-500 to-yellow-600 rounded-full flex items-center justify-center text-white shadow-lg shadow-yellow-500/20 group-hover:scale-110 transition duration-500">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.336 3.608 1.31.974.974 1.248 2.242 1.31 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.336 2.633-1.31 3.608-.974.974-2.242 1.248-3.608 1.31-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.336-3.608-1.31-.974-.974-1.248-2.242-1.31-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.336-2.633 1.31-3.608.974-.974 2.242-1.248 3.608-1.31 1.266-.058 1.646-.07 4.85-.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.337 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948s-.014-3.667-.072-4.947c-.2-4.337-2.618-6.78-6.98-6.98-1.281-.058-1.689-.072-4.948-.072zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-white text-lg group-hover:text-yellow-500 transition">@vantage_events</p>
                        <p class="text-xs text-gray-500">Follow on Instagram</p>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-6">
                <!-- Item 1: Video -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-900 video-card">
                    <video muted loop playsinline preload="auto" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-luxury-wedding-party-reception-4015-large.mp4" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-100 group-hover:opacity-0 transition duration-500 pointer-events-none">
                        <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-500 text-[10px] font-bold text-black rounded-full uppercase tracking-tighter">Vantage</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Luxury Wedding Setup</p>
                    </div>
                </div>

                <!-- Item 2: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Corporate</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Grand Ballroom Gala</p>
                    </div>
                </div>

                <!-- Item 3: Video -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-900 video-card">
                    <video muted loop playsinline preload="auto" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-people-dancing-at-a-party-with-disco-lights-4436-large.mp4" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-100 group-hover:opacity-0 transition duration-500 pointer-events-none">
                        <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-500 text-[10px] font-bold text-black rounded-full uppercase tracking-tighter">Energy</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Dance Floor Production</p>
                    </div>
                </div>

                <!-- Item 4: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Concert</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Stage & Sound Setup</p>
                    </div>
                </div>

                <!-- Item 5: Video -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-900 video-card">
                    <video muted loop playsinline preload="auto" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-luxury-hotel-pool-at-night-with-blue-lights-4328-large.mp4" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-100 group-hover:opacity-0 transition duration-500 pointer-events-none">
                        <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-500 text-[10px] font-bold text-black rounded-full uppercase tracking-tighter">Vibe</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Nightlife Elegance</p>
                    </div>
                </div>

                <!-- Item 6: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group lg:col-start-1">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Catering</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Exquisite Presentation</p>
                    </div>
                </div>

                <!-- Item 7: Video -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group bg-slate-900 video-card">
                    <video muted loop playsinline preload="auto" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:opacity-100 transition duration-700">
                        <source src="https://assets.mixkit.co/videos/preview/mixkit-close-up-of-sparkling-wine-being-poured-into-a-glass-2384-large.mp4" type="video/mp4">
                    </video>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>
                    <div class="absolute inset-0 flex items-center justify-center opacity-100 group-hover:opacity-0 transition duration-500 pointer-events-none">
                        <div class="w-16 h-16 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500 pointer-events-none">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-500 text-[10px] font-bold text-black rounded-full uppercase tracking-tighter">Toast</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Champagne Moments</p>
                    </div>
                </div>

                <!-- Item 8: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1505236858219-8359eb29e329?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Garden</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Outdoor Reception</p>
                    </div>
                </div>

                <!-- Item 9: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Details</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Floral Masterpieces</p>
                    </div>
                </div>

                <!-- Item 10: Image -->
                <div class="aspect-[4/5] relative rounded-[2rem] overflow-hidden group">
                    <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=800&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-700" alt="Event Moment">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 right-6 translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="px-2 py-0.5 bg-yellow-600 text-[10px] font-bold text-white rounded-full uppercase tracking-tighter">Production</span>
                        </div>
                        <p class="text-sm font-bold text-white leading-tight">Massive Event Management</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rest of the catalogue section -->
    <section id="event-catalogue" class="pb-20">
        <div class="container mx-auto px-6 grid grid-cols-1 xl:grid-cols-[1.35fr,0.85fr] gap-8 items-start">
            <div class="space-y-10">
                @forelse($services as $category => $items)
                    <section class="glass rounded-[2rem] p-8 border border-white/10">
                        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-8">
                            <div>
                                <p class="text-sm uppercase tracking-[0.3em] text-gray-500 font-bold mb-3">Category</p>
                                <h2 class="text-3xl font-bold font-serif">{{ $category }}</h2>
                            </div>
                            <p class="text-gray-400">{{ $items->count() }} item{{ $items->count() > 1 ? 's' : '' }} available</p>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                            @foreach($items as $item)
                                <article class="rounded-2xl overflow-hidden bg-white/[0.03] border border-white/10 hover:border-yellow-500/40 transition group">
                                    <div class="h-32 overflow-hidden relative">
                                        @if($item->image)
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                        @else
                                            <div class="w-full h-full bg-gradient-to-br from-yellow-500/20 via-slate-900 to-amber-500/20 flex items-center justify-center">
                                                <span class="text-yellow-500/30 font-bold text-[10px] uppercase tracking-widest text-center px-2">Vantage</span>
                                            </div>
                                        @endif
                                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                                    </div>

                                    <div class="p-3 space-y-2">
                                        <div>
                                            <h3 class="text-sm font-bold truncate">{{ $item->name }}</h3>
                                            <p class="text-[10px] text-gray-500 line-clamp-1 leading-tight">{{ $item->description ?: 'Available for booking.' }}</p>
                                        </div>

                                        <div class="flex items-center justify-between gap-2">
                                            <div class="min-w-0">
                                                <p class="text-sm font-bold text-yellow-500 truncate">{{ number_format($item->price, 0) }}</p>
                                                <p class="text-[9px] text-gray-500 truncate">{{ $item->unit }}</p>
                                            </div>

                                            <button
                                                type="button"
                                                onclick="addItem({{ $item->id }}, @js($item->name), {{ $item->price }})"
                                                class="shrink-0 p-2 rounded-lg bg-yellow-500 text-black hover:bg-yellow-600 transition"
                                                title="Add to Quote"
                                            >
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @empty
                    <div class="glass rounded-[2rem] p-10 border border-dashed border-white/10 text-center text-gray-400">
                        No active event items are available yet. Add them from the backend event management section and they will show here automatically.
                    </div>
                @endforelse
            </div>

            <aside id="event-quote" class="xl:sticky xl:top-28 space-y-6">
                <div class="glass rounded-[2rem] p-8 border border-white/10">
                    <h2 class="text-3xl font-bold font-serif mb-3">Your Event Quote</h2>
                    <p class="text-gray-400 mb-6">Select event items from the catalogue, review the estimate here, then send your booking request.</p>

                    <div id="selected-items" class="space-y-4 mb-8 max-h-[22rem] overflow-y-auto pr-2 custom-scrollbar">
                        <p class="text-gray-500 text-center py-6">No items selected yet.</p>
                    </div>

                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Selected quantity</span>
                            <span id="total-items-count" class="font-bold">0</span>
                        </div>
                        <div class="flex justify-between items-center text-xl">
                            <span class="font-bold">Estimated total</span>
                            <span id="total-price" class="font-bold text-yellow-500">0.00 KES</span>
                        </div>
                    </div>
                </div>

                <div class="glass rounded-[2rem] p-8 border border-white/10">
                    <h3 class="text-2xl font-bold mb-6">Send Booking Request</h3>

                    <form id="booking-form" class="space-y-4">
                        @csrf
                        <input type="text" name="customer_name" placeholder="Full Name" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500">
                        <input type="email" name="email" placeholder="Email Address" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500">
                        <input type="text" name="phone" placeholder="Phone Number" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500">
                        <input type="text" name="location" placeholder="Event Location" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500">

                        <div class="space-y-2">
                            <label class="text-xs text-gray-500 uppercase tracking-[0.25em] font-bold px-1">Event Date</label>
                            <input type="date" name="event_date" required class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500">
                        </div>

                        <textarea name="notes" placeholder="Share guest count, setup needs, venue timing, or any special instructions." class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 focus:outline-none focus:border-yellow-500 h-28"></textarea>

                        <button type="submit" id="submit-btn" class="w-full py-4 btn-primary rounded-2xl font-bold disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            Submit Inquiry
                        </button>
                    </form>
                </div>
            </aside>
        </div>
    </section>
</div>

<script>
    function openBookingModal() {
        document.getElementById('booking-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeBookingModal() {
        document.getElementById('booking-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function nextStep(step) {
        document.querySelectorAll('.step').forEach(el => el.classList.add('hidden'));
        document.getElementById('step-' + step).classList.remove('hidden');
    }

    let selectedItems = [];

    function addItem(id, name, price) {
        const existing = selectedItems.find(item => item.id === id);
        if (existing) { existing.quantity += 1; } 
        else { selectedItems.push({ id, name, price, quantity: 1 }); }
        renderItems();
    }

    function removeItem(id) {
        selectedItems = selectedItems.filter(item => item.id !== id);
        renderItems();
    }

    function updateQuantity(id, delta) {
        const item = selectedItems.find(entry => entry.id === id);
        if (!item) return;
        item.quantity += delta;
        if (item.quantity <= 0) { removeItem(id); return; }
        renderItems();
    }

    function renderItems() {
        const container = document.getElementById('selected-items');
        const totalPriceEl = document.getElementById('total-price');
        const totalCountEl = document.getElementById('total-items-count');
        const submitBtn = document.getElementById('submit-btn');

        if (selectedItems.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-6">No items selected yet.</p>';
            totalPriceEl.textContent = '0.00 KES';
            totalCountEl.textContent = '0';
            submitBtn.disabled = true;
            return;
        }

        let total = 0;
        let count = 0;
        container.innerHTML = selectedItems.map(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            count += item.quantity;
            return `
                <div class="rounded-2xl bg-white/5 border border-white/10 p-4">
                    <div class="flex items-start justify-between gap-3">
                        <div class="flex-1">
                            <p class="font-bold">${item.name}</p>
                            <p class="text-xs text-gray-500 mt-1">${item.price.toLocaleString()} KES each</p>
                        </div>
                        <button type="button" onclick="removeItem(${item.id})" class="text-red-400 hover:text-red-300 transition text-sm">Remove</button>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center bg-black/20 rounded-xl px-2 py-1">
                            <button type="button" onclick="updateQuantity(${item.id}, -1)" class="px-2 text-yellow-500 hover:text-white transition">-</button>
                            <span class="px-3 text-sm font-bold">${item.quantity}</span>
                            <button type="button" onclick="updateQuantity(${item.id}, 1)" class="px-2 text-yellow-500 hover:text-white transition">+</button>
                        </div>
                        <p class="font-bold text-yellow-500">${itemTotal.toLocaleString()} KES</p>
                    </div>
                </div>
            `;
        }).join('');

        totalPriceEl.textContent = total.toLocaleString() + ' KES';
        totalCountEl.textContent = count;
        submitBtn.disabled = false;
    }

    // Handle Multi-step Form Submission
    document.getElementById('multi-step-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = document.getElementById('final-submit-btn');
        btn.disabled = true;
        btn.textContent = 'Submitting...';

        const formData = new FormData(e.target);
        
        try {
            const response = await fetch('{{ route('events.request') }}', {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });
            const result = await response.json();
            if (result.success) { window.location.href = result.redirect; } 
            else { alert(result.message || 'Error submitting form'); }
        } catch (error) {
            alert('Something went wrong. Please check your connection.');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Submit';
        }
    });

    document.getElementById('booking-form').addEventListener('submit', async (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        const data = Object.fromEntries(formData.entries());
        data.items = selectedItems;
        const button = document.getElementById('submit-btn');
        button.disabled = true;
        button.textContent = 'Submitting...';

        try {
            const response = await fetch('{{ route('events.book') }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                body: JSON.stringify(data)
            });
            const result = await response.json();
            if (!response.ok) { alert(result.message || 'Something went wrong.'); return; }
            alert(result.message);
            selectedItems = [];
            event.target.reset();
            renderItems();
        } catch (error) {
            alert('Something went wrong.');
        } finally {
            button.disabled = false;
            button.textContent = 'Submit Inquiry';
        }
    });
</script>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.14); border-radius: 9999px; }
</style>
@endsection
