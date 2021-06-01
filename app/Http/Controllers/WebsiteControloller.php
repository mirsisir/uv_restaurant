<?php

namespace App\Http\Controllers;

use App\FoodMenu;
use App\Models\Food;
use Illuminate\Http\Request;

class WebsiteControloller extends Controller
{
    public function home(){

        $foodmenu = Food::inRandomOrder()->get()
            ->groupBy('category_id')
            ->take(3)
            ->map(function($food) {
                return $food->take(1);
            });


        return view('spicy.index',compact('foodmenu'));
    }


    public function menu(){

        $foodmenu = Food::all()
            ->groupBy('category_id');
        return view('spicy.food_menu',compact('foodmenu'));
    }

}
