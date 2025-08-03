<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pub;
use App\Models\TypeProduct;
use App\Models\Category;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function categoryIndex()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function pubIndex()
    {
        $pubs = Pub::all();
        return view('admin.pub.index', compact('pubs'));
    }

    // fonction de creation
    public function pubStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:450',
            'link' => 'nullable|string',
            'category_id' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'link' => $request->link ?? null,

            'category_id' => $request->category_id
        ];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('pubs', $filename, 'public');
            $validated['image'] = '/storage/' . $path;
        }
        $max = 3;
        for ($i = 0; $i < $max; $i++) {
            $pub = Pub::create($data);
            return redirect()->route('admin.pubs.index')->with('success', 'la pub: ' . $pub->name . ' a été ajouté.');
        }
        session()->flash('error', 'Nombre maximum de pubs atteint.');
        return redirect()->route('admin.pubs.index')->with('error', 'Nombre maximum de pubs atteint.');
    }

    // fonction de creation
    public function pubCreate()
    {
        return view('admin.pub.create');
    }

    // fonction de modification
    public function pubEdit(Pub $pub)
    {
        return view('admin.pub.edit', compact('pub'));
    }



    // function de mise à jour
    public function pubUpdate(Request $request, Pub $pub)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:450',
            'link' => 'nullable|string',
            'category_id' => 'required',

        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'link' => $request->link ?? null,
            'created_by' => auth()->user()->name ?? 'Unknown',
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('pubs', 'public');
        }

        $pub->update($data);
        return redirect()->route('admin.pubs.index')->with('success', 'la pub: ' . $pub->name . ' a été mise à jour.');
    }

    // fonction de suppression
    public function pubDestroy(Pub $pub)
    {
        $pub->delete();
        return redirect()->route('admin.pubs.destroy')->with('success', 'la pub: ' . $pub->name . ' a été supprimé.');
    }

    public function etiquette(Request $request)
    {
        $etiquettes = TypeProduct::all();
        return view('admin.etiquette.index', compact('etiquettes'));
    }

    public function etiquetteStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $data = [
            'name' => $request->name,
        ];
        $validate = TypeProduct::where('name', $request->name)->first();
        if ($validate) {
            return redirect()->route('etiquette.index')->with('error', 'Etiquette: ' . $validate->name . ' existe déjà.');
        }

        $etiquette = TypeProduct::create($data);

        return redirect()->route('etiquette.index')->with('success', 'Etiquette: ' . $etiquette->name . ' a été ajouté.');
    }

    public function etiquetteEdit(TypeProduct $etiquette)
    {
        return view('admin.etiquette.edit', compact('etiquette'));
    }

    public function etiquetteUpdate(Request $request, TypeProduct $etiquette)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $data = [
            'name' => $request->name,
        ];

        $etiquette->update($data);
        return redirect()->route('etiquette.index')->with('success', 'Etiquette: ' . $etiquette->name . ' a été mise à jour.');
    }

    public function etiquetteDestroy(TypeProduct $etiquette)
    {
        $etiquette->delete();
        return redirect()->route('etiquette.index')->with('success', 'Etiquette: ' . $etiquette->name . ' a été supprimé.');
    }
}
