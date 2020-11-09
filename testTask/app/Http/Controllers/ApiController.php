<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifs;
use App\Models\Services;

class ApiController extends Controller
{
    public function GetServicesTarifs($user_id, $service_id) {
        $results = Tarifs::GetTarifsByGroup($service_id);
        $str = "";
        //return view("temp")->with(["collection"=>$results, "someText"=>Services::GetServiceById($service_id)]);

        $tarifs = Tarifs::GetTarifsByGroup($service_id);
        return response()->json([
            "title" => $tarifs[0]->title,
            "link" => $tarifs[0]->link,
            "speed" => $tarifs[0]->speed,
            "tarifs" => ["1", "2"]
        ], 200);
    }

    public function PutServicesTarif($user_id, $service_id){

    }
}
