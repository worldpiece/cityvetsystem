<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pet;
use App\Models\Appointment;
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
            ->get();

        $appointments = array();
        $all_appointments = Appointment::all();
        foreach ($all_appointments as $appointment) {
            $appointments[] = [
                'title' => $appointment->symptoms,
                'start' => $appointment->appointment_start
            ];
        }

        return view('appointment.index', ['pets' => $pets, 'appointments' => $appointments, 'appointment_types' => $appointment_types]);
    }

    public function store(Request $request)
    {
        // Appointment::create([
        //     'client_id' => $request->client_id,
        //     'client_name' => $request->client_name,
        //     'pet_name' => $request->pet_name,
        //     'appointment_type' => $request->appointment_type,
        //     'symptoms' => $request->symptoms,
        //     'start' => $request->start,
        //     'end' => $request->end
        // ]);

        $apmnt = new Appointment();
        $apmnt->client_id = $request->client_id;
        $apmnt->client_name = $request->client_name;
        $apmnt->pet_classification = $request->pet_classification;
        $apmnt->save();
        //  return back()->withSuccess('success', 'Image Uploaded successfully.');
        return redirect()->route('pet.index')->withSuccess('success', 'Pet Register Successfully.');
    }
}
