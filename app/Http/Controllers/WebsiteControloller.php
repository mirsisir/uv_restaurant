<?php

namespace App\Http\Controllers;

use App\FoodMenu;
use App\Models\Blog;
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

        $blogs = Blog::query()->latest()->take(3)->get();


        return view('spicy.index',compact('foodmenu','blogs'));
    }


    public function menu(){

        $foodmenu = Food::all()
            ->groupBy('category_id');
        return view('spicy.food_menu',compact('foodmenu'));
    }

    public function cart()
    {

        return view('website.cart');
    }

    public function addToCart($id)
    {
        $food = food::find($id);

        if(!$food) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first food
        if(!$cart) {

            $cart = [
                $id => [
                    "food" => $id,
                    "name" => $food->name,
                    "quantity" => 1,
                    "price" => $food->price,
                    "photo" => $food->photo
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('layouts._header_cart')->render();

            return response()->json(['msg' => 'food added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'food added to cart successfully!');
        }

        // if cart not empty then check if this food exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('layouts._header_cart')->render();

            return response()->json(['msg' => 'food added to cart successfully!', 'data' => $htmlCart]);

            //return redirect()->back()->with('success', 'food added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $food->name,
            "quantity" => 1,
            "price" => $food->price,
            "photo" => $food->photo
        ];

        session()->put('cart', $cart);

        $htmlCart = view('layouts._header_cart')->render();

        return response()->json(['msg' => 'food added to cart successfully!', 'data' => $htmlCart]);

        //return redirect()->back()->with('success', 'food added to cart successfully!');
    }



    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

            $total = $this->getCartTotal();

            $htmlCart = view('layouts._header_cart')->render();

            return response()->json(['msg' => 'Cart updated successfully', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('layouts._header_cart')->render();

            return response()->json(['msg' => 'food removed successfully',
                'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'food removed successfully');
        }
    }


    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return number_format($total, 2);
    }





}
