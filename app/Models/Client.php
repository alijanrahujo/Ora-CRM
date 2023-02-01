<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'name',
        'organization',
        'email',
        'password',
        'address',
        'city',
        'contact',
    ];

    public function purchase_service()
    {
        return $this->hasMany('App\Models\Purchase_service', 'client_id', 'id');
    }
}
