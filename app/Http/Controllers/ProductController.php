<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Product;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function producttitle($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $top_content = Content::where('web_id', $data->id)->first();

        if ($top_content) {
            $top_content->product_title = $request->product_title;
            $top_content->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->product_title = $request->product_title;

            $newhead->save();
        }

        return redirect()->back();
    }
    
    public function producttlp($slug, Request $request) 
    {
        $data = Web::where('url', $slug)->first();
        $top_content = Content::where('web_id', $data->id)->first();

        if ($top_content) {
            $top_content->product_no_tlp = $request->product_tlp;
            $top_content->save();
        } else {
            $newhead = new Content;

            $newhead->web_id = $data->id;
            $newhead->product_no_tlp = $request->product_tlp;

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
            $product = Product::where('web_id', $data->id)->get()->count();
            // dd($product);
            if ($product >= 4) {
                return redirect()->back();
            }
        }

        $newData = new Product;

        $newData->web_id = $data->id;
        $newData->name = $request->name;
        $newData->price = $request->price;
        $newData->description = $request->description;

        if ($request->hasFile('product_image')) {
            $imageFile = $request->file('product_image');
            $imageName = time();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $newData->image = $imageName . '.webp';
        }
        $newData->save();
        return redirect()->back()->with('product',true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($slug, Request $request, Product $product)
    {
        // dd($request);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        if ($request->hasFile('product_image_edit')) {
            $path = public_path('storage/images/product/' . $product->image);

            if (file_exists($path)) {
                unlink($path);
            }

            $imageFile = $request->file('product_image_edit');
            $imageName = time();
            $imagePath = public_path('storage/images/product/');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($imageFile->getPathname());
            $imageFullPath = $imagePath . $imageName . '.webp';
            $image->save($imageFullPath);

            $product->image = $imageName . '.webp';
        }
        $product->save();

        return redirect()->back()->with('product',true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug, Product $product)
    {
        $path = public_path('storage/images/product/' . $product->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $product->delete();

        return redirect()->back()->with('product', true);
    }
}
