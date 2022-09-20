<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\models\Owner;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function petRegister(Request $request, $id)
    {
        //return view('pet.petRegister');
        return view('pet.petRegister',['ownerInfo'=> Owner::find($id)]);
    }

    public function updatePet($id)
    {
        return view('pet.petUpdate',['petInfo' => Pet::find($id)]);
    }

    public function updatePetSaved(Request $request, $id){

        $newPet = Pet::find($id);
        $newPet->pet_name = $request->pname;
        $newPet->pet_classification = $request->pclassification;
        $newPet->age = $request->petAge;        
        $newPet->date_of_birth = $request->pbirth;
        $newPet->save();

        return redirect('/viewOwnerList');
    }


    public function petOwned($id)
    {
        return view('pet.petOwned',
        ['petOwned' => Pet::all()
        ->where('owner_id', $id)]);
    }

    public function savePet(Request $request, $id)
    {

        $newPet = new Pet;
        $newPet->pet_name = $request->pname;
        $newPet->owner_id = $id;
        $newPet->pet_classification = $request->pclassification;
        $newPet->age = $request->petAge;        
        $newPet->date_of_birth = $request->pbirth;
        $newPet->save();

        return redirect('/viewOwnerList');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
