<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ReservationConfirmMail;
use App\Models\BookTable;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Mail;

class BookTablesController extends Controller
{

    /**
     * Display a listing of the book tables.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $bookTables = BookTable::paginate(25);

        return view('book_tables.index', compact('bookTables'));
    }

    /**
     * Show the form for creating a new book table.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('book_tables.create');
    }

    /**
     * Store a new book table in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            BookTable::create($data);

            return redirect()->back()
                ->with('success_message', 'Book Table was successfully added.');

    }

    /**
     * Display the specified book table.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $bookTable = BookTable::findOrFail($id);

        return view('book_tables.show', compact('bookTable'));
    }

    /**
     * Show the form for editing the specified book table.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $bookTable = BookTable::findOrFail($id);


        return view('book_tables.edit', compact('bookTable'));
    }

    /**
     * Update the specified book table in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            if ($request->is_approved == 1){
                Mail::to($request->email)->send(new ReservationConfirmMail());
            }

            $bookTable = BookTable::findOrFail($id);
            $bookTable->update($data);

            return redirect()->route('book_tables.book_table.index')
                ->with('success_message', 'Book Table was successfully updated.');

    }

    /**
     * Remove the specified book table from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $bookTable = BookTable::findOrFail($id);
            $bookTable->delete();

            return redirect()->route('book_tables.book_table.index')
                ->with('success_message', 'Book Table was successfully deleted.');
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
            'name' => 'required|nullable|string|min:1|max:255',
            'phone' => 'required|nullable|string|min:1',
            'email' => 'nullable',
            'date' => 'required|nullable|string|min:1',
            'time' => 'required|nullable|string|min:1',
            'guest' => 'nullable|string|min:0',
            'is_approved' => 'boolean|nullable',
        ];

        $data = $request->validate($rules);

        $data['is_approved'] = $request->has('is_approved');

        return $data;
    }

}
