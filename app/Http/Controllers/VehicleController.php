<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('index')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        $vehicle->save();
        $vehicles = Vehicle::all();
        return view('index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return view('show')->with('vehicle', $vehicle);
        } else {
            return view('show')->with('msg', 'Veículo não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        if ($vehicle) {
            return view('edit')->with('vehicle', $vehicle);
        } else {
            $vehicles = Vehicle::all();
            return view('index')->with('vehicles', $vehicles)
                ->with('msg', 'Veículo não encontrado!');
        }
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
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->input('name');
        $vehicle->year = $request->input('year');
        $vehicle->color = $request->input('color');
        $vehicle->save();
        $vehicles = Vehicle::all();
        return view('index')->with('vehicles', $vehicles)
            ->with('msg', 'Veículo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        $vehicles = Vehicle::all();
        return view('index')->with('vehicles', $vehicles)
            ->with('msg', "Veículo excluído com sucesso!");
    }
}
