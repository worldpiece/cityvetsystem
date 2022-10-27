<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Pet;
use App\Models\Staff;
use App\Models\User;

class StaffDatatables extends Component
{
    public function mount()
    {
        //
    }

    public function render()
    {
        $staffs = DB::table('staff')
        ->get();
        return view('livewire.staff-datatables', ['staffs' => $staffs]);
    }
}
