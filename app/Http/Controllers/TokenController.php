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

        $id = Request()->userid;

        $user = User::find($id);

        $user->token = str_random(10);

        $user->save();

        return Response($user->token);


    }

}