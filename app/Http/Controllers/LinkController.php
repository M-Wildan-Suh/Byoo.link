<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Web;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store($slug, Request $request)
    {
        // dd($request);
        $data = Web::where('url', $slug)->first();

        $newdata = new Link;

        $newdata->web_id = $data->id;
        $newdata->type = $request->type;
        $newdata->url = $request->url;
        $newdata->save();

        return redirect()->back()->with('link',true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($slug, Request $request, Link $link)
    {
        $link->type = $request->type;
        $link->url = $request->url;
        $link->save();

        return redirect()->back()->with('link',true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, Link $link)
    {
        $link->delete();

        return redirect()->back()->with('link',true);
    }
}
