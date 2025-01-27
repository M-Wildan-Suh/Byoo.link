<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Web;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ContactController extends Controller
{
    public function contact($slug, Request $request)
    {
        $data = Web::where('url', $slug)->first();
        $contact = Contact::where('web_id', $data->id)->first();

        if ($contact) {
            $contact->no_tlp = '+62'.$request->no_tlp;
            $contact->no_wa = '+62'.$request->no_wa;
            $contact->save();
        } else {
            $newdata = new Contact;

            $newdata->web_id = $data->id;
            $newdata->no_tlp = '+62'.$request->no_tlp;
            $newdata->no_wa = '+62'.$request->no_wa;

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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
