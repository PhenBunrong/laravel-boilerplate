<?php

use App\Http\Controllers\MembershipTierController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('membership-tiers', MembershipTierController::class);
Route::get('candidates', function(Request $request) {
    $data = User::all();

    return response()->json([
        'data' => '343'
    ]);
});

Route::group(['middleware' => ['api', 'auth:sanctum']], function () {
    // Route::apiResource('users', UserController::class);
    Route::get('user', function(Request $request) {
        return $request->user();
    });
});

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });

require __DIR__.'/auth.php';