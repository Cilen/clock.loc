<?php

namespace App\Http\Controllers;

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
        //
    }


//    Показати список старих замовлень
    public function oldOrders()
    {
        return('Старі замовлення');
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input('firstName');
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');

        } else return response()->json(['error' => 'Корзина товарів пуста'], 403);
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
        //
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
}
