<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Exception;

class NewslettersController extends Controller
{

    /**
     * Display a listing of the newsletters.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $newsletters = Newsletter::paginate(25);

        return view('newsletters.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new newsletter.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('newsletters.create');
    }

    /**
     * Store a new newsletter in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            Newsletter::create($data);

            return redirect()->back()
                ->with('success_message', 'Newsletter was successfully added.');

    }

    /**
     * Display the specified newsletter.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return view('newsletters.show', compact('newsletter'));
    }

    /**
     * Show the form for editing the specified newsletter.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);


        return view('newsletters.edit', compact('newsletter'));
    }

    /**
     * Update the specified newsletter in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $newsletter = Newsletter::findOrFail($id);
            $newsletter->update($data);

            return redirect()->route('newsletters.newsletter.index')
                ->with('success_message', 'Newsletter was successfully updated.');

    }

    /**
     * Remove the specified newsletter from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $newsletter = Newsletter::findOrFail($id);
            $newsletter->delete();

            return redirect()->route('newsletters.newsletter.index')
                ->with('success_message', 'Newsletter was successfully deleted.');
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
                'email' => 'nullable',
            'name' => 'string|min:1|max:255|nullable',
        ];

        $data = $request->validate($rules);


        return $data;
    }

}
