<?php

namespace App\Http\Controllers;

use App\FoodMenu;
use Illuminate\Http\Request;

class FoodMenuController extends Controller
{
    public function add_food_item(){

        return view('admin.add_food_item');
    }


    public function store_food_item(){
        $add_food_item = new FoodMenu;

        $add_food_item->name = \request('name');
        $add_food_item->price = \request('price');
        $add_food_item->description = \request('description');
        $add_food_item->image = \request()->image->store('images', 'public');
        $add_food_item->save();






        return redirect(route('add_food_item'));
    }


























}


