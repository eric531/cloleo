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
use Illuminate\Support\Facades\Validator;

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
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'old_price' => 'nullable|numeric',
                'stock' => 'required|integer',
                'image' => 'nullable|image|max:5048',
                'category_id' => 'required|exists:categories,id',
                'type_product_id' => 'required|exists:type_products,id',
                'created_by' => 'required|string',
            ], [
                'name.required' => 'Le nom du produit est obligatoire.',
                'description.required' => 'La description du produit est obligatoire.',
                'price.required' => 'Le prix du produit est obligatoire.',
                'stock.required' => 'Le stock du produit est obligatoire.',
                'category_id.required' => 'La catégorie du produit est obligatoire.',
                'type_product_id.required' => 'Le type de produit est obligatoire.',
            ]);

            // Vérification générale
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }


            // Récupération des données validées
            $validated = $validator->validated();
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
            // if ($filename) {
            //     Storage::disk('public')->delete('products/' . $filename);
            // }

            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $e->getMessage()], 422)
                : redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $typeProducts = TypeProduct::all();
        return view('admin.products.edit', compact('product', 'categories', 'typeProducts'));
    }


    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            // Validation des données avec 'sometimes' pour permettre des mises à jour partielles
            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|string',
                'price' => 'sometimes|numeric',
                'old_price' => 'sometimes|numeric',
                'stock' => 'sometimes|integer',
                'image' => 'sometimes|image|max:2048',
                'category_id' => 'sometimes|exists:categories,id',
                'type_product_id' => 'sometimes|exists:type_products,id',
            ], [
                'name.required' => 'Le nom du produit est obligatoire.',
                'price.required' => 'Le prix du produit est obligatoire.',
                'stock.required' => 'Le stock du produit est obligatoire.',
                'category_id.exists' => 'La catégorie sélectionnée n\'existe pas.',
                'type_product_id.exists' => 'Le type de produit sélectionné n\'existe pas.',
                'image.image' => 'Le fichier doit être une image.',
                'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            ]);

            // Vérification des erreurs de validation
            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
                } else {
                    return back()->withErrors($validator)->withInput();
                }
            }

            // Récupération des données validées
            $validated = $validator->validated();

            // Gestion de l'image
            if ($request->hasFile('image')) {
                // Suppression de l'ancienne image si elle existe
                if ($product->image) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $product->image));
                }

                // Téléversement de la nouvelle image
                $file = $request->file('image');
                $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('products', $filename, 'public');
                $validated['image'] = '/storage/' . $path;
            }

            // Mise à jour du produit avec les données validées uniquement
            $product->update($validated);

            DB::commit();

            // Réponse adaptée selon le type de requête
            return $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Produit mis à jour avec succès.'])
                : redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Gestion des erreurs avec réponse adaptée
            return $request->ajax()
                ? response()->json(['success' => false, 'message' => $e->getMessage()], 500)
                : redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé.');
    }
}
