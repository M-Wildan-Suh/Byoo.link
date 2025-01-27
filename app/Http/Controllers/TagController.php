<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Tag;
use App\Models\Web;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tagposition($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $content = Content::where('web_id', $data->id)->first();

        if ($content) {
            $content->tag_position = $request->tag_position;
            $content->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->tag_position = $request->tag_position;

            $newhead->save();
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
    public function store($slug, Request $request)
    {
        // dd($request);
        $data = Web::where('url', $slug)->first();

        $newdata = new Tag;

        $newdata->web_id = $data->id;
        $newdata->tag = $request->tag;
        $newdata->save();

        return redirect()->back()->with('tag',true);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, Tag $tag)
    {
        $tag->delete();

        return redirect()->back()->with('tag',true);
    }
}
