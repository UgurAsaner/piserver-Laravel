<?php
/**
 * Created by PhpStorm.
 * User: baran
 * Date: 23.04.2017
 * Time: 00:27
 */

namespace App\Http\Controllers;


use App\Status;
use App\UnitConfig;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function getFoodAmount(){

        $amount = Status::where('type','food')
            ->orderBy('timestamp','desc')
            ->take(10)
            ->get();

        return $amount;
    }

    function getWaterAmount(){

        $amount = Status::where('type','water')
            ->orderBy('timestamp','desc')
            ->take(10)
            ->get();

        return $amount;

    }

    function getCurrentFood(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1021/food';

        $request = Request::create($url,'GET');

        return $request;
    }

    function getCurrentWater(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1021/food';

        $request = Request::create($url,'GET');

        return $request;

    }

    function addFood(){

        return (new UnitController())->addFood();
    }

    function addWater(){

        return (new UnitController())->addWater();
    }

}