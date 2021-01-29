<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get(
    '/user',
    function (Request $request)
    {
        return $request->user();
    }
);

Route::get(
    'users',
    function ()
    {
        return \App\Models\User::query()
                               ->with('roles')
                               ->get();
    }
);

Route::get(
    'users/{user}',
    function (\App\Models\User $user)
    {
        return response()->json(
            [
                'user'  => $user,
                'admin' => $user->hasRole('admin'),
                'cancan' => $user->can('admin'),
            ]
        );
    }
);

Route::get(
    'requests/{request}',
    function (\App\Models\Request $request)
    {
        return $request->with([
                                          'user',
'peripheral',
                                      ])
                               ->get();
    }
);

Route::get(
    'requests/{request}',
    function (\App\Models\Request $request)
    {
        $request->load('peripheral');

        return $request;
    }
);
