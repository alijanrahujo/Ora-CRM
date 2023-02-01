<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Inovice;
use App\Models\Purchase_service;
use Livewire\Component;

class Invoice extends Component
{
    public $clients;
    public $services;
    public $packages;
    public $purchase_services;

    public $clientid;
    public $serviceid;
    public $client;
    public $service;
    public $package;
    public $duration;
    public $ouroffer;
    public $date;
    public $status;
    public $purchases;

    public $invoice;


    public function mount()
    {
        $this->clients = Client::all();

        $this->services = collect();
        $this->packages = collect();
        $this->purchase_services = collect();
        // $this->invoice = collect();
    }
    public function render()
    {
        return view('livewire.invoice');
    }

    public function updatedClientid($id)
    {
        $this->services = Purchase_service::where('client_id', $id)->with('client')->get()->unique('service');
        $this->packages = collect();
        $this->purchase_services = Purchase_service::get();
    }
    public function updatedServiceid($id)
    {
        $this->packages = Purchase_service::where(['client_id' => $this->clientid, 'service_id' => $id])->with('client')->get();
    }
}
