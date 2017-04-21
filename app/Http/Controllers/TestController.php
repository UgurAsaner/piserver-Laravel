<?php

namespace App\Http\Controllers;
use App\UnitConfig;

class TestController extends Controller
{
    function index($mac_id){

        $unit = UnitConfig::find(1);
        $reference = $unit->mac_id;

        if($mac_id == $reference) {

            $unit->ip = request()->ip();

            $unit->save();

            return 'true';
        }
        else
            return 'false';
    }

}