<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

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
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
