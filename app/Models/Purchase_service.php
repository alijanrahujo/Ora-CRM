<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Purchase_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'service_id',
        'package_id',
        'our_offer',
        'duration',
        'status',
        'purchased_date',
    ];

    public function client()
    {
        return $this->hasOne('App\Models\Client', 'id', 'client_id');
    }
    public function service()
    {
        return $this->hasOne('App\Models\Services', 'id', 'service_id');
    }
    public function package()
    {
        return $this->hasOne('App\Models\Package', 'id', 'package_id');
    }
}
