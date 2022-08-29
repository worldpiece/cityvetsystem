<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\owner;

class OwnerRegController extends Controller
{

    public function saveOwner(Request $request){
        //\Log::info(json_encode($request->all()));
        $newOwner = new owner;
        $newOwner->first_name = $request->fname;
        $newOwner->middle_name = $request->mname;
        $newOwner->last_name = $request->lname;
        $newOwner->contact_number = $request->owner_contact_number;        
        $newOwner->email = $request->owner_email;
        $newOwner->address = $request->owner_address;
        $newOwner->save();

        return view('pet.petRegister');

    }
    //
}
