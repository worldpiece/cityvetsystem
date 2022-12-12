<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\MedicalRecords;

class MedicalRecordsDatatables extends Component
{
    public function render()
    {
        $medical_records = DB::table('medical_records')->get();
        return view('livewire.medical-records-datatables', ['medical_records' => $medical_records]);
    }
}
