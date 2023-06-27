<?php 

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductGroupItem;
use App\Models\UserProductGroup;

class ProductRepository {

    public function addProductInCart($userID, $productID)
    {
        $cartItem = Cart::where('user_id', $userID)
            ->where('product_id', $productID)
            ->first();

        if ($cartItem) {
            return Cart::where('user_id', $userID)
                ->where('product_id', $productID)
                ->update([
                    'quantity' => $cartItem->quantity + 1
                ]);
        }else{
            return Cart::create([
                'user_id' => $userID,
                'product_id' => $productID
            ]);
        }        
    }

    public function removeProductFromCart($userID, $productID)
    {
        return Cart::where('user_id', $userID)
            ->where('product_id', $productID)
            ->delete();
    }

    public function setCartProductQuantity($userID, $productID, $quantity)
    {
        return Cart::where('user_id', $userID)
            ->where('product_id', $productID)
            ->update([
                'quantity' => $quantity
            ]);
    }

    public function getUserCart($userID)
    {
        $cartItems = Cart::with('product')->where('user_id', $userID)->get();

        $discount = 0;
        
        foreach ($cartItems as $cartItem) {
            $group = ProductGroupItem::where('product_id', $cartItem->product->id)->first();
            if (!$group) continue;

            $allItemsFromGroup = $results = ProductGroupItem::where('group_id', $group->group_id)
                ->where('carts.user_id', $userID)
                ->join('carts', 'carts.product_id', '=', 'product_group_items.product_id')
                ->join('products', 'products.id', '=', 'product_group_items.product_id')
                ->join('user_product_groups', 'user_product_groups.id', '=', 'product_group_items.group_id')
                ->orderBy('carts.quantity', 'ASC')
                ->get();

            $userProductsArray = $cartItems->pluck('product_id')->toArray();

            $diff = array_diff($allItemsFromGroup->pluck('product_id')->toArray(), $userProductsArray);
            if(!empty($diff)) continue;

            $quantity = $allItemsFromGroup->first()->quantity;

            foreach ($allItemsFromGroup as $item) {
                $discount += $quantity * $item->price * $item->discount / 100;
            }
        }

        $cartItems = $cartItems->toArray();
        $cartItems['discount'] = $discount;

        return $cartItems;
    }
}