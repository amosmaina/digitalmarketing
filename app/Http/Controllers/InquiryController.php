<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InquiryMail;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service_id' => 'nullable|exists:services,id',
            'message' => 'required|string'
        ]);

        $inquiry = Inquiry::create($validated);

        // Send Email to the owner
        Mail::to('info@vantagedigitalagency.co.ke')->send(new InquiryMail($inquiry));

        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }
}
