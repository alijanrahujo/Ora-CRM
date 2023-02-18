<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoicem;
use App\Models\Paymint;
use Illuminate\Http\Request;

class PaymintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("paymint.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        $invoices = Invoicem::get();
        return view("paymint.create", compact('clients', 'invoices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paymint  $paymint
     * @return \Illuminate\Http\Response
     */
    public function show(Paymint $paymint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paymint  $paymint
     * @return \Illuminate\Http\Response
     */
    public function edit(Paymint $paymint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paymint  $paymint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paymint $paymint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paymint  $paymint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paymint $paymint)
    {
        //
    }
}
