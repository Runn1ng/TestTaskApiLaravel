<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = "services";

    public static function GetServiceById($serviceId){
        return Services::select()->whereId($serviceId)->first();
    }
}
