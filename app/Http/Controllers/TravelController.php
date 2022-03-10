<?php

namespace App\Http\Controllers;

use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{

    public function index()
    {
        return Travel::all();
    }

    public function show($id)
    {
        return Travel::find($id);
    }
}
