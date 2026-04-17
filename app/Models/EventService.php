<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'price',
        'unit',
        'description',
        'image',
        'is_active'
    ];
}
