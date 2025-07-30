<?php

namespace App\Http\Controllers\views;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    //

    public function index()
    {
        $cart = Session::get('cart', []);
        return view('cart.index', compact('cart'));
    }


    public function addToCart(Request $request, $productId)
    {
        try {
            $product = Product::findOrFail($productId); // Si le produit n'existe pas, une exception est levée
            $quantity = $request->input('quantity', 1);
            $cart = Session::get('cart', []);
    
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->image,
                ];
            }
    
            Session::put('cart', $cart);
    
            // Générer le HTML mis à jour pour le dropdown du panier
            $cartHtml = view('partials.cart_dropdown', compact('cart'))->render();
    
            return response()->json([
                'success' => true,
                'cartCount' => count($cart),
                'cartHtml' => $cartHtml,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    



    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Update cart logic (e.g., update session or database)
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Produit non trouvé dans le panier']);
    }

    public function removeFromCart($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Produit retiré du panier.');
    }

    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->back()->with('success', 'Panier vidé.');
    }
}
