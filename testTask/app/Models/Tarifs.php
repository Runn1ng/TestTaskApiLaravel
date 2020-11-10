<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\Services;

class Tarifs extends Model
{
    use HasFactory;
    protected $table = "tarifs";

    public static function GetTarifsByGroup($service_id){
        $result = Tarifs::select()->where("tarif_group_id", $service_id);
        if($result->count() == 0 || !Services::Exist($service_id))
            return null;
        return $result->get();
    }

    public static function Exist($service_id, $tarif_id){
        return Tarifs::select()->where([["tarif_group_id", $service_id], ["ID", $tarif_id]])->count() > 0;
    }
}
