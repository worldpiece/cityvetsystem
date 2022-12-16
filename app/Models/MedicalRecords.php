<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;

class MedicalRecords extends Model
{
    use HasFactory;
    
    public function pets()
    {
        return $this->hasMany(Pet::class, 'id', 'pet_id');
        // return $this->hasMany('id', 'pet_id');
    }
}
