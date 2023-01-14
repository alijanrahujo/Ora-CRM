<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'service_id',
        'package_id',
        'duration',
        'status',
    ];
}