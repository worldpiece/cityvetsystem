<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pet;
use App\Models\Client;

class PetDatatables extends Component
{
    public function render()
    {
        $pets = Pet::all();
        // $owner = 
        // dd($pets);
        // return view('livewire.pet-datatables', ['pets' => $pets, 'owner' => $owner]);
        return view('livewire.pet-datatables', ['pets' => $pets]);
    }
}
