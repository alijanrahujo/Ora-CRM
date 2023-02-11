<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Package extends Model
{
    use HasFactory;
    protected $table = "sub_packages";
    protected $fillable = [
        'package_id',
        'sub_service_id',
        'description',
    ];
    public function package()
    {
        return $this->hasOne('App\Models\Package', 'id', 'package_id');
    }
    public function sub_service()
    {
        return $this->hasOne('App\Models\Sub_service', 'id', 'sub_service_id');
    }
}
