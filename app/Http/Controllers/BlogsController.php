<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Exception;

class BlogsController extends Controller
{


    public function index()
    {
        $blogs = Blog::paginate(25);

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {


        return view('blogs.create');
    }


    public function store(Request $request)
    {


            $data = $this->getData($request);

            Blog::create($data);

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully added.');

    }


    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);


        return view('blogs.edit', compact('blog'));
    }


    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $blog = Blog::findOrFail($id);
            $blog->update($data);

            return redirect()->route('blogs.blog.index')
                ->with('success_message', 'Blog was successfully updated.');

    }


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


    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }


        $path = config('codegenerator.files_upload_path', 'uploads');

        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }


    public function read($id){

        $blog = Blog::find($id);
        return view('blogs.read',compact('blog'));

    }

    public function blogs(){

        $blogs = Blog::all();

        return view('blogs.blogs',compact('blogs'));

    }
}
