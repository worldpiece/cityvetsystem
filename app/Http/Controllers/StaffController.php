<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request){


        $staff = new Staff();
        $staff->employee_no = $request->employee_no;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->last_name = $request->middle_name;
        $staff->designation = $request->designation;
        $staff->contact_no = $request->contact_number;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff added successfully!');
            
    }
    public function edited(Request $request, $id)
    {
        $staff = Staff::find($id);
        $staff->employee_no = $request->employee_no;
        $staff->first_name = $request->first_name;
        $staff->middle_name = $request->middle_name;
        $staff->last_name = $request->middle_name;
        $staff->designation = $request->designation;
        $staff->contact_no = $request->contact_number;
        $staff->address = $request->address;
        $staff->save();

        return redirect()->route('staff.index')->with('success', 'Staff added successfully!');
    }

    public function edit($id)
    {
        return view('staff.edit', ['staffInfo' => Staff::find($id)]);
    }


    public function delete($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff Deleted Successfully.');
    }
}
