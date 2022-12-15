<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlockedOutDates;

class BlockedOutDatesController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function block_date()
    {
        return view('admin.block_date');
    }

    public function store(Request $request)
    {
        // dd($request->blocked_date);
        $blocked_date = new BlockedOutDates();
        $blocked_date->start = $request->blocked_date;
        $blocked_date->display = 'background';
        $blocked_date->color = '#ff9f89';
        $blocked_date->save();
        return redirect()->route('admin.store')->with('success', 'Date blocked successfully!');
    }

    public function destroy($id)
    {

    }
}
