<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Appointment;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $uid = auth()->id();
        $pets = DB::table('pets')->where('owner_id', $uid);

        $appointments = array();
        $all_appointments = Appointment::all();
        foreach ($all_appointments as $appointment) {
            $appointments[] = [
                'id' => $appointment->id,
                'title' => $appointment->symptoms,
                'start' => $appointment->appointment_start,
                'end' => $appointment->appointment_end,
                'color' => 'black',
                'text-color' => 'red'
            ];
        }
        return view('appointment.index', ['appointments' => $appointments, 'pets' => $pets]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                //'appointment_type' => 'required|string',
                'symptoms' => 'required|string',
            ]
        );

        Appointment::create([
            'client_id' => $request->client_id,
            'pet_id' => $request->pet_id,
            //'client_name' => $request->client_name,
            //'appointment_type' => $request->appointment_type,
            'appointment_code' => $request->appointment_code,
            'symptoms' => $request->symptoms,
            'appointment_start' => $request->start,
            'appointment_end' => $request->end
        ]);
    }
}
