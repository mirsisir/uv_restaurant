<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Exception;

class ReservationsController extends Controller
{


    public function index()
    {
        $reservations = Reservation::paginate(25);

        return view('reservations.index', compact('reservations'));
    }


    public function create()
    {


        return view('reservations.create');
    }


    public function store(Request $request)
    {


            $data = $this->getData($request);

            Reservation::create($data);

            return redirect()->route('reservations.reservation.index')
                ->with('success_message', 'Reservation was successfully added.');

    }


    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('reservations.show', compact('reservation'));
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);


        return view('reservations.edit', compact('reservation'));
    }

    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $reservation = Reservation::findOrFail($id);
            $reservation->update($data);

            return redirect()->route('reservations.reservation.index')
                ->with('success_message', 'Reservation was successfully updated.');

    }



    public function destroy($id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->delete();

            return redirect()->route('reservations.reservation.index')
                ->with('success_message', 'Reservation was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:255',
            'email' => 'required|string|min:1|max:255',
            'phone' => 'required|string|min:1|max:255',
            'date' => 'required|string|min:1|max:255',
            'time' => 'required|string|min:1|max:255',
            'guest' => 'required|string|min:1|max:255',
            'accept' => 'boolean',
            'table_no' => 'nullable|string|min:0|max:255',
        ];

        $data = $request->validate($rules);

        $data['accept'] = $request->has('accept');

        return $data;
    }

}
