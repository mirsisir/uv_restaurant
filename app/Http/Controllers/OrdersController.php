<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Exception;

class OrdersController extends Controller
{

    /**
     * Display a listing of the orders.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::paginate(25);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('orders.create');
    }

    /**
     * Store a new order in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Order::create($data);

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully added.');

    }

    /**
     * Display the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified order in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $order = Order::findOrFail($id);
            $order->update($data);

            return redirect()->route('orders.order.index')
                ->with('success_message', 'Order was successfully updated.');

    }

    /**
     * Remove the specified order from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
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

    
    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request 
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'first_name' => 'required|nullable|string|min:1',
            'last_name' => 'required|nullable|string|min:1',
            'address' => 'required|nullable|string|min:1',
            'phone' => 'required|nullable|string|min:1',
            'email' => 'nullable',
            'total' => 'numeric|nullable',
            'payment_type' => 'string|min:1|nullable',
            'is_paid' => 'boolean|nullable',
            'status' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_paid'] = $request->has('is_paid');

        return $data;
    }

}
