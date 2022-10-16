<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use DateTime;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pet.index',
        ['petOwned' => Pet::all()
        ->where('owner_id', auth()->id())]);
    }

    public function registerPet()
    {
        return view('pet.pet-register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        // dd($pet);

        $birthDate = $request->birth_date;
        $date = new DateTime();
        $currentDate = $date->format('Y-m-d H:i:s');
        $age = date_diff(date_create($birthDate), date_create($currentDate));
        $age = $age->format("%y");

        // // dd($pet);
        // $validated = $request->validate(
        //     [
        //         'pet_name' => 'required|max:255',
        //         'gender' => 'required',
        //         'pet_dob' => 'required',
        //         'pet_classification' => 'required',
        //     ]
        // );

        // Pet::create([
        //     'pet_name' => $request->pet_name,
        //     'gender' => $request->pet_gender,
        //     'birth_date' => $request->pet_dob,
        //     'age' => $age,
        //     'owner_id' => $request->owner_id,
        //     'pet_classification' => $request->pet_classification,
        // ]);

         $pet = new Pet();
         $pet->pet_name = $request->pet_name;
         $pet->gender = $request->pet_gender;
         $pet->birth_date = $request->pet_dob;
         $pet->age = $age;
         $pet->owner_id = $request->owner_id;
         $pet->pet_classification = $request->pet_classification;
         $pet->save();
        //  return back()->withSuccess('success', 'Image Uploaded successfully.');
         return redirect()->route('pet.index')->withSuccess('success', 'Pet Register Successfully.');
        
         //return redirect(route('pet.index'))->with('flash_message', 'Pet added!');  
        
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
    public function edit($id)
    {
        return view('pet.edit',['petInfo' => Pet::find($id)]);
    }

    public function delete($id)
    {
        $pet = Pet::find($id);
        $pet->delete();
       
        return redirect()->route('pet.index')->withSuccess('success', 'Pet Deleted Successfully.');
    }

    public function edited(Request $request, $id)
    {
        $birthDate = $request->birth_date;
        $date = new DateTime();
        $currentDate = $date->format('Y-m-d H:i:s');
        $age = date_diff(date_create($birthDate), date_create($currentDate));
        $age = $age->format("%y");

        $pet = Pet::find($id);
        $pet->pet_name = $request->pet_name;
        $pet->gender = $request->pet_gender;
        $pet->birth_date = $request->pet_dob;
        $pet->age = $age;
        $pet->owner_id = $request->owner_id;
        $pet->pet_classification = $request->pet_classification;
        $pet->save();

    return redirect()->route('pet.index')->withSuccess('success', 'Pet Updated Successfully.');
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
    public function destroy($id)
    {
        //
    }
}
