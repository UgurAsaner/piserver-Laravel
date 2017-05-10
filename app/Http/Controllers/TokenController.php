<?php
/**
 * Created by PhpStorm.
 * User: baran
 * Date: 23.04.2017
 * Time: 00:26
 */

namespace App\Http\Controllers;


use App\Request;
use App\User;

class TokenController extends Controller
{

    function index(){

        $userId = Request()->userid;

        $user = User::find($userId);

        $user->token = str_random(20);

        $user->save();

        $response = [
          'token' => $user->token
        ];

        return Response($response);

    }

}