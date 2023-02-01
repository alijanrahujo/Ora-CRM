<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Inovice;
use App\Models\Package;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\Purchase_service;

class InoviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // return Client::with('purchase_service')->get();

        $purchase_service = Purchase_service::with(['client:id,name', 'service:id,title', 'package'])->get();
        return view("invoices.index",);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("invoices.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $input = $request->all();
        $invoice = Inovice::create($input);
        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
        // $services = Services::first();
        // $clients = Client::first();
        // $packages = Package::first();
        // $purchase = Purchase_service::where('client_id', $request->clientid)->first();
        // return view("invoices.show", compact('purchase', 'services', 'clients', 'packages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view("invoices.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function edit(Inovice $inovice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inovice $inovice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inovice $inovice)
    {
        //
    }
}
