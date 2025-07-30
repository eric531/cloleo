<?php


namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkout()
    {
         $cart = Session::get('cart', []);
        return view('checkout.checkout', compact('cart'));
    }
    public function store(Request $request)

    {
        // les coordonnee clients
        $request->validate([
            ''
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour passer une commande.');
        }

        // Get cart from session
        $cart = Session::get('cart', []);

        // Check if cart is empty
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        // Calculate total price using quantities from the cart
        $total = 0;
        foreach ($cart as $product) {
            $total += $product['price'] * $product['quantity']; // Use product quantity from cart
        }

        // 1. Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => $total,
            'status' => 'en attente', // Default status
        ]);

        // 2. Save each product in OrderItems
        foreach ($cart as $product) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price'],
            ]);
        }

        // 3. Clear the cart
        Session::forget('cart');

        // 4. Redirect with success message
        return redirect()->route('home')->with('success', 'Commande passée avec succès !');
    }

    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        Log::info("Updating cart: product_id=$productId, quantity=$quantity");

        if ($quantity < 1) {
            return response()->json(['success' => false, 'message' => 'La quantité doit être au moins 1.']);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Produit non trouvé dans le panier']);
    }
}
