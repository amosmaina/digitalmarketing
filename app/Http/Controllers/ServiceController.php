<?php

namespace App\Http\Controllers;

use App\Models\EventService;
use App\Models\Service;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $eventServices = EventService::where('is_active', true)
            ->orderBy('category')
            ->orderBy('name')
            ->get();
        $eventCategories = $eventServices->groupBy('category');

        return view('welcome', compact('services', 'eventServices', 'eventCategories'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }

    public function downloadBrochure($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        
        $pdf = Pdf::loadView('pdf.brochure', compact('service'));
        return $pdf->download($service->slug . '-brochure.pdf');
    }
}
