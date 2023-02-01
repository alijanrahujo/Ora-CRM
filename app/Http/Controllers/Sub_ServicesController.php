<?php

namespace App\Http\Controllers;

use App\Models\Sub_Service;
use Illuminate\Http\Request;
use App\Models\Services;

class Sub_ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Services::get();
        $data = Sub_service::orderBy('id', 'DESC')->paginate(5);
        return view('sub-services.index', compact('data', 'services'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Services::get();
        return view("sub-services.create", compact("services"));
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
            'service_id' => 'required',
            'title' => 'required'
        ]);
        $input = $request->all();
        $sub = Sub_service::create($input);
        return redirect()->route('sub-services.index')->with('success', 'Service created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_Service  $sub_Service
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_Service $sub_Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_Service  $sub_Service
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_Service $sub_Service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sub_Service  $sub_Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_Service $sub_Service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_Service  $sub_Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_Service $sub_Service)
    {
        //
    }
}
