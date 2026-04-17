<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\EventBooking;
use App\Models\BookingItem;
use App\Mail\EventBookingInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class EventManagementController extends Controller
{
    public function index()
    {
        $services = EventService::where('is_active', true)->get()->groupBy('category');
        return view('events.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:event_services,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $booking = EventBooking::create([
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'location' => $request->location,
                'event_date' => $request->event_date,
                'notes' => $request->notes,
                'total_price' => 0, // Will update after adding items
            ]);

            $totalPrice = 0;
            foreach ($request->items as $itemData) {
                $service = EventService::find($itemData['id']);
                $itemTotal = $service->price * $itemData['quantity'];
                
                BookingItem::create([
                    'event_booking_id' => $booking->id,
                    'event_service_id' => $service->id,
                    'quantity' => $itemData['quantity'],
                    'unit_price' => $service->price,
                    'total' => $itemTotal,
                ]);

                $totalPrice += $itemTotal;
            }

            $booking->update(['total_price' => $totalPrice]);

            DB::commit();

            // Send email to admin
            Mail::to('info@vantagedigitalagency.co.ke')->send(new EventBookingInquiryMail($booking));

            return response()->json([
                'success' => true,
                'message' => 'Your event inquiry has been submitted successfully!',
                'booking_id' => $booking->id
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
