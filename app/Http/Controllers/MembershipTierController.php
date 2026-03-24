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

    function store(Request $request) {
        $data = MembershipTier::create($request->all());

        return response()->json($data);
    }

    function show($id) {
        $data = MembershipTier::find($id);

        return response()->json($data);
    }

    // function update(Request $request, $id) {
    //     $data = MembershipTier::find($id);
    //     $data->update($request->all());

    //     return response()->json($data);
    // }

    // function destroy($id) {
    //     $data = MembershipTier::find($id);
    //     $data->delete();

    //     return response()->json(['message' => 'Membership tier deleted successfully']);
    // }
}
