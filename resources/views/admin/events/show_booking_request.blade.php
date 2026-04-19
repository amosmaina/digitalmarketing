@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 pt-32 pb-20">
    <div class="mb-12 flex justify-between items-end">
        <div>
            <a href="{{ route('admin.booking-requests.index') }}" class="text-yellow-500 flex items-center mb-4">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Requests
            </a>
            <h1 class="text-4xl font-bold font-serif">Request from {{ $request->full_name }}</h1>
        </div>
        <div class="flex gap-4">
            <a href="mailto:{{ $request->email }}?subject=Re: Your Adventure Request - Vantage Digital Agency" class="btn-outline px-6 py-3 rounded-full">Email Client</a>
            <form action="{{ route('admin.invoices.store') }}" method="POST">
                @csrf
                <input type="hidden" name="client_id" value="{{ \App\Models\Client::where('email', $request->email)->first()?->id }}">
                <input type="hidden" name="description" value="Adventure Booking: {{ $request->visit_details }}">
                <input type="hidden" name="total_amount" value="0"> {{-- Admin will fill this in the invoice edit page --}}
                <button type="submit" class="btn-primary px-6 py-3 rounded-full">Generate Invoice</button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <!-- Adventure Details -->
            <div class="glass p-8 rounded-[2rem] border border-white/10">
                <h2 class="text-2xl font-bold mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Adventure Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Arrival Date</p>
                        <p class="text-xl">{{ $request->arrival_date->format('l, M d, Y') }} ({{ $request->date_type }})</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Length of Stay</p>
                        <p class="text-xl">{{ $request->nights }} Nights</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Travellers</p>
                        <p class="text-xl">{{ $request->adults }} Adults, {{ $request->children }} Children</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Budget Range</p>
                        <p class="text-xl text-yellow-500 font-bold">{{ $request->budget_range }}</p>
                    </div>
                </div>

                <div class="mt-10">
                    <p class="text-xs uppercase text-gray-500 font-bold mb-3">Selected Destinations/Safaris</p>
                    <div class="flex flex-wrap gap-2">
                        @if($request->selected_safaris)
                            @foreach($request->selected_safaris as $safari)
                                <span class="px-4 py-2 bg-yellow-500/10 border border-yellow-500/20 text-yellow-500 rounded-full text-sm font-bold">{{ $safari }}</span>
                            @endforeach
                        @else
                            <span class="text-gray-500 italic">No specific safaris selected</span>
                        @endif
                    </div>
                </div>

                <div class="mt-10">
                    <p class="text-xs uppercase text-gray-500 font-bold mb-3">Visit Details/Experience Type</p>
                    <p class="text-lg text-gray-300 bg-white/5 p-4 rounded-xl border border-white/5 italic">"{{ $request->visit_details }}"</p>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="glass p-8 rounded-[2rem] border border-white/10">
                <h2 class="text-2xl font-bold mb-6">Additional Information</h2>
                <div class="space-y-8">
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-2">Activities & Interests</p>
                        <p class="text-gray-300 leading-relaxed">{{ $request->additional_activities ?: 'None provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-2">Customer Comments</p>
                        <p class="text-gray-300 leading-relaxed">{{ $request->additional_comments ?: 'None provided' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <!-- Contact Card -->
            <div class="glass p-8 rounded-[2rem] border border-white/10">
                <h2 class="text-xl font-bold mb-6">Contact Info</h2>
                <div class="space-y-6">
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Full Name</p>
                        <p class="text-lg font-bold">{{ $request->full_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Email</p>
                        <p class="text-lg">{{ $request->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Phone</p>
                        <p class="text-lg">{{ $request->phone }}</p>
                    </div>
                    <div>
                        <p class="text-xs uppercase text-gray-500 font-bold mb-1">Preferred Methods</p>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @if($request->contact_methods)
                                @foreach($request->contact_methods as $method)
                                    <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-xs">{{ $method }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Requested -->
            <div class="glass p-8 rounded-[2rem] border border-white/10">
                <h2 class="text-xl font-bold mb-6">Extras Requested</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-xl {{ $request->travel_insurance ? 'bg-green-600/10 border border-green-600/20 text-green-400' : 'bg-white/5 text-gray-500 opacity-50' }}">
                        <span>Travel Insurance</span>
                        @if($request->travel_insurance) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> @endif
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl {{ $request->international_flights ? 'bg-green-600/10 border border-green-600/20 text-green-400' : 'bg-white/5 text-gray-500 opacity-50' }}">
                        <span>International Flights</span>
                        @if($request->international_flights) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> @endif
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-xl {{ $request->safari_hats ? 'bg-green-600/10 border border-green-600/20 text-green-400' : 'bg-white/5 text-gray-500 opacity-50' }}">
                        <span>Safari Hats</span>
                        @if($request->safari_hats) <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg> @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
