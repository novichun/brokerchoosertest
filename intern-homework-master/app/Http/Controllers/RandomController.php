<?php

namespace App\Http\Controllers;
use App\Models\Broker;
use App\Repositories\BrokerRepository;
use App\Http\Controllers\MainPageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RandomController extends MainPageController
{
    public function index(){
        $repo = new BrokerRepository();
        $randomcar = $repo->getBrokers()->random();
        return response()->json($randomcar);
    }
}
