<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Appointment;
use App\Models\User;

class AppointmentDatatables extends Component
{
    public function mount()
    {
        //
    }

    public function render()
    {
        $appointments = DB::table('appointments')
            ->join('users', 'appointments.client_id', '=', 'users.id')
            ->join('pets', 'appointments.pet_id', '=', 'pets.id')
            ->select('appointments.*', 'users.first_name', 'pets.pet_name', 'pets.gender')
            ->get();
            // dd($appointments);
        return view('livewire.appointment-datatables', ['appointments' => $appointments]);
    }
}
