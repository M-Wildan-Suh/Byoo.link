<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Gallery;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class GalleryController extends Controller
{
    public function gallerytitle($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $top_content = Content::where('web_id', $data->id)->first();

        if ($top_content) {
            $top_content->gallery_title = $request->gallery_title;
            $top_content->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->gallery_title = $request->gallery_title;

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
        $data = Web::where('url', $slug)->first();

        if ($data->webType->type === "Minicompro") {
            $gallery = Gallery::where('web_id', $data->id)->get()->count();
            // dd($gallery);
            if ($gallery >= 9) {
                return redirect()->back();
            }
        }

        $newData = new Gallery;

        $newData->web_id = $data->id;
        if ($request->hasFile('image_gallery')) {
            $imageFile = $request->file('image_gallery');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/gallery/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newData->image = $imageName . '.webp';
            $newData->image_alt = $imageFile->getClientOriginalName();
        }
        $newData->save();

        return redirect()->back()->with('gallery', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, Gallery $gallery)
    {
        $path = public_path('storage/images/gallery/' . $gallery->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $gallery->delete();

        return redirect()->back()->with('gallery', true);
    }
}
