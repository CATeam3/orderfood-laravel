<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Http\Resources\OrdersResource;
use App\Models\Order;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends BaseController
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
    public function store(Request $request)
    {

        $order = Order::create([
            'status_id' => 1,
            'user_id' => Auth::user()->id,
            'ordertime' => $request->ordertime ?? now(),
        ]);

        $order->menu()->attach($request->input('items'));


        return $this->sendResponse($order, 'Order successfuly created.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $orders = OrdersResource::collection($orders);
        return $this->sendResponse($orders, 'Order items fetched succsessfuly.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
