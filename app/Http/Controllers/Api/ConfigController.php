<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\novel;
use App\Models\qualification;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function registerConfig()
    {
        $all = array(
            "novel" => novel::all(),
            "qualification" => qualification::all()
        );
        return response()->json(['error'=>false,"message"=>"","data"=>$all] ,200);

    }
}
