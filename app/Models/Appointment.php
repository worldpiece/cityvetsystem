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
        'pet_id',
        'title',
        'description',
        'appointment_start',
        'appointment_end'
    ];

    // public static function loadEvents()
    // {
    //     // get unit of the poster
    //     $unit = self::select('user_profiles.unit_id')
    //         ->join('user_profiles', 'events.user_id', 'user_profiles.user_id')
    //         ->where('audience', self::MY_UNIT)
    //         ->first();
    // }
}
