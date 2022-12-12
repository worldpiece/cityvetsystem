<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MedicalRecords;
use App\Models\User;
use Illuminate\Http\Request;

class MedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalRecords = MedicalRecords::all();
        // return view('medical-records.index');
        return view('medical-records.index', ['medicalRecords' => $medicalRecords]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = DB::table('users')
            ->select('id','first_name', 'last_name')
            ->get();
        return view('medical-records.create', ['owners' => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rec = new MedicalRecords();
        $rec->name = $request->findings;
        $rec->quantity = $request->appointment_date;
        $rec->save();
        return redirect()->route('medical-records.index')->with('success', 'Medical record added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalRecords  $medicalRecords
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalRecords $medicalRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalRecords  $medicalRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicalRecords $medicalRecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalRecords  $medicalRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicalRecords $medicalRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalRecords  $medicalRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalRecords $medicalRecords)
    {
        //
    }
}
