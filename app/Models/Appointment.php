<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'client_id',
        // 'client_name',
        'pet_id',
        'appointment_code',
        // 'appointment_type',
        'symptoms',
        'appointment_start',
        'appointment_end'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
