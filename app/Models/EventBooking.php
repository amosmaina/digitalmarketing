<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'location',
        'event_date',
        'total_price',
        'status',
        'notes'
    ];

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }
}
