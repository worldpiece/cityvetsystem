<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function sesh(Request $request)
    {
        $data = $request->session()->all();
    }

    public function index(Request $request)
    {
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
        return view('appointment.index', ['appointments' => $appointments]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                //'appointment_type' => 'required|string',
                'symptoms' => 'required|string',
            ]
        );

        $start_date = $_POST['start'];
        $end_date = $_POST['end'];
        $start = substr($start_date, 0, 10);
        $end = substr($end_date, 0, 10);
        $start = $start . $_POST['am'];
        $end = $start . $_POST['pm'];

        if (isset($_POST['update'])) {
            $appointment = Appointment::find($_POST['client_id']);
            $appointment->pet_id = $_POST['pet_id'];
            $appointment->client_appointment_code = $_POST['appointment_code'];
            // $appointment->client_name = $_POST['client_name'];
            $appointment->symptoms = $_POST['symptoms'];
            $appointment->appointment_start =  date('Y-m-d H:i:s', strtotime($start_date));
            $appointment->appointment_end =  date('Y-m-d H:i:s', strtotime($start_date));
            $appointment->save();
            return $_POST;
        } else {
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
}
