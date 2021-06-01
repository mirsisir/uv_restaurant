<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Exception;

class TestsController extends Controller
{

    /**
     * Display a listing of the tests.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $tests = Test::paginate(25);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new test.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        

        return view('tests.create');
    }

    /**
     * Store a new test in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

            
            $data = $this->getData($request);
            
            Test::create($data);

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully added.');

    }

    /**
     * Display the specified test.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);

        return view('tests.show', compact('test'));
    }

    /**
     * Show the form for editing the specified test.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        

        return view('tests.edit', compact('test'));
    }

    /**
     * Update the specified test in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

            
            $data = $this->getData($request);
            
            $test = Test::findOrFail($id);
            $test->update($data);

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully updated.');

    }

    /**
     * Remove the specified test from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $test = Test::findOrFail($id);
            $test->delete();

            return redirect()->route('tests.test.index')
                ->with('success_message', 'Test was successfully deleted.');
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
                'name' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'phone' => 'string|min:1|nullable',
            'is_offer' => 'boolean|nullable', 
        ];
        
        $data = $request->validate($rules);

        $data['is_offer'] = $request->has('is_offer');

        return $data;
    }

}
