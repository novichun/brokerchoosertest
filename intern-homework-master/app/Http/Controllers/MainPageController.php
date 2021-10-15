<?php

namespace App\Http\Controllers;

use App\Models\Broker;
use App\Repositories\BrokerRepository;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class MainPageController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    

public function __invoke(): View
{
    $repo = new BrokerRepository();

   
    
    return view('welcome')->with('top3', $repo->getBrokers()->sortByDesc('overallScore')->slice(0, 3))
                          ->with('stock', $repo->getBrokers()->sortByDesc('overallScore')->whereIn('brokerType', ['Stock']))
                          ->with('inactivity', $repo->getBrokers()->sortByDesc('overallScore')->whereNotIn('hasInactivityFee', ['false']))
    ;

}



  
 
  

}
