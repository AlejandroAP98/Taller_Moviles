<?php

namespace App\Http\Controllers;

use App\Models\EmployeesShift;
use Illuminate\Http\Request;

class EmployeesShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employeesShift = EmployeesShift::all();
        if($employeesShift->isEmpty()){
            return response()->json(['message' => 'No hay turnos de empleados registrados'], 404);
        }
        return response()->json($employeesShift, 200);

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
        $employeesShift = new EmployeesShift();{
            $employeesShift->employee_id = $request->employee_id;
            $employeesShift->shift_start = $request->shift_start;
            $employeesShift->shift_end = $request->shift_end;
            $employeesShift->save();
            return response()->json(['message' => 'Turno de empleado registrado'], 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employeesShift = EmployeesShift::find($id);
        if($employeesShift == null){
            return response()->json(['message' => 'Turno de empleado no encontrado'], 404);
        }
        return response()->json($employeesShift, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmployeesShift $employeesShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employeesShift = EmployeesShift::find($id);
        if($employeesShift == null){
            return response()->json(['message' => 'Turno de empleado no encontrado'], 404);
        }
        $employeesShift->employee_id = $request->employee_id;
        $employeesShift->shitf_start = $request->shitf_start;
        $employeesShift->shift_end = $request->shift_end;
        $employeesShift->save();
        return response()->json(['message' => 'Turno de empleado actualizado'], 200);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employeesShift = EmployeesShift::find($id);
        if($employeesShift == null){
            return response()->json(['message' => 'Turno de empleado no encontrado'], 404);
        }
        $employeesShift->delete();
        return response()->json(['message' => 'Turno de empleado eliminado'], 200);
    }
}
