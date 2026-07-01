<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Add to cart
    public function add(Request $request, $productId)
    {
        $existing = CartItem::where('user_id', Auth::id())
                    ->where('product_id', $productId)
                    ->first();

        if ($existing) {
            $existing->quantity += 1;
            $existing->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

return redirect(url()->previous() . '#productcards')
    ->with('success', 'Product cart la add aagiduchu!');
        }

    // Show cart
    public function index()
    {
        $cartItems = CartItem::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Remove item
    public function remove($id)
    {
        CartItem::where('user_id', Auth::id())->where('id', $id)->delete();
        return back()->with('success', 'Item remove aaiduchu');
    }

    // Update quantity
    public function update(Request $request, $id)
    {
        $item = CartItem::where('user_id', Auth::id())->where('id', $id)->first();
        if ($item) {
            $item->quantity = $request->quantity;
            $item->save();
        }
        return back();
    }
}
