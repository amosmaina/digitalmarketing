@component('mail::message')
# New Event Booking Inquiry

You have received a new inquiry for event management services.

**Customer Details:**
- **Name:** {{ $booking->customer_name }}
- **Email:** {{ $booking->email }}
- **Phone:** {{ $booking->phone }}
- **Location:** {{ $booking->location }}
- **Event Date:** {{ \Carbon\Carbon::parse($booking->event_date)->format('M d, Y') }}

**Selected Items:**
@foreach($booking->items as $item)
- {{ $item->service->name }} (x{{ $item->quantity }}) - {{ number_format($item->total, 2) }} KES
@endforeach

**Total Estimated Price:** {{ number_format($booking->total_price, 2) }} KES

**Notes:**
{{ $booking->notes ?? 'No additional notes provided.' }}

@component('mail::button', ['url' => url('/admin/event-bookings/' . $booking->id)])
Review in Backend
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
