<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pet;
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

    public function edit()
    {
        return view('staff.index');
    }

    public function delete()
    {
        return view('staff.index');
    }

}
