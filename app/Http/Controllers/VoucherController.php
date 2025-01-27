<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Models\WebType;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Illuminate\Support\Str;

class VoucherController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }

    public function buyvoucher()
    {
        $createInvoice = new CreateInvoiceRequest([
            'external_id' => 'inv'. rand(),
            'amount' => 60000,
            // 'success_redirect_url' => route('auction.detail', ['slug' => $auction['slug'], 'id' => Crypt::encryptString($auction['id'])]),
            'invoice_duration' => 172800,
            'currency' => 'IDR',
        ]);
        $apiInstance = new InvoiceApi();
        $generateInvoice = $apiInstance->createInvoice($createInvoice);

        // dd($generateInvoice->getExpiryDate());
        return redirect($generateInvoice->getInvoiceUrl());
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $web_type = WebType::all()->reverse();
        $data = Voucher::all();

        $data->transform(function ($data) {
            $data->template = $data->webType->type;
            return $data;
        });
        return view('admin.voucher.index', compact('data', 'web_type'));
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
        $data = strtoupper(Str::random(12));
        $newdata = new Voucher;

        $newdata->kode = $data;
        $newdata->web_type_id = $request->web_type_id;

        $newdata->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect()->back();
    }
}
