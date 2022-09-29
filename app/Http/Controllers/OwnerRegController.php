<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Client;
use DB;

class OwnerRegController extends Controller
{

    public function saveOwner(Request $request){
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

       
       //return redirect('/ownerDashboard');

       //return view('pet.petRegister', ['ownerInfo' => Owner::find( $newOwner->id)]);
       return redirect()->route('ownerDashboard', ['id' => $newOwner->id]);

    }

    public function viewOwnerList(){

        //$ownerList = DB::table('owners')->get();
        
        return view('pet.owner-list',['ownerLists' => Client::all()]);

       // $ownerList = Owner::all();
       // return view('pet.ownerList', compact('ownerList'));

    }

    
    public function ownerDashboard($id){

        //$ownerList = DB::table('owners')->get();
        
        return view('pet.ownerDashboard',['ownerInfo'=> Client::find($id)]);

       // $ownerList = Owner::all();
       // return view('pet.ownerList', compact('ownerList'));

    }

    public function updateOwner($id){
        
        return view('pet.ownerUpdate',['ownerInfo' => Client::find($id)]);
    }

    public function updateOwnerSaved(Request $request, $id){
        $newOwner = Client::find($id);
        $newOwner->first_name = $request->fname;
        $newOwner->middle_name = $request->mname;
        $newOwner->last_name = $request->lname;
        $newOwner->contact_number = $request->owner_contact_number;        
        $newOwner->email = $request->owner_email;
        $newOwner->address = $request->owner_address;
        $newOwner->password = $request->owner_password;
        $newOwner->save();


        return redirect('/viewClientList');

    }

    public function deleteOwner($id){

        $newOwner = Client::find($id);
        $newOwner->delete();
       
        return redirect('/viewClientList');

    }

    public function deleteAllOwner(){

        $newOwner = new Client;
        $newOwner->truncate();
       
        return redirect('/viewClientList');

    }
   
    //
}
