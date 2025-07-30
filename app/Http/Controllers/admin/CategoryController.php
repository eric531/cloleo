<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::OrderBy('created_at', 'desc')->get();
        return view('admin.categories.index', compact('categories'));
    }
    

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|unique:categories|max:30',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if(!$request->has('name') && !$request->has('description')) {
            Session::flash('error', 'Veuillez remplir au moins un des champs.');
            return redirect()->back();
        }
        
        if ($request->hasFile('image')) {
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('categories', $fileName, 'public'); 
            $requestData["image"] = '/storage/'.$path;
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->name ?? 'Unknown',
        ];

        $category = Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
        ]);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('categories', 'public');
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->name,
        ];

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie supprimée.');
    }
}
