<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pet;
use App\Models\Client;

class PetDatatables extends Component
{
    public function mount()
    {
        //
    }

    public function render()
    {
        $client = Client::find(1);
        $pets = DB::table('pets')
            ->leftJoin('clients', 'pets.owner_id', '=', 'clients.id')
            ->where('pets.owner_id', auth()->id())
            ->get();

        // dd($client);
        return view('livewire.pet-datatables', ['pets' => $pets, 'client' => $client]);
    }
}
