<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Exception;

class GeneralSettingsController extends Controller
{

    /**
     * Display a listing of the general settings.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $generalSettingsObjects = GeneralSettings::paginate(25);

        return view('general_settings.index', compact('generalSettingsObjects'));
    }

    /**
     * Show the form for creating a new general settings.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('general_settings.create');
    }

    /**
     * Store a new general settings in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            GeneralSettings::create($data);

            return redirect()->route('general_settings.general_settings.index')
                ->with('success_message', 'General Settings was successfully added.');

    }

    /**
     * Display the specified general settings.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $generalSettings = GeneralSettings::findOrFail($id);

        return view('general_settings.show', compact('generalSettings'));
    }

    /**
     * Show the form for editing the specified general settings.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $generalSettings = GeneralSettings::findOrFail($id);


        return view('general_settings.edit', compact('generalSettings'));
    }

    /**
     * Update the specified general settings in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $generalSettings = GeneralSettings::findOrFail($id);
            $generalSettings->update($data);

            return redirect()->route('general_settings.general_settings.index')
                ->with('success_message', 'General Settings was successfully updated.');

    }

    /**
     * Remove the specified general settings from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $generalSettings = GeneralSettings::findOrFail($id);
            $generalSettings->delete();

            return redirect()->route('general_settings.general_settings.index')
                ->with('success_message', 'General Settings was successfully deleted.');
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
            'title' => 'string|min:1|max:255|nullable',
            'phone' => 'string|min:1|nullable',
            'email' => 'nullable',
            'address' => 'string|min:1|nullable',
            'logo' => ['nullable','file'],
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_logo')) {
            $data['logo'] = null;
        }
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->moveFile($request->file('logo'));
        }


        return $data;
    }

    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

//<<<<<<< HEAD
        $path = config('codegenerator.files_upload_path', 'uploads');
//=======
//        $path = config('laravel-code-generator.files_upload_path', 'uploads');
//>>>>>>> v2.3
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
