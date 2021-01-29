<?php

namespace App\Http\Controllers;

use App\Models\Peripheral;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class PeripheralsManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $activeusers = User::all();
        $data        = Peripheral::all();
        return view('peripherals.index', compact('data', 'activeusers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $data = Peripheral::all();
        $users = User::query()->where('active',true)->get(['id', 'name','active']);
        return view('peripherals.create',[
            'data' => $data,
            'users'=> $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $peripheral = Peripheral::create(
            $request->validate(Peripheral::rules())
        );

        if ($request->expectsJson()) {
            return response()->json($peripheral);
        }
        Toastr()->success('Peripheral created','Creation successful');
        return redirect('peripherals');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Peripheral $peripheral
     *
     * @return Application|Factory|View|Response
     */
    public function edit(Peripheral $peripheral)
    {
        $users = User::query()->where('active',true)->get(['id', 'name','active']);
        return view(
            'peripherals.edit',
            [
                'data' => $peripheral,
                'users'=> $users
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request    $request
     * @param Peripheral $peripheral
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Peripheral $peripheral, Request $request)
    {
        $result = $peripheral->update(
            $request->validate(Peripheral::rules())
        );

        $redirect = redirect('peripherals.index');

        if (!$result) {
            $redirect->withErrors(
                [
                    'Something went wrong when updating the record'
                ]
            );
        }
        Toastr()->success('Peripheral Edited','Edit successful');
        return $redirect;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy(int $id)
    {
        Peripheral::destroy($id);
        Toastr()->success('Peripheral deleted','Delete successful');
        return back();
    }
}
