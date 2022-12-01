<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\MedicineInventory;

class MedicineDatatables extends Component
{
    public function mount()
    {
        //
    }

    public function render()
    {
        $meds = DB::table('medicine_inventories')
            ->get();

        return view('livewire.medicine-datatables', ['meds' => $meds]);
    }
}
