<?php

namespace App\Http\Controllers;

use App\Models\MembershipTier;
use Illuminate\Http\Request;

class MembershipTierController extends Controller
{
    function index(Request $request) {
       $data = MembershipTier::where('name', 'like', '%' . $request->input('search') . '%')->paginate(10);

       return response()->json($data);
    }
}
