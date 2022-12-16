<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\MedicalRecords;
use App\Models\User;
use App\Models\Pet;
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
        $medicalRecords = MedicalRecords::with('pets')->get();
        // print_r($medicalRecords);exit;
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
            ->select('id', 'first_name', 'last_name')
            ->where('role', '!=', 1)
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
        // var_dump($request->all());exit;

        $pet = Pet::find($request->input('pet'));
        $rec = new MedicalRecords();
        $rec->name = $pet->pet_name;
        $rec->owner_id = $request->input('owner');
        $rec->pet_id = $pet->id;
        $rec->findings = $request->input('findings');
        $rec->appointment_date = $request->input('appointment_date');
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
        // $medicalRecords = MedicalRecords::all();
        // return view('medical-records.index', ['medicalRecords' => $medicalRecords]);   
        var_dump($request->all());
        exit;
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

    public function delete($id)
    {
        $records = MedicalRecords::find($id);
        $records->delete();

        return redirect()->route('medical-records.index')->with('success', 'Medical record deleted successfully.');
    }
}
