<?php

namespace App\Http\Controllers\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Event;
use App\Models\Show;
use App\Models\Price;
use App\Models\Venue;
use App\Models\Ticket;

class BookingController extends Controller
{

    private static $table = 'event';
    private static $table_booking = 'booking';
    private static $table_show = 'show';
    private static $table_ticket = 'ticket';

    public function step2(Request $request) {
        $showtime = $request->input("showtime");
        $ticket_id = $request->input("ticket_id");
        $showday = $request->input("showday1");
        $title = DB::table(static::$table)->where('id' ,'=',$ticket_id )->first();
        $seats = Venue::getSeatsByVenue(1);

        return view('pages.booking.ticket', ['seats' => $seats,'showday'=>$showday, 'showtime' =>$showtime, 'title'=>$title]);
    }

    
    public function selectTicket(Request $request) {
        return view('pages.booking.show', ['showTime' => $showtime]);
    }

    public function show(Request $request) {

        $showday = $request->input("select_book_date");

        if($showday==null) {
            $showday = @date('Y-m-d');
        }
        $title = DB::table(static::$table)->where('from_date' ,'<=',$showday )->where('to_date' ,'>=',$showday )->first();
        
        return view('pages.booking.show')->with('title', $title)->with('showday', $showday);
    }

    public function client(Request $request) {
        $totalval = 0;
        $data['free'] = $request->input("free");
        $data['ma'] = $request->input("malaysian");
        $data['nm'] = $request->input("NM");
        $data['con'] = $request->input("concession");
        $data['vip'] = $request->input("vip");
        $data['mc'] = $request->input("MC");
        $data['showday'] = $request->input("showday1");
        $data['showtime'] = $request->input("showtime");
        if($data['ma']!= NULL) $totalval=$totalval + $data['ma'] * 68;
        if($data['nm']!= NULL) $totalval=$totalval + $data['nm'] * 88;
        if($data['con']!= NULL) $totalval=$totalval + $data['con'] * 48;
        
        return view('pages.booking.client')->with('data', $data)->with('totalval', $totalval);
    }
    public function confirm(Request $request) {
        $data['name'] = $request->input("name1");
        $data['email'] = $request->input("email");
        $data['phone'] = $request->input("phone");
        $data['country'] = $request->input("country");
        $data['payment'] = $request->input("payment");
        $data['nm'] = $request->input("datenm");
        $data['ma'] = $request->input("datema");
        $data['con'] = $request->input("datecon");
        $data['day'] = $request->input("dateday");
        $data['time'] = $request->input("datetime");
        $data['total'] = $request->input("datetotal");

        //insert booking

        $result = DB::table(static::$table_booking);
        $result->insert(array('show_id'=>1, 'total' => $data['total'],'creator_id' => 1, 'status' => 'PENDING', 'helper_id'  =>1, 'payment_type' => 'PAYPAL', 'client_name' => $data['name'],'client_email'=>$data['email'],'client_phone'=>$data['phone'],'client_country'=>$data['country'] ));
        $id = DB::getPdo()->lastInsertId();

        $result = DB::table(static::$table_ticket);
        $result->insert(array('booking_id'=>$id,'seat_id'=>1,'seat_name'=>'A9','ticket_type'=>'Concession','price_id'=>1,'price'=>48,'status'=>'A'));

        $result = DB::table(static::$table_show);
        $result->insert(array('event_id'=>2,'venue_id'=>3,'date_time'=>$data['day'],'description'=>"show-movie"));

        return view('pages.booking.confirm')->with('data', $data);
    }
    
}

