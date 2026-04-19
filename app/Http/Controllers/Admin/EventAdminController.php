<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventService;
use App\Models\EventBooking;
use App\Models\BookingRequest;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventAdminController extends Controller
{
    public function services()
    {
        $services = EventService::orderBy('category')->orderBy('name')->get();
        $categorySummary = EventService::selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get();
        $activeServicesCount = EventService::where('is_active', true)->count();

        return view('admin.events.services', compact('services', 'categorySummary', 'activeServicesCount'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'unit' => 'required|string|max:50',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only([
            'name',
            'category',
            'price',
            'unit',
            'description',
        ]);
        $data['is_active'] = $request->boolean('is_active');
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('event-services', 'public');
            $data['image'] = Storage::url($path);
        }

        EventService::create($data);

        return back()->with('success', 'Event service added successfully!');
    }

    public function destroyService(EventService $service)
    {
        $service->delete();
        return back()->with('success', 'Service removed successfully.');
    }

    public function bookings()
    {
        $bookings = EventBooking::with('items.service')->latest()->get();
        return view('admin.events.bookings', compact('bookings'));
    }

    public function showBooking(EventBooking $booking)
    {
        $booking->load('items.service');
        return view('admin.events.show_booking', compact('booking'));
    }

    public function generateInvoice(EventBooking $booking)
    {
        // 1. Find or Create Client
        $client = Client::firstOrCreate(
            ['email' => $booking->email],
            [
                'name' => $booking->customer_name,
                'phone' => $booking->phone
            ]
        );

        // 2. Create Invoice
        $invoice = Invoice::create([
            'client_id' => $client->id,
            'invoice_number' => 'EVT-' . strtoupper(Str::random(8)),
            'due_date' => now()->addDays(7),
            'total_amount' => $booking->total_price,
            'status' => 'pending'
        ]);

        // 3. Add Items to Invoice
        foreach ($booking->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $item->service->name . ' (Event Rental)',
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'total' => $item->total
            ]);
        }

        $booking->update(['status' => 'invoiced']);

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice generated from event booking!');
    }

    public function bookingRequests()
    {
        $requests = BookingRequest::latest()->paginate(15);
        return view('admin.events.booking_requests', compact('requests'));
    }

    public function showBookingRequest(BookingRequest $request)
    {
        return view('admin.events.show_booking_request', compact('request'));
    }
}
