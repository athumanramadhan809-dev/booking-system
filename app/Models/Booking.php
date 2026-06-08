<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
}
protected $fillable = [
    'user_id',
    'service_id',
    'status',
    'booking_date',
    'time_slot'
];

public function service()
{
    return $this->belongsTo(\App\Models\Service::class);
}
}
