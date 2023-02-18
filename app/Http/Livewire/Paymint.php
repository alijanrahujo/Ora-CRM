<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoicem;
use Livewire\Component;

class Paymint extends Component
{
    public $clients;
    public $invoices;
    // public $services;
    // public $packages;



    public $clientid;
    public $invoiceid;
    public function mount()
    {
        $this->clients = Client::all();
        $this->invoices = collect();

        // $this->services = collect();
        // $this->packages = collect();
    }
    public function render()
    {
        return view('livewire.paymint');
    }
    public function updatedClientid($id)
    {
        $this->invoices = Invoicem::where('client_id', $id)->with('client')->get();
    }
}
