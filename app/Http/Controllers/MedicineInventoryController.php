<?php

namespace App\Http\Controllers;

use App\Models\MedicineInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'medicine.index',
            ['medicineOwned' => MedicineInventory::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $med = new MedicineInventory();
        $med->name = $request->med_name;
        $med->quantity = $request->med_quantity;
        $med->save();

        return redirect()->route('medicine.index')->with('success', 'Medicine added successfully!');

    }

    public function edit($id)
    {
        return view('medicine.edit', ['medInfo' => MedicineInventory::find($id)]);
    }

    public function stockIn($id)
    {
        return view('medicine.stockIn', ['medInfo' => MedicineInventory::find($id)]);
    }

    public function stockOut($id)
    {
        return view('medicine.stockOut', ['medInfo' => MedicineInventory::find($id)]);
    }

    public function delete($id)
    {
        $med = MedicineInventory::find($id);
        $med->delete();

        return redirect()->route('medicine.index')->with('success', 'Medicine Deleted Successfully.');
    }

    public function edited(Request $request, $id)
    {

        $med = MedicineInventory::find($id);
        $med->name = $med->name;
        if($request->stockIn){
            $med->quantity = $med->quantity + $request->stockIn;
        }else{
            $med->quantity = $med->quantity - $request->stockOut;
        }
        $med->save();

        return redirect()->route('medicine.index')->with('success', 'Medicine Updated Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicineInventory  $medicineInventory
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineInventory $medicineInventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicineInventory  $medicineInventory
     * @return \Illuminate\Http\Response
     */
  //  public function edit(MedicineInventory $medicineInventory)
   // {
        //
   // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicineInventory  $medicineInventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MedicineInventory $medicineInventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicineInventory  $medicineInventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineInventory $medicineInventory)
    {
        //
    }
}
