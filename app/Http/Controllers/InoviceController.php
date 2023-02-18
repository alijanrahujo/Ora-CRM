<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoicem;
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
    public function index(Request $request)
    {
        // $data = "Yes wrking";
        $data = Invoicem::orderBy('id', 'DESC')->paginate(5);
        return view('invoices.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
        // dd($request);
        $this->validate($request, [
            'clientid' => 'required',
            'purchase_id' => 'required',
            'invoice_status' => 'required',
            'invoice_type' => 'required',
            'expiry_date' => 'required',
        ]);
        for ($i = 0; $i < count($request->package_id); $i++) {
            $data = [
                'status' => $request->invoice_status,
                'client_id' => $request->clientid,
                'purchase_service_id' => $request->purchase_id,
                'expiry_date' => $request->expiry_date,
                'invoice_number' => 44,
                'invoice_type' => $request->invoice_type,
            ];
            // dd($data);

            $sub_package = Invoicem::create($data);
            return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
        }
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
    public function edit($id)
    {
        $invoices = Invoicem::find($id);
        return view("invoices.edit", compact('invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
