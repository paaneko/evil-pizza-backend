<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCartRequest;
use App\Http\Requests\UpdateUserCartRequest;
use App\Models\CartProduct;
use App\Models\UserCart;
use Illuminate\Support\Facades\DB;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserCartRequest $request)
    {
        DB::connection()->enableQueryLog();
        //TODO add validation
        //$data = $request->validated();

        $userCart = UserCart::find($request->userCartId);
        $cartProducts = $userCart->cart_products;



        $data = $request->input();

        foreach ($data['cartItems'] as $item) {
            $productHash = $item['hash'];

            $existingCartProduct = $cartProducts->first(function ($cartProduct) use ($productHash) {
                return $cartProduct->hash == $productHash;
            });

            if ($existingCartProduct) {
                $this->update_product($item, $existingCartProduct);
            } else {
                $this->add_product($item, $userCart);
            }
        }

        $existingCartProductHashes = collect($data['cartItems'])->pluck('hash');

        foreach ($cartProducts as $cartProductItem) {
            if (!$existingCartProductHashes->contains($cartProductItem->hash)) {
                // Detach the excluded ingredients
                $cartProductItem->excluded_ingredients()->detach();

                // Detach the toppings
                $cartProductItem->toppings()->detach();

                // Delete the cart product
                $cartProductItem->delete();
            }
        }

        return response('Cart Synced Successfully', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserCart $userCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserCartRequest $request, UserCart $userCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserCart $userCart)
    {
        //
    }

    private function add_product($data, UserCart $userCart): void {
        $hash = $data['hash'];
        $productData = $data['product'];
        $quantity = $data['quantity'];

        $cartProduct = new CartProduct([
            'hash' => $hash,
            'quantity' => $quantity,
            'product_id' => $productData['productId'],
            'size_spec_id' => $productData['selectedSizeId'],
            'dough_spec_id' => (empty($productData['selectedDoughId'])) ?
                $productData['selectedDoughId'] : null,
        ]);

        $userCart->cart_products()->save($cartProduct);

        if(!empty($productData['removedIngredientsId'])) {
            $cartProduct->excluded_ingredients()->sync($productData['removedIngredientsId']);
        }

        if(!empty($productData['selectedToppingsId'])) {
            $cartProduct->toppings()->sync($productData['selectedToppingsId']);
        }
    }

    private function update_product($data, CartProduct $existingCartProduct): void {
        $hash = $data['hash'];
        $productData = $data['product'];
        $quantity = $data['quantity'];

        $existingCartProduct->update([
            'hash'=> $hash,
            'quantity' => $quantity,
            'size_spec_id' => $productData['selectedSizeId'],
            'dough_spec_id' => (empty($productData['selectedDoughId'])) ?
                $productData['selectedDoughId'] : null,
        ]);

        if(!empty($productData['removedIngredientsId'])) {
            $existingCartProduct->excluded_ingredients()->sync($productData['removedIngredientsId']);
        }

        if(!empty($productData['selectedToppingsId'])) {
            $existingCartProduct->toppings()->sync($productData['selectedToppingsId']);
        }
    }
}
