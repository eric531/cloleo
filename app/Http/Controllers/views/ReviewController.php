<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Votre avis a été ajouté.');
    }

    public function destroy(Review $review)
    {
        if (auth()->user()->hasRole('admin') || auth()->id() === $review->user_id) {
            $review->delete();
            return redirect()->back()->with('success', 'Avis supprimé.');
        }

        return redirect()->back()->with('error', 'Action non autorisée.');
    }
}
