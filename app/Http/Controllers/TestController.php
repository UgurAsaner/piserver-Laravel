<?php

namespace App\Http\Controllers;
use App\Request;
use App\Status;
use App\UnitConfig;

class TestController extends Controller
{
    function index(Request $request){

        $mac_id = getallheaders()['mac_id'];
        $unit = UnitConfig::find(1);
        $reference = $unit->mac_id;

        if($mac_id == $reference) {

            $unit->ip = request()->ip();

            $unit->save();

            return 'true';
        }
        else
            return $mac_id;
    }

    function amounts(){

        if(request()->has('type') && request()->has('amount') ){

            $status = new Status;
            $status->type = request()->get('type');
            $status->amount = request()->get('amount');
            $status->save();
        }

    }

}