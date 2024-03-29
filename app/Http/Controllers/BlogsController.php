<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Exception;

class BlogsController extends Controller
{

    /**
     * Display a listing of the blogs.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::paginate(25);

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {


        return view('blogs.create');
    }

    /**
     * Store a new blog in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


            $data = $this->getData($request);

            Blog::create($data);

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully added.');

    }

    /**
     * Display the specified blog.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);


        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified blog in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $blog = Blog::findOrFail($id);
            $blog->update($data);

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully updated.');

    }

    /**
     * Remove the specified blog from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully deleted.');
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
                'title' => 'string|min:1|max:255|nullable',
            'description' => 'string|min:1|max:1000|nullable',
            'image' => ['nullable','file'],
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_image')) {
            $data['image'] = null;
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->moveFile($request->file('image'));
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


        $path = config('codegenerator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}
