<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\MedicineInventory;

class MedicineDatatables extends Component
{
    public $search = '';

    public function mount()
    {
        //
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $meds = MedicineInventory::where('name','like', '%'.$this->search.'%')->orderBy('id', 'DESC')->paginate(2);
        $meds = DB::table('medicine_inventories')
            ->get();

        return view('livewire.medicine-datatables', ['meds' => $meds]);
    }
}
