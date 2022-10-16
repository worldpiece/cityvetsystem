<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'gender',
        'birth_date',
        'age',
        'pet_classification',
        'owner_id'
    ];

    public function pets()
    {
        return $this->belongsTo(Client::class, 'owner_id', 'id');
    }
}
