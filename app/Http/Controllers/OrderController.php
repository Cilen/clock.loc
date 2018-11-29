<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use NovaPoshta\ApiModels\Address;
use NovaPoshta\MethodParameters\Address_getWarehouses;
use NovaPoshta\MethodParameters\Address_getCities;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    Показати список нових замовлень
    public function index()
    {
        $data = Order::where('revised', false)->orderBy('order_id', 'desc')->get()->toArray();
        return view('admin.ordersTable')->with(['data' => $data, 'title' => "Нові замовлення"]);
    }

//    Показати список старих замовлень
    public function oldOrders()
    {
        $data = Order::where('revised', true)->orderBy('order_id', 'desc')->get()->toArray();
        return view('admin.ordersTable')->with(['data' => $data, 'title' => "Старі замовлення"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('checkout');

    }

    /**
     * Додати нове замовлення в базу даних
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $order = Order::create([
                'client_first_name' => $request->input('firstName'),
                'client_last_name' => $request->input('lastName'),
                'phone' => $request->input('phone'),
                'city' => $request->input('city'),
                'warehous' => $request->input('warehous'),
                'delivery_method' => $request->input('deliveryMethod'),
                'pay_method' => $request->input('payMethod'),
                'total_price' => $cart->totalPrice,
                'revised' => false
            ]);
            if (!$order) return response()->json(['error' => 'Creation Order'], 500);
            $data = [];
            foreach ($cart->items as $item){
                $data[] = [
                    'order_id' => $order['order_id'],
                    'clock_id' => $item['clockId'],
                    'qty' => $item['qty']
                ];
            }
            $confirmedCart = $order->confirmedCart()->insert($data);
            if (!$confirmedCart) return response()->json(['error' => 'Creation ConfirmedCart'], 500);
        } else return response()->json(['error' => 'Корзина товарів пуста'], 403);
        $request->session()->put('orderId', $order->order_id);
        $request->session()->put('payMethod', $order->pay_method);
        $request->session()->put('confirmedCart', true);
        return response()->json('Created', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $revised = $request->input('revised');
        if (is_bool($revised)) {
            $order = Order::find($id);
            $order->revised = $revised;
            $order->save();
            $data = Order::where('revised', ! $revised)->get()->toArray();
            return $data;
        }
        return response()->json(["error" => "Невірні вхідні дані"], 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getWarehouses(Request $request)
    {
        $data = new Address_getWarehouses();
        $data->setCityRef($request->input('ref'));
        $city = Address::getWarehouses($data)->data;
        return($city);
    }
    public function success(Request $request)
    {
        if (!($request->session()->has('confirmedCart'))) return redirect("/");
        $data['payMethod'] = $request->session()->get('payMethod');
        $data['orderId'] = $request->session()->get('orderId');
        $request->session()->forget('payMethod');
        $request->session()->forget('orderId');
        $request->session()->forget('cart');
        $request->session()->forget('confirmedCart');
        return view('checkoutSuccess')->with('data', $data);
    }
}
