<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tarifs;
use App\Models\User;
use DateTime;
use DB;

class Services extends Model
{
    use HasFactory;

    protected $table = "services";
    protected $fillable = ["ID", "user_id", "tarif_id", "payday"];
    public $timestamps = false;

    public static function SetUsersTarif($service_id, $user_id, $tarif_id){
        if(!User::Exist($user_id)) return null;
        if(!Tarifs::Exist($service_id, $tarif_id)) return null;
        if(!Services::Exist($service_id) || !Services::HasUser($service_id, $user_id)) return null;

        Services::where([["ID", $service_id], ["user_id", $user_id]])
                    ->update(array(
                        "tarif_id"=>$tarif_id, 
                        "payday" => (new DateTime())->format("Y-m-d")
                    ));
        return "ok";
    }

    public static function HasUser($service_id, $user_id){
        return Services::select()->where([["ID",$service_id], ["user_id", $user_id]])->count() > 0;
    }

    public static function Exist($service_id){
        return Services::select()->where("ID", $service_id)->count() > 0;
    }
}
