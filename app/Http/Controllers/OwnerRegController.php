<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Owner;

class OwnerRegController extends Controller
{

    public function saveOwner(Request $request){
        //\Log::info(json_encode($request->all()));
        $newOwner = new Owner;
        $newOwner->first_name = $request->fname;
        $newOwner->middle_name = $request->mname;
        $newOwner->last_name = $request->lname;
        $newOwner->contact_number = $request->owner_contact_number;        
        $newOwner->email = $request->owner_email;
        $newOwner->address = $request->owner_address;
        $newOwner->password = $request->owner_password;
        $newOwner->save();

        return view('pet.petRegister');

    }
    //
}
