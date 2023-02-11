<?php

namespace App\Http\Livewire;

use App\Models\Package;
use App\Models\Services;
use App\Models\Sub_service;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;

class SubPackages extends Component
{
    public $services;
    public $subservices;
    public $packages;

    public $subserviceid;
    public $serviceid;
    public $packageid;
    public $sub;
    public $subpackage = [];


    public function mount()
    {
        $this->packages = Package::get();
        $this->services = collect();
        $this->subservices = collect();
    }

    public function updatedPackageid($id)
    {
        $service = Package::where('id', $id)->get('service_id');
        $this->services = Services::where('id', $service[0]->service_id)->get();
        $this->serviceid = $service[0]->service_id;
        $this->subservices = Sub_service::where('service_id', $this->serviceid)->get();
    }
    public function storeSubPackage()
    {
        dd($this->subpackage[1]);
    }
    public function render()
    {
        return view('livewire.sub-packages');
    }
}
