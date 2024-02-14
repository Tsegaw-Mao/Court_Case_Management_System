<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }


    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,doc,docx,txt,ppt,pdf,mp4,mp3,xlx',
            'is_active' => 'sometimes'
        ]);

        if($request->has('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'upload/category/';
            $file->move($path, $filename);
        }

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'file' => $path.$filename,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect('categories/create')->with('status','file uploaded sucessfully');
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'file' => 'nullable|mimes:png,jpg,jpeg,doc,docx,txt,ppt,pdf,mp4,mp3,xlx',
            'is_active' => 'sometimes'
        ]);

        $category = Category::findOrFail($id);

        if($request->has('file')){

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/category/';
            $file->move($path, $filename);

            if(File::exists($category->file)){
                File::delete($category->file);
            }
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'file' => $path.$filename,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect()->back()->with('status','file Update');
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        if(File::exists($category->file)){
            File::delete($category->file);
        }

        $category->delete();

        return redirect()->back()->with('status','file Deleted sucessfully');
    }
}
