<?php
/**
 * Created by PhpStorm.
 * User: baran
 * Date: 20.04.2017
 * Time: 15:13
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';
    public $timestamps = false;
}