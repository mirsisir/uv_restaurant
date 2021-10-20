<?php

namespace App\Http\Controllers;

use App\Listeners\SendOrderNotification;
use App\Mail\TableReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Mail;

class ReservationController extends Controller
{
   public function book_table(Request $request){

       $data = new Reservation;
       $data->name = $request->name;
       $data->phone = $request->phone;
       $data->email = $request->email;
       $data->date = $request->date;
       $data->time = $request->time;
       $data->guest = $request->guest;
       $data->accept = 0;
       $data->save();

       $data->type = 'reservation';



       event(new SendOrderNotification($data));

       Mail::to($request->email)->send(new TableReservationRequest());


       return redirect(route('home'))->with('reservation',"your request has been placed wait for confirmation");
   }



   public function reservation(){

       $reservations = Reservation::all();

       return view('admin.reservation',compact('reservations'));
   }
}
