<?php

namespace App\Http\Controllers;

use App\Models\TemplateColor;
use App\Models\Web;
use Illuminate\Http\Request;

class TemplateColorController extends Controller
{
    public function templatecolor($slug, Request $request)
    {
        $data = Web::where('url', $slug)->first();
        $templatecolor = TemplateColor::where('web_id', $data->id)->first();
        
        if ($templatecolor) {
            $templatecolor->bg_color = $request->bg_color;
            $templatecolor->main_color = $request->main_color;
            $templatecolor->second_color = $request->second_color;
            $templatecolor->third_color = $request->third_color;
            $templatecolor->fourth_color = $request->fourth_color;
    
            $templatecolor->save();
        } else {
            $newdata = new TemplateColor;
    
            $newdata->web_id = $data->id;
            $newdata->bg_color = $request->bg_color;
            $newdata->main_color = $request->main_color;
            $newdata->second_color = $request->second_color;
            $newdata->third_color = $request->third_color;
            $newdata->fourth_color = $request->fourth_color;
    
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
    public function show(TemplateColor $templatecolor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemplateColor $templatecolor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemplateColor $templatecolor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateColor $templatecolor)
    {
        //
    }
}
