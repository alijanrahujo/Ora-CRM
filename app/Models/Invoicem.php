<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicem extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected $fillable = [
        'status',
        'client_id',
        'purchase_service_id',
        'invoice_type',
        'expiry_date',
        'invoice_number',
    ];
    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    public function purchase()
    {
        return $this->hasOne('App\Models\Purchase_service', 'id', 'purchase_service_id');
    }
}
