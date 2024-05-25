<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dukpro;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PromoPoint;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Dukpro::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "nama" => $product->nama,
                "quantity" => 1,
                "harga" => $product->harga,
                "image" => $product->image
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function showCart()
    {
        $startDate = Carbon::now()->startOfDay();
        $endDate = Carbon::now()->endOfDay();
        $cart = Session::get('cart', []);
        $promoPoints = PromoPoint::where('tanggal_dimulai', '<=', $startDate)
            ->where('tanggal_berakhir', '>=', $endDate)
            ->get();
        return view('cart', compact('cart', 'promoPoints'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = Session::get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            Session::put('cart', $cart);
            Session::flash('success', 'Cart updated successfully');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }

    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = Session::get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                Session::put('cart', $cart);
            }
            Session::flash('success', 'Product removed successfully');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }


    public function applyPromo(Request $request)
{
    $promoId = $request->input('promo_id');
    $totalPrice = $request->input('total_price');

    // Retrieve the promo details using the promo ID
    $promo = PromoPoint::find($promoId);

    if ($promo) {
        $discount = $promo->jumlah_point; // Assuming jumlah_point is the discount value

        // Get the current claimed promo IDs and total discount from session
        $claimedPromoIds = session('claimed_promo_ids', []);
        $totalDiscount = session('total_discount', 0);

        // Add the new promo to the claimed promo IDs and update the total discount
        if (!in_array($promoId, $claimedPromoIds)) {
            $claimedPromoIds[] = $promoId;
            $totalDiscount += $discount;
        }

        $totalPriceAfterDiscount = $totalPrice - $totalDiscount;

        // Store the updated claimed promo IDs and new total discount in session
        session(['claimed_promo_ids' => $claimedPromoIds]);
        session(['total_discount' => $totalDiscount]);
        session(['total_price_after_discount' => $totalPriceAfterDiscount]);
    }

    return redirect()->back();
}

public function applyPoints(Request $request)
{
    $point_user = $request->input('point_user');
    $totalPrice = $request->input('total_price');
    $claimedPromoIds = session('claimed_promo_ids', []);
    $totalDiscount = session('total_discount', 0);

    $claimedPromoIds = session('claimed_promo_ids', []);
    $totalDiscount = session('total_discount', 0);

    $totalPriceAfterDiscount = $totalPrice - $totalDiscount - $point_user;
    session(['claimed_promo_ids' => $claimedPromoIds]);
    session(['total_discount' => $totalDiscount]);
    session(['total_price_after_discount' => $totalPriceAfterDiscount]);
    session(['status_claim' => 'true']);
    return redirect()->back();
}

public function cancelPointClaim(Request $request)
{
    session(['claimed_promo_ids' => []]);
    session(['total_discount' => 0]);
    session(['total_price_after_discount' => 0]);

    return redirect()->back();
}


public function checkout(Request $request)
{
    // Retrieve the cart from session
    $cart = session('cart', []);
    
    // Calculate the total price
    $totalPrice = array_reduce($cart, function ($carry, $item) {
        return $carry + $item['harga'] * $item['quantity'];
    }, 0);

    // Retrieve the total price after discount from session, default to totalPrice if not set
    $totalPriceAfterDiscount = session('total_price_after_discount', $totalPrice);

    // Retrieve applied promos and their discounts
    $appliedPromos = session('total_discount', []);
    $transactionId = strtoupper(Str::random(6)) . rand(1000, 9999);

    // Create a new order
    $order = new Order();
    $order->total_price = $totalPriceAfterDiscount;
    $order->id_transaksi = $transactionId;
    $order->save();

    // Create order items and reduce product stock
    DB::transaction(function () use ($cart, $order) {
        foreach ($cart as $id => $details) {
            $product = Dukpro::find($id);
            
            // Ensure there is enough stock
            if ($product->stok >= $details['quantity']) {
                // Create order item
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->dukpro_id = $id;
                $orderItem->quantity = $details['quantity'];
                $orderItem->price = $details['harga'];
                $orderItem->save();

                // Reduce stock
                $product->stok -= $details['quantity'];
                $product->save();
            } else {
                throw new \Exception('Not enough stock for product: ' . $product->nama);
            }
        }
    });

    // Clear the cart and other session data
    session()->forget(['cart', 'claimed_promo_ids', 'total_price_after_discount']);

    return view('receipt', ['order' => $order, 'appliedPromos' => $appliedPromos]);
}

}
