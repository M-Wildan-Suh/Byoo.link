<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BannerController extends Controller
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
        $data = Web::where('url', $slug)->first();
        $newData = new Banner();

        $newData->web_id = $data->id;
        if ($request->hasFile('image_banner')) {
            $imageFile = $request->file('image_banner');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/banner/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newData->image = $imageName . '.webp';
            $newData->image_alt = $imageFile->getClientOriginalName();
        }
        $newData->save();

        return redirect()->back()->with('banner', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, Banner $banner)
    {
        $path = public_path('storage/images/banner/' . $banner->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $banner->delete();

        return redirect()->back()->with('banner', true);
    }
}
