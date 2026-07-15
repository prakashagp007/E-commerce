<?php

// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Checkout form page
    public function index()
    {
        $cartItems = CartItem::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart empty ah irukku!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('checkout.index', compact('cartItems', 'total'));
    }

    // Place order
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name'           => 'required|string',
            'phone'          => 'required|digits:10',
            'address'        => 'required|string',
            'city'           => 'required|string',
            'pincode'        => 'required|digits:6',
            'payment_method' => 'required|in:cod,upi',
        ]);

        $cartItems = CartItem::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Cart empty!');
        }

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        // UPI ah select pannina, transaction id required
        if ($request->payment_method === 'upi') {
            $request->validate([
                'upi_transaction_id' => 'required|string|min:6',
            ]);
        }

        // Order create
        $order = Order::create([
            'user_id'            => Auth::id(),
            'total_amount'       => $total,
            'payment_method'     => $request->payment_method,
            'payment_status'     => $request->payment_method === 'cod' ? 'pending' : 'paid',
            'order_status'       => 'processing',
            'name'               => $request->name,
            'phone'              => $request->phone,
            'address'            => $request->address,
            'city'               => $request->city,
            'pincode'            => $request->pincode,
            'upi_transaction_id' => $request->upi_transaction_id ?? null,
        ]);

        // Order items create
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item->product_id,
                'quantity'   => $item->quantity,
                'price'      => $item->product->price,
            ]);
        }

        // Cart clear pannunga
        CartItem::where('user_id', Auth::id())->delete();

        return redirect()->route('order.success', $order->id);
    }

    // Order success page
    public function success($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);
        return view('checkout.success', compact('order'));
    }

    // Buy Now - direct checkout (cart bypass)
public function buyNow(Request $request, $productId)
{
    $product = \App\Models\Product::findOrFail($productId);
    $quantity = $request->quantity ?? 1;
    $total = $product->price * $quantity;

    // Temp ah session la store pannunga
    session(['buy_now' => [
        'product' => $product,
        'quantity' => $quantity,
        'total' => $total,
    ]]);

    return redirect()->route('checkout.index');
}


}
