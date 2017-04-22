<?php
/**
 * Created by PhpStorm.
 * User: baran
 * Date: 23.04.2017
 * Time: 00:27
 */

namespace App\Http\Controllers;


use App\Status;

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

        // Send Request to Unit

    }

    function getCurrentWater(){

        // Send Request to Unit

    }
    function addFood(){



    }

    function addWater(){


    }

}