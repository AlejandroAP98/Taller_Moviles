<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        if($employees->isEmpty()){
            return response()->json(['message' => 'No hay empleados registrados'], 404);
        }
        return response()->json($employees, 200);

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
        $employees = new Employee();{
            $employees->position_id = $request->position_id;
            $employees->name = $request->name;
            $employees->lastname = $request->lastname;
            $employees->card= $request->card;
            $employees->start_date = $request->start_date;
            $employees->start_contract_date = $request->start_contract_date;
            $employees->save();
            return response()->json(['message' => 'Empleado registrado'], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::find($id);
        if($employee == null){
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        return response()->json($employee, 200);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee = Employee::find($id);
        if($employee == null){
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $employee->position_id = $request->position_id;
        $employee->name = $request->name;
        $employee->lastname = $request->lastname;
        $employee->card= $request->card;
        $employee->start_date = $request->start_date;
        $employee->start_contract_date = $request->start_contract_date;
        $employee->save();
        return response()->json(['message' => 'Empleado actualizado'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::find($id);
        if($employee == null){
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }
        $employee->delete();
        return response()->json(['message' => 'Empleado eliminado'], 200);
        //
    }
}
