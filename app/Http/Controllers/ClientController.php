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
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ClientController extends Controller
{
    function getFoodAmount(){

        $amount = Status::where('type','food')
            ->orderBy('timestamp','desc')
            ->take(20)
            ->get();

        return $amount;
    }

    function getWaterAmount(){

        $amount = Status::where('type','water')
            ->orderBy('timestamp','desc')
            ->take(20)
            ->get();

        return $amount;

    }

    function getCurrentFood(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1995/food';

        return $this->makeRequest('GET',$url);
    }

    function getCurrentWater(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1995/water';

        return $this->makeRequest('GET',$url);
    }

    function makeRequest($method,$url){

        $client = new Client();

        try{

            $response = $client->request($method,$url);

            return $response;

        }catch (RequestException $re){

            $errorResponse = ['error' => 'Perform Unit Does Not Respond'];
            return Response($errorResponse,503);

        }
    }

    function addFood(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1995/food/';

        return $this->makeRequest('POST',$url);
    }

    function addWater(){

        $ip = UnitConfig::find(1)->ip;

        $url = $ip . ':1995/water/';

        return $this->makeRequest('POST', $url);
    }

}