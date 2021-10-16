<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;
use Exception;

class FoodController extends Controller
{


    public function index()
    {
        $foodObjects = Food::with('category')->paginate(25);

        return view('food.index', compact('foodObjects'));
    }

    public function create()
    {
        $categories = Category::pluck('name','id')->all();

        return view('food.create', compact('categories'));
    }


    public function store(Request $request)
    {


            $data = $this->getData($request);

            Food::create($data);

            return redirect()->route('food.food.index')
                ->with('success_message', 'Food was successfully added.');

    }


    public function show($id)
    {
        $food = Food::with('category')->findOrFail($id);

        return view('food.show', compact('food'));
    }


    public function edit($id)
    {
        $food = Food::findOrFail($id);
        $categories = Category::pluck('name','id')->all();

        return view('food.edit', compact('food','categories'));
    }


    public function update($id, Request $request)
    {


            $data = $this->getData($request);

            $food = Food::findOrFail($id);
            $food->update($data);

            return redirect()->route('food.food.index')
                ->with('success_message', 'Food was successfully updated.');

    }


    public function destroy($id)
    {
        try {
            $food = Food::findOrFail($id);
            $food->delete();

            return redirect()->route('food.food.index')
                ->with('success_message', 'Food was successfully deleted.');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }



    protected function getData(Request $request)
    {
        $rules = [
                'name' => 'required|string|min:1|max:255|nullable',
            'category_id' => 'required|nullable',
            'details' => 'string|min:1|max:1000|nullable',
            'price' => 'required|nullable|string|min:1',
            'is_offer' => 'boolean|nullable',
            'is_special' => 'boolean|nullable',
            'status' => 'required|nullable',
            'image' => ['nullable','file'],
        ];

        $data = $request->validate($rules);
        if ($request->has('custom_delete_image')) {
            $data['image'] = null;
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->moveFile($request->file('image'));
        }

        $data['is_offer'] = $request->has('is_offer');
        $data['is_special'] = $request->has('is_special');

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
}
