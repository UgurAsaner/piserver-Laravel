<?php
/**
 * Created by PhpStorm.
 * User: baran
 * Date: 23.04.2017
 * Time: 00:32
 */

namespace App\Http\Controllers;


use App\Status;
use App\UnitConfig;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;

class UnitController extends Controller
{
    function status(Request $request){

        try {
            $givenStatuses = $request->json()->all();

            foreach ($givenStatuses as $givenStatus) {

                $status = new Status();

                $status->type = $givenStatus['type'];
                $status->amount = $givenStatus['amount'];
                $status->timestamp = Carbon::now()->toDayDateTimeString();
                $status->save();
            }
        }catch (Exception $e){
            return Response($e->getMessage(),500);
        }

        return Response('success',200);

    }

    function addFood(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':8080/food/';

        $request = Request::create($url,'POST');

        return $request;
    }

    function addWater(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':8080/water/';

        $request = Request::create($url,'POST');

        return $request;
    }
}