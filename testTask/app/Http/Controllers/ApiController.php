<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarifs;
use App\Models\Services;
use DateTime;
use DateTimeZone;

class ApiController extends Controller
{
    public $header = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'];

    public function GetServicesTarifs($service_id) {
        $tarifs = Tarifs::GetTarifsByGroup($service_id);
        if($tarifs == null){
            return response()->json(["result"=>"error"], 404, $this->header);
        }
        $tarifsJson = [];
        foreach($tarifs as $tarif){
            array_push($tarifsJson, [
                "ID" => $tarif->ID,
                "title" => $tarif->title,
                "price" => $tarif->price,
                "pay_period" => $tarif->pay_period,
                "new_payday" => $this->findNewPayday($tarif->pay_period),
                "speed" => $tarif->speed
            ]);
        }
        return response()->json([
            "result" => "ok",
            "tarifs" => [
                "title" => $tarifs[0]->title,
                "link" => $tarifs[0]->link,
                "speed" => $tarifs[0]->speed,
                "tarifs" => $tarifsJson
            ]
        ], 200, $this->header, JSON_UNESCAPED_UNICODE);
    }

    public function PutServicesTarif($user_id, $service_id, Request $request){
        $result = Services::SetUsersTarif($service_id, $user_id, $request->all()["tarif_id"]);
        if($result == null)
            return response()->json(["result"=>"error"], 404, $this->header, JSON_UNESCAPED_UNICODE);
        return response()->json(["result"=>"ok"], 201, $this->header, JSON_UNESCAPED_UNICODE);
    }

    function findNewPayday($payPeriod){
        $today = new Datetime("NOW", new DateTimeZone("Asia/Yekaterinburg"));
        $today->setTime(0,0,0);
        return $today->format('UO');
    }
}
