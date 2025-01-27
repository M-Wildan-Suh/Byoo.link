<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Web;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function sectionedit($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $template = Template::where('web_id', $data->id)->first();
        
        if ($template) {
            $template->section = $request->section;
    
            $template->save();
        } else {
            $newdata = new Template;
    
            $newdata->web_id = $data->id;
            $newdata->section = $request->section;
    
            $newdata->save();
        }

        return redirect()->back();
    }

    public function productedit($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $template = Template::where('web_id', $data->id)->first();
        
        if ($template) {
            $template->product = $request->product;
    
            $template->save();
        } else {
            $newdata = new Template;
    
            $newdata->web_id = $data->id;
            $newdata->product = $request->product;
    
            $newdata->save();
        }

        return redirect()->back();
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Template $template)
    {
        //
    }
}
