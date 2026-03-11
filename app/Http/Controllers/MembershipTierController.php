<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembershipTierController extends Controller
{
    function index() {
        return response()->json([
            'message' => 'Membership Tiers retrieved successfully',
            'data' => [
                ['id' => 1, 'name' => 'Bronze', 'benefits' => 'Basic access to content'],
                ['id' => 2, 'name' => 'Silver', 'benefits' => 'Access to exclusive content and discounts'],
                ['id' => 3, 'name' => 'Gold', 'benefits' => 'All benefits of Silver plus early access to new features']
            ]
        ], 200);
    }
}
