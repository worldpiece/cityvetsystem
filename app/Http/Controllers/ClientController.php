<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.register');
    }

    public function create(Request $request) // Code from OwnerReg - Benzar
    {
        //\Log::info(json_encode($request->all()));
        $newOwner = new Client;
        $newOwner->first_name = $request->fname;
        $newOwner->middle_name = $request->mname;
        $newOwner->last_name = $request->lname;
        $newOwner->contact_number = $request->owner_contact_number;
        $newOwner->email = $request->owner_email;
        $newOwner->address = $request->owner_address;
        $newOwner->password = $request->owner_password;
        $newOwner->save();

        return view('client.register');
    }
}
