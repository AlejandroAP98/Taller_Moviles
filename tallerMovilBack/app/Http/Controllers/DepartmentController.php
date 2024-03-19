<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::all();
        if($departments->isEmpty()){
            return response()->json(['message' => 'No hay departamentos registrados'], 404);
        }
        return response()->json($departments, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $departments = new Department();{
            $departments->name = $request->name;
            $departments->save();
            return response()->json(['message' => 'Departamento registrado'], 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $department = Department::find($id);
        if($department == null){
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        return response()->json($department, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $department = Department::find($id);
        if($department == null){
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        $department->name = $request->name;
        $department->save();
        return response()->json(['message' => 'Departamento actualizado'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $department = Department::find($id);
        if($department == null){
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        }
        $department->delete();
        return response()->json(['message' => 'Departamento eliminado'], 200);
        
    }
}
