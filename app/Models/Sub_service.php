<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'title',
    ];
    public function service()
    {
        return $this->hasOne('App\Models\Services', 'id', 'service_id');
    }
}
