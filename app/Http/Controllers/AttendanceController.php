<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attendance');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $action = $request->input('action');
        $staff = Staff::find($request->input('id'));
        if($staff)
        {
            // check employee attendance history
            $attendance_history = Attendance::where('employee_id',$request->input('id'))
                ->whereDate('created_at', Carbon::today())
                ->first();
            if (!$attendance_history) {
                $attendance = new Attendance();
                $attendance->employee_id = $staff->employee_no;
                $attendance->am_in = Carbon::now('GMT+8');
                $attendance->save();
                $staff->am_in = $attendance->am_in;
                $staff->am_out = $attendance->am_out;
                $staff->pm_in = $attendance->pm_in;
                $staff->pm_out = $attendance->pm_out;
            } else {
                // main object
                $_attendance = Attendance::find($attendance_history->id);

                // check if action is time in
                $is_pm_timed_in = $attendance_history->pm_in;
                $is_am_timed_in = $attendance_history->am_in;
                $is_pm_timed_out = $attendance_history->pm_out;
                $is_am_timed_out = $attendance_history->am_out;
                if ($action == 'timein') {
                    if ($is_am_timed_in && $is_am_timed_out) {
                        $_attendance->pm_in = Carbon::now('GMT+8');
                        $_attendance->save();
                    } else {
                        $_attendance->am_in = Carbon::now('GMT+8');
                        $_attendance->save();
                    }
                } else if ($action == 'timeout') {
                    if ($is_am_timed_out && $is_pm_timed_in) {
                        $_attendance->pm_out = Carbon::now('GMT+8');
                        $_attendance->save();
                    } else {
                        $_attendance->am_out = Carbon::now('GMT+8');
                        $_attendance->save();
                    }
                }
               
               $staff->am_in = $_attendance->am_in;
               $staff->am_out = $_attendance->am_out;
               $staff->pm_in = $_attendance->pm_in;
               $staff->pm_out = $_attendance->pm_out;
            }
            return $staff;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
