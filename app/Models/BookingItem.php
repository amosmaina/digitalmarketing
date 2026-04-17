<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_booking_id',
        'event_service_id',
        'quantity',
        'unit_price',
        'total'
    ];

    public function service()
    {
        return $this->belongsTo(EventService::class, 'event_service_id');
    }

    public function booking()
    {
        return $this->belongsTo(EventBooking::class, 'event_booking_id');
    }
}
