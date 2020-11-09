<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifs extends Model
{
    use HasFactory;
    protected $table = "tarifs";

    public static function GetTarifsByGroup($groupId){
        return Tarifs::select()->where("tarif_group_id", $groupId)->get();
    }

}
