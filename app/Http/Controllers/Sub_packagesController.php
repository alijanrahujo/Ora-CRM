<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Services;
use App\Models\Sub_Package;
use Illuminate\Http\Request;

class Sub_packagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Sub_Package::orderBy('id', 'DESC')->paginate(5);


        return view('sub-packages.index', compact('data'))
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
        $packages = Package::get();
        return view("sub-packages.create", compact("services", "packages"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($request->packageid);
        $this->validate($request, [
            'packageid' => 'required',
            'sub_service_id*' => 'required',
            'description*' => 'required'
        ]);
        for ($i = 0; $i < count($request->sub_service_id); $i++) {
            $data = [
                'package_id' => $request->packageid,
                'sub_service_id' => $request->sub_service_id[$i],
                'description' => $request->description[$i],
            ];
            // dd($request );
            $sub_package = Sub_Package::create($data);
        }
        return redirect()->route('sub_packages.index')->with('success', 'Sub Package created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sub_Package  $sub_Package
     * @return \Illuminate\Http\Response
     */
    public function show(Sub_Package $sub_Package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sub_Package  $sub_Package
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub_Package $sub_Package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sub_Package  $sub_Package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub_Package $sub_Package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sub_Package  $sub_Package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub_Package $sub_Package)
    {
        //
    }
}
