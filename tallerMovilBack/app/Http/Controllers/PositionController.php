<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $positions = Position::all();
        if($positions->isEmpty()){
            return response()->json(['message' => 'No hay posiciones registradas'], 404);
        }
        return response()->json($positions, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $positions = new Position();{
            $positions->department_id = $request->department_id;
            $positions->name = $request->name;
            $positions->hourly_rate = $request->hourly_rate;
            $positions->save();
            return response()->json(['message' => 'Posición registrada'], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $position = Position::find($id);
        if($position == null){
            return response()->json(['message' => 'Posición no encontrada'], 404);
        }
        return response()->json($position, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
        $position = Position::find($id);
        if($position == null){
            return response()->json(['message' => 'Posición no encontrada'], 404);
        }
        $position->name = $request->name;
        $position->hourly_rate = $request->hourly_rate;
        $position->save();
        return response()->json(['message' => 'Posición actualizada'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
        $position = Position::find($id);
        if($position == null){
            return response()->json(['message' => 'Posición no encontrada'], 404);
        }
        $position->delete();
        return response()->json(['message' => 'Posición eliminada'], 200);
    }
}
