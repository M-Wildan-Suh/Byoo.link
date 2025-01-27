<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ContentController extends Controller
{
    public function topcontent($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $top_content = Content::where('web_id', $data->id)->first();
        if ($data) {
            if ($request->hasFile('logo')) {
                if ($request->logo !== null) {
                    if ($data->logo) {
                        $path = public_path('storage/images/logo/' . $data->logo);
    
                        if (file_exists($path)) {
                            unlink($path);
                        }
                    }
    
                    $imageFile = $request->file('logo');
                    $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                    $imagePath = public_path('storage/images/logo/');

                    $manager = new ImageManager(new Driver());
                    $image = $manager->read($imageFile->getPathname());
                    $imageFullPath = $imagePath . $imageName . '.webp';
                    $image->save($imageFullPath);

                    $data->logo = $imageName . '.webp';
                }
            }
            $data->save();
        }
        if ($top_content) {
            $top_content->top_title = $request->top_title;
            $top_content->top_no_tlp = $request->top_no_tlp;
            $top_content->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->top_title = $request->top_title;
            $newhead->top_no_tlp = $request->top_no_tlp;

            $newhead->save();
        }

        return redirect()->back();
    }
    public function heading($slug, Request $request)
    {
        $data = Web::where('url', $slug)->first();
        $heading = Content::where('web_id', $data->id)->first();

        if ($heading) {
            $heading->head_title = $request->title;
            $heading->head_desc = $request->description;
            $heading->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->head_title = $request->title;
            $newhead->head_desc = $request->description;

            $newhead->save();
        }

        return redirect()->back();
    }

    public function footer($slug, Request $request)
    {
        $data = Web::where('url', $slug)->first();
        $footer = Content::where('web_id', $data->id)->first();

        if ($footer) {
            $footer->foot_title = $request->title;
            $footer->foot_desc = $request->description;
            $footer->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->foot_title = $request->title;
            $newhead->foot_desc = $request->description;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        //
    }
}
