<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\User;
use App\Models\Web;
use Illuminate\Http\Request;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Access::all();
        $user = User::all();
        $web = Web::all();
        $data->transform(function ($item) {
            $item->user_name = $item->user->name;
            $item->web_title = $item->web->title;
            return $item;
        });
        return view('admin.access.index', compact('data', 'user', 'web'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newdata = new Access;

        $newdata->user_id = $request->user_id;
        $newdata->web_id = $request->web_id;
        $newdata->status = $request->status;

        $newdata->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Access $access)
    {
        $access->user_id = $request->user_id;
        $access->web_id = $request->web_id;
        $access->status = $request->status;

        $access->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Access $access)
    {
        $access->delete();

        return redirect()->back();
    }
}
