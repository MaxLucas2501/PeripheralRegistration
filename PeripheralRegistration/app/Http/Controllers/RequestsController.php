<?php

namespace App\Http\Controllers;

use App\Models\Peripheral;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Request as RequestModel;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $requests = RequestModel::all();

        return view(
            'requests.index',
            [
                'requests' => $requests
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $peripherals = Peripheral::whereNull('user_id')
                                 ->get()
                                 ->groupBy('type')
                                 ->all();

        return view(
            'requests.create',
            [
                'peripheralGroups' => $peripherals
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $user         = Auth::user();
        $peripheralId = $request->get('peripheral_id');

        if (!($user instanceof User)) {
            // handle illegal immigrants
            Toastr::warning('Please Login');

            return redirect('auth.login');
        }

        RequestModel::create(
            [
                'user_id'       => $user->id,
                'peripheral_id' => $peripheralId,
            ]
        );
        Toastr::success('successfully made a requests.');

        return redirect()
            ->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param RequestModel $requestModel
     *
     * @return View|RedirectResponse
     */
    public function show(RequestModel $requestModel)
    {
        $user = Auth::user();

        if (!($user instanceof User)) {
            Toastr::warning('Please Login');

            return redirect('auth.login');
        }

        if (
        !$user->can('admin')
        ) {
            // Unauthorised
            Toastr::warning('You are not authorized to perform this action');

            return redirect()->route('requests.index');
        }

        // User may see page
        return view(
            'requests.show',
            [
                'request' => $requestModel
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RequestModel $requestModel
     * @param Request      $request
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(RequestModel $requestModel, Request $request)
    {
        $request = $request->validate(
            RequestModel::rules()
        );

        $user = Auth::user();

        if (!($user instanceof User)) {
            Toastr::warning('Please Login', 'Login failed');

            return redirect()->route('auth.login');
        }

        if (!$user->can('admin')) {
            Toastr::warning('You are not authorized to perform this action', 'No permissions');

            return redirect()->route('requests.index');
        }

        // TODO probably catch as 0 or 1 (maybe string)
        if (
            $user->can('admin')
            && $request['approved'] === "1"
            && $requestModel->peripheral instanceof Peripheral
        ) {
            $requestModel->update(
                [
                    'approved'    => true,
                    'approved_by' => $user->id,
                    'approved_at' => now()
                ]
            );

            // Assigning  to user
            $requestModel->peripheral->update(
                [
                    'user_id' => $requestModel->user_id,
                ]
            );

            Toastr::success('Successfully updated the request', 'Update successful');

            return redirect()->route('requests.index');
        }

        // TODO probably catch as 0 or 1 (maybe string)
        if (
            $user->can('admin')
            && $request['approved'] === "0"
            && $requestModel->peripheral instanceof Peripheral
        ) {
            $requestModel->update([
                    'approved'    => false,
                    'approved_by' => $user->id,
                    'approved_at' => now()
                ]);
            // Deny to user
            $requestModel->delete();

            Toastr::success('Successfully denied the request', 'Denial successful');

            return redirect()->route('requests.index');
        }

        // if user is creator allow edit
        if (
            $requestModel->peripheral instanceof Peripheral
            && $request->user()->id === $requestModel->user_id
        ) {
            $request['approved'] = false;
            // Assigning  to user
            $requestModel->peripheral->update(
                [
                    'user_id' => $request->user()->id
                ]
            );

            Toastr::success('Successfully updated the request', 'Update successful');

            return redirect()->route('requests.index');
        }

        Toastr::error('something went wrong');

        return redirect()->route('requests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
