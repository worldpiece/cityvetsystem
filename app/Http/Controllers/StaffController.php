<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function signin()
    {
        return view('staff.signin');
    }

    public function dashboard(Request $request)
    {

        if (is_null(Staff::find($request->employee_number)))
            {
                $message = 'Invalid Number!';
               // return Redirect::to('staff.signin')->withErrors($validator);
                return redirect()->back()->with('message', $message);
            }
        else{

            return view('staff.dashboard', ['staffInfo' => Staff::find($request->employee_number)]);
        }
            
    }

    public function create()
    {
        return view('staff.create');
    }

    public function show($employee_no)
    {

        // dd($request->employee_no);
        //$staffs = DB::table('staff')->get();
        $staffs = Staff::find($employee_no);

            // dd($staffs);
        return view('staff.show', ['staff' => $staffs]);
    }

    public function store(Request $request)
    {
        $qr_id = $request->employee_no;

        $staff = new Staff();
        $staff->employee_no = $request->employee_no;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->last_name = $request->last_name;
        $staff->qr_id = $qr_id;
        $staff->designation = $request->designation;
        $staff->contact_no = $request->contact_number;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff added successfully!');
    }
    public function edited(Request $request, $employee_no)
    {
        $qr_id = $request->employee_no;
        
        $staff = Staff::find($employee_no);
        $staff->employee_no = $request->employee_no;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->last_name = $request->last_name;
        $staff->qr_id = $qr_id;
        $staff->designation = $request->designation;
        $staff->contact_no = $request->contact_number;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff added successfully!');
    }

    public function edit($employee_no)
    {
        return view('staff.edit', ['staffInfo' => Staff::find($employee_no)]);
    }


    public function delete($employee_no)
    {
        $staff = Staff::find($employee_no);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff Deleted Successfully.');
    }

    public function getOneStaff(Request $request) {
        $staff = Staff::find($request->input('id'));
        return $staff;
    }
}
