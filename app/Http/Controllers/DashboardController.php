<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;
use Calendar;
class DashboardController extends Controller
{
    public function index(){
        
        $chart = Charts::create('line','highcharts')
        ->title('Line Chart Demo')
        ->elementLabel('Chart Labels')
        ->labels(['Mon','Tue','Wen','Thu','Fri','Sat','Sun'])
        ->values([15,16,17,16,15,16,19])
        ->dimensions(1000,500)
        ->responsive(true); 

        $events = [];
        $events[] = Calendar::event(
            "RASA MELAKA", 
            true, 
            '2019-10-25', 
            '2019-10-28', 
            1, 
            [
                'url' => 'http://full-calendar.io',
                
            ]
        );
        $calendar = Calendar::addEvents($events);
        return view('pages.admin.dashboard',compact('chart','calendar'));
    }
}
