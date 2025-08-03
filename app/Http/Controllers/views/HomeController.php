<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Favorite;
use App\Models\Review;
use App\Models\Pub;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        // Récupérer toutes les catégories pour le menu
        $data['pubs'] = Pub::inRandomOrder()->get();
        $data['products'] = Product::with('type_product', 'category')->inRandomOrder()->get();
        $data['deals'] = Product::with('type_product')
                        ->whereHas('type_product', function ($query) {
                            $query->where('name', 'deal'); // Vérifie que le type de produit a "Deal" comme nom
                        })
                        ->inRandomOrder()
                        ->get();

        $query = Product::query();

        // Filtrer les produits par catégorie si une catégorie est sélectionnée
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        // Récupérer les produits
        // $data['products'] = $query->inRandomOrder()->take(12)->get();

        return view('welcome', $data);
    }

    // Afficher les produits d'une catégorie
    public function show(Category $category)
    {

        // Récupérer les produits de cette catégorie avec les informations supplémentaires
        $data['products'] = Product::with('type_product', 'category')
                        ->where('category_id', $category->id)
                        ->inRandomOrder()
                        ->paginate(20);

        $data['deals'] = Product::with('type_product')
                        ->whereHas('type_product', function ($query) {
                            $query->where('name', 'like', '%deal%'); // Vérifie que le type de produit a "Deal" comme nom
                        })
                        ->inRandomOrder()
                        ->get();

        $data['nouveaux'] = Product::with('type_product')
                        ->whereHas('type_product', function ($query) {
                            $query->where('name', 'like', '%nouveaute%');
                        })
                        ->inRandomOrder()
                        ->get();

        // Récupérer toutes les catégories pour le menu
        $data['pubs'] = Pub::where('created_at', '>', now()->subDays(30))->get();
        $data['categories'] = Category::all();

        return view('categories.show', $data);
    }


    // Afficher un produit
    public function showProduct(Product $product)
    {
        // Vérifier si l'utilisateur a marqué ce produit comme favori
        $data['isFavorite'] = auth()->check() ? auth()->user()->favorites()->where('product_id', $product->id)->exists() : false;
        $data['pubs'] = Pub::where('created_at', '>', now()->subDays(30))->get();
        $data['product'] = $product;
        $data['products'] = Product::with('category')->findOrFail($product->id);;
        $data['reviews'] = Review::where('product_id', $product->id)->latest()->get(); // Récupérer les avis
        $data['averageRating'] = $data['reviews']->avg('rating') ?? 0; // Calculer la moyenne des notes
        $data['nouveaux'] = Product::with('type_product')
        ->whereHas('type_product', function ($query) {
            $query->where('name', 'nouveaute');
        })
        ->inRandomOrder()
        ->get();
        return view('products.show', $data);
    }



}
