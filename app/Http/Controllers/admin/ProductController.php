<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $data['categories'] = Category::OrderBy('created_at')->get();
        $data['types'] = TypeProduct::OrderBy('created_at')->get();

        return view('admin.products.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'old_price' => 'nullable|numeric',
                'stock' => 'required|integer',
                'image' => 'nullable|image|max:5048',
                'category_id' => 'required|exists:categories,id',
                'type_product_id' => 'required|exists:type_products,id',
                'created_by' => 'nullable|string',
            ]);


            if($request->input('created_by') == null) {
                $validated['created_by'] = "Cloleo";
            }
            // Initialisation du nom de fichier (utile pour suppression si échec)
            $filename = null;

            // Gestion du fichier image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('products', $filename, 'public');
                $validated['image'] = '/storage/' . $path;
            }

            // Création du produit
            Product::create($validated);

            DB::commit();

            return $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Produit ajouté avec succès.'])
                : redirect()->route('admin.products.index')->with('success', 'Produit ajouté.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Si un fichier avait été sauvegardé, on le supprime
            if ($filename) {
                Storage::disk('public')->delete('products/' . $filename);
            }

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $e->getMessage()], 422)
                : redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $product->update($request->all());

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
            $product->save();
        }

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé.');
    }
}
