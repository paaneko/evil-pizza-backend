<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\CartProductResource;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\UserCart;

class OrderController extends Controller
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
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();

        $cartTotalPrice = 0;

        $userCart = UserCart::findOrFail($data['orderCartId']);
        $cartProducts = $userCart->cart_products()->with('product', 'toppings', 'excluded_ingredients')->get();

        $cartItems = CartProductResource::collection($cartProducts);


        // TODO fix that workaround

        foreach (json_decode(json_encode($cartItems, true)) as $key => $cartItem) {
            $cartTotalPrice += ($cartItem->product->discountTotalPrice ?? $cartItem->product->totalPrice) * $cartItem->quantity;
        }

        $order = Order::create([
            'number' => 'OR-' . random_int(10000000, 99999999),
            'name' => $data['orderInfo']['name'],
            'phone_number' => $data['orderInfo']['phoneNumber'],
            'email' => $data['orderInfo']['email'] ?? null,
            'payment_type' => $data['orderInfo']['paymentMethod'],
            'total_price' => $cartTotalPrice,
        ]);

//        $address = OrderAddress::create([
//            'street' => $data['orderInfo']['street'],
//            'house_number' => $data['orderInfo']['houseNumber'],
//            'entrance' => $data['orderInfo']['entrance'] ?? null,
//            'apartment' => $data['orderInfo']['apartment'] ?? null,
//            'floor' => $data['orderInfo']['floor'] ?? null,
//            'code' => $data['orderInfo']['code'] ?? null,
//        ]);

        $address = new OrderAddress([
            'street' => $data['orderInfo']['street'],
            'house_number' => $data['orderInfo']['houseNumber'],
            'entrance' => $data['orderInfo']['entrance'] ?? null,
            'apartment' => $data['orderInfo']['apartment'] ?? null,
            'floor' => $data['orderInfo']['floor'] ?? null,
            'code' => $data['orderInfo']['code'] ?? null,
        ]);

        $order->address()->save($address);

        $userCart->order_id = $order->id;
        $userCart->save();

        return response($data,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
