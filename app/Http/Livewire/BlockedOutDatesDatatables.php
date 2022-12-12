<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\BlockedOutDates;

class BlockedOutDatesDatatables extends Component
{
    public function render()
    {
        $blocked_out_dates = DB::table('blocked_out_dates')->get();
        // dd($blocked_out_dates);
        return view('livewire.blocked-out-dates-datatables', ['blocked_out_dates' => $blocked_out_dates]);
        // return view('livewire.blocked-out-dates-datatables');
    }
}
