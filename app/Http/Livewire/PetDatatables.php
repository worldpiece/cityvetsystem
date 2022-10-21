<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pet;
use App\Models\User;

class PetDatatables extends Component
{
    public function mount()
    {
        //
    }

    public function render()
    {
        $client = User::find(auth()->id());
        $pets = DB::table('pets')
            ->where('owner_id', auth()->id())
            ->get();
        //dd($pets);
        // var_dump($pets);
        // echo '<pre>';
        // exit;
        return view('livewire.pet-datatables', ['pets' => $pets, 'client' => $client]);
    }
}
