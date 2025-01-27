<?php

namespace App\Http\Controllers;

use App\Models\WebType;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class WebTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WebType::all();
        return view('admin.template.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.template.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newdata = new WebType;

        $newdata->type = $request->type;
        $newdata->price = $request->price;
        $newdata->demo_url = $request->demo_url;
        $newdata->description = $request->description;
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/templates/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newdata->image = $imageName . '.webp';
            // $newdata->logo_alt = $imageFile->getClientOriginalName();
        }
        $newdata->save();

        return redirect()->route('template.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = WebType::find($id);
        // dd($data);
        return view('admin.template.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebType $webType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = WebType::find($id);

        $data->type = $request->type;
        $data->price = $request->price;
        $data->demo_url = $request->demo_url;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $path = public_path('storage/images/templates/' . $data->image);

            if (file_exists($path)) {
                unlink($path);
            }

            $imageFile = $request->file('image');
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = public_path('storage/images/templates/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $data->image = $imageName . '.webp';
            // $data->logo_alt = $imageFile->getClientOriginalName();
        }
        $data->save();

        return redirect()->route('template.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = WebType::find($id);
        // dd($data);
        $path = public_path('storage/images/templates/' . $data->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $data->delete();

        return redirect()->back();
    }
}
