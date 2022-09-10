<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Appointment::whereDate('appointment_start', '>=', $request->start)
                ->whereDate('appointment_end',   '<=', $request->end)
                ->get(['id', 'appointment_name', 'appointment_start', 'appointment_end']);
            return response()->json($data);
        }
        return view('appointment');
    }

    public static function loadAppointments()
    {
        // get unit of the poster
        $unit = self::select('user_profiles.unit_id')
            ->join('user_profiles', 'events.user_id', 'user_profiles.user_id')
            ->where('audience', self::MY_UNIT)
            ->first();
    }

    public function calendarEvents(Request $request)
    {

        switch ($request->type) {
            case 'create':
                $event = CrudEvents::create([
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'edit':
                $event = CrudEvents::find($request->id)->update([
                    'event_name' => $request->event_name,
                    'event_start' => $request->event_start,
                    'event_end' => $request->event_end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = CrudEvents::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # ...
                break;
        }
    }
}

























//     public function index()
//     {
//         if (request()->ajax()) {

//             $start = (!empty($_GET["appointment_start"])) ? ($_GET["appointment_start"]) : ('');
//             $end = (!empty($_GET["appointment_end"])) ? ($_GET["appointment_end"]) : ('');

//             $data = Appointment::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id', 'title', 'start', 'end']);
//             return Response::json($data);
//         }
//         return view('appointment');
//     }

//     public function create(Request $request)
//     {
//         $insertArr = [
//             'title' => $request->title,
//             'appointment_start' => $request->start,
//             'appointment_end' => $request->end
//         ];
//         $appointment = Appointment::insert($insertArr);
//         return Response::json($appointment);
//     }


//     public function update(Request $request)
//     {
//         $where = array('id' => $request->id);
//         $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end];
//         $appointment  = Appointment::where($where)->update($updateArr);

//         return Response::json($appointment);
//     }


//     public function destroy(Request $request)
//     {
//         $appointment = Appointment::where('id', $request->id)->delete();

//         return Response::json($appointment);
//     }
// }
