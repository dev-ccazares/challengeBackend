<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{

    public function index()
    {
        return Membership::all();
    }

    public function show($id)
    {
        return Membership::find($id);
    }
}
