<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Package;
use App\Models\Purchase_service;
use Livewire\Component;
use App\Models\Services;

class PurchaseService extends Component
{
    public $clients;
    public $services;
    public $packages;
    public $purchase_services;

    public $client;
    public $service;
    public $package;
    public $duration;
    public $date;
    public $status;


    public function mount()
    {
        $this->clients = Client::all();
        $this->services = Services::all();
        $this->packages = collect();
        $this->client = collect();
        $this->purchase_services = collect();
    }
    public function render()
    {
        return view('livewire.purchase-service');
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'client' => 'required',
            'service' => 'required',
            'package' => 'required',
            'duration' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);
    }
    public function updatedClient($client_id)
    {
        $this->purchase_services = Purchase_service::where('client_id', $client_id)->get();
    }
    public function updatedService($service_id)
    {
        $this->duration = 0;
        $this->packages = Package::where('service_id', $service_id)->get();
    }
    public function updatedPackage($package_id)
    {
        $this->duration = Package::where('id', $package_id)->first('duration')->duration;
    }
    public function storePurchaseService()
    {
        $this->validate([
            'client' => 'required',
            'service' => 'required',
            'package' => 'required',
            'duration' => 'required',
            'date' => 'required',
            'status' => 'required',
        ]);

        Purchase_service::create([
            'client_id' => $this->client,
            'service_id' => $this->service,
            'package_id' => $this->package,
            'purchased_date' => $this->date,
            'status' => $this->status,
        ]);

        $this->purchase_services = Purchase_service::where('client_id', $this->client)->get();
        session()->flash('success', 'Service purchased successfully');
    }
}
