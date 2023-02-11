<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovice extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'client_id',
        'purchase_service_id',
    ];
}
