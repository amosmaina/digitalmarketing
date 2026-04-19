<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'arrival_date', 'nights', 'date_type', 'visit_details',
        'selected_safaris', 'additional_activities', 'budget_range',
        'adults', 'children',
        'travel_insurance', 'international_flights', 'safari_hats',
        'full_name', 'email', 'phone', 'contact_methods', 'additional_comments'
    ];

    protected $casts = [
        'selected_safaris' => 'array',
        'contact_methods' => 'array',
        'travel_insurance' => 'boolean',
        'international_flights' => 'boolean',
        'safari_hats' => 'boolean',
        'arrival_date' => 'date'
    ];
}
