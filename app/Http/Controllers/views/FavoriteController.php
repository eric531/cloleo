<?php

namespace App\Http\Controllers\views;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Toggle favorite
    public function toggle(Product $product)
    {
        $favorite = Favorite::where('user_id', auth()->id())->where('product_id', $product->id)->first();

        if ($favorite) {
            $favorite->delete();
        } else {
            Favorite::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id
            ]);
        }

        return redirect()->back();
    }
}
