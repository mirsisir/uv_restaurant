<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

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
       $data->save();


       return redirect(route('home'));
   }
}
