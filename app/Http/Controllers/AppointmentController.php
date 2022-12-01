<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Appointment;
use App\Models\BlockedOutDates;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $pets = DB::table('pets')
            ->where('owner_id', auth()->id())
            ->get();

        $appointment_types = DB::table('appointment_type')
            // ->select('type_of_appointment')
            ->get();

        $appointments = array();
        $all_appointments = Appointment::all();
        foreach ($all_appointments as $appointment) {
            $appointments[] = [
                'allDay' => true,
                'title' => $appointment->pet_name,
                'start' => $appointment->start
            ];
        }

        $blocked_out_dates = BlockedOutDates::all();

        return view('appointment.index', [
            'pets' => $pets,
            'appointments' => $appointments,
            'appointment_types' => $appointment_types,
            'blocked_out_dates' => $blocked_out_dates
        ]);
    }

    public function store(Request $request)
    {
        $pet_id = DB::table('pets')
            ->select('id')
            ->where('pet_name', $request->pet_name)
            ->first();

        $appointment_code = DB::table('appointment_type')
            ->select('id')
            ->where('type_of_appointment', $request->appointment_type)
            ->first();

        $apmnt = new Appointment();
        $apmnt->start = $request->start;
        $apmnt->client_id = $request->client_id;
        $apmnt->pet_name = $request->pet_name;
        $apmnt->pet_id = $pet_id->id;
        $apmnt->type_of_appointment = $request->appointment_type;
        $apmnt->appointment_type_code = $appointment_code->id;
        $apmnt->symptoms = $request->symptoms;
        $apmnt->save();
        return redirect()->route('appointment.index')->with('success', 'Appointment added successfully.');
        // return back()->with('success', 'Appointment added successfully.');
    }

    public function list_of_appointment(Request $request)
    {
        return view('admin/appointment');
    }

    public function edit()
    {

    }

    public function destroy()
    {
        //
    }
}
