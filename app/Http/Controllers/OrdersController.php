<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Listeners\SendOrderNotification;
use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{


    public function index()
    {
        $orders = Order::with('user')->paginate(25);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::pluck('name', 'id')->all();

        return view('orders.create', compact('users'));
    }


    public function store(Request $request)
    {


        $data = $this->getData($request);

        Order::create($data);

        event(new SendOrderNotification($data));

        return redirect()->route('orders.order.index')
            ->with('success_message', 'Order was successfully added.');

    }


    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);

        return view('orders.show', compact('order'));
    }


    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::pluck('name', 'id')->all();

        return view('orders.edit', compact('order', 'users'));
    }


    public function update($id, Request $request)
    {


        $data = $this->getData($request);

        $order = Order::findOrFail($id);
        $order->update($data);

        return redirect()->route('orders.order.index')
            ->with('success_message', 'Order was successfully updated.');

    }


    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }


    protected function getData(Request $request)
    {
        $rules = [
            'user_id' => 'nullable',
            'total' => 'numeric|nullable',
            'discount' => 'numeric|nullable',
            'payment' => 'string|min:1|nullable',
            'status' => 'string|min:1|nullable',
            'is_paid' => 'boolean|nullable',
        ];

        $data = $request->validate($rules);

        $data['is_paid'] = $request->has('is_paid');

        return $data;
    }


    public function order_confirm()
    {
        $orders = session('cart');
        $total = 0;
        foreach ($orders as $order) {
            $total += $order['quantity'] * $order['price'];
        }

        $_order = new Order;
        $_order->user_id = auth()->user()->id;
        $_order->total = $total;
        $_order->discount = 0;
        $_order->payment = 0;
        $_order->status = "Pending";
        $_order->is_paid = 0;
        $_order->save();

        $cart = session()->get('cart');

        unset($cart);
        $_cart = null;
        session()->put('cart', $_cart);

        return redirect()->back()->with('message','Order Has been placed successfully');
    }

}
