<?php

namespace App\Http\Controllers;

use App\Clock;
use App\Http\Requests\ClockRequest;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class ClockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Clock::all();
        dd($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addOrUpdateClock');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClockRequest $request)
    {
        $clock = Clock::create([
            "name" => $request->input("name"),
            "gender" => $request->input("gender"),
            "type_of_indexation" => $request->input("typeOfIndexation"),
            "type_of_mechanism" => $request->input("typeOfMechanism"),
            "producer" => $request->input("producer"),
            "price" => $request->input("price"),
            "old_price" => $request->input("oldPrice"),
            "availability" => $request->input("availability"),
            "hide" => $request->input("hide"),
            ]);
        return redirect('admin/clocks/'.$clock->clock_id.'/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Clock::find($id);
        if ($data == null) return abort(404);
        $data = $data->toArray();
        return view('admin.addOrUpdateClock')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClockRequest $request, $id)
    {
        $clock = Clock::find($id);
        $clock->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            "type_of_indexation" => $request->input("typeOfIndexation"),
            "type_of_mechanism" => $request->input("typeOfMechanism"),
            "producer" => $request->input("producer"),
            "price" => $request->input("price"),
            "old_price" => $request->input("oldPrice"),
            "availability" => $request->input("availability"),
            "hide" => $request->input("hide"),
        ]);
        $data = Clock::find($id)->toArray();
        return $data;
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

    public function test (Request $request)
    {
        dd($request);
    }
}
