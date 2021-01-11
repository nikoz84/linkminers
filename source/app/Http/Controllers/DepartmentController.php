<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /** show one */
    public function getDepartment(Request $request, $id)
    {
        $departament = Department::findOrFail($id);

        return response()->json($departament, 200);
    }

    /** show all */
    public function getDepartments(Request $request)
    {
        $departaments = Department::paginate(5);

        return response()->json($departaments, 200);
    }
    /** add new */
    public function addDepartment(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:2|max:50', // patern:[a-zA-Zá-úÁ-Ú ]*
                'ubigeoCode' => 'required|min:2|max:2', // patern:[0-9]*
                'status' => "in:" . implode(',', Department::DEPARTMENT_STATUS)
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors(),
                    'message' => 'Verifique sus datos cadastrados'
                ],
                400
            );
        }

        $user = DB::table('users')->where('email', 'teste@gmail.com')->get()->first();

        $department = Department::create([
            'departmentId' => Str::uuid(),
            'name' => $request->name,
            'ubigeoCode' => $request->ubigeoCode,
            'status' => $request->status,
            'createdUser' => $user->id,
            'lastModifiedUser' => $user->id
        ]);

        if($department){
            return response()->json(['item' => $department, 'message' => 'Departamento criado com suceso!'], 201);
        }

        return response()->json(['message' => 'No fue posible crear el departamento'], 422);

    }
    /** update one */
    public function updateDepartment(Request $request, $id)
    {
        $user = DB::table('users')->where('email', 'teste@gmail.com')->get()->first();

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:2|max:50', // patern:[a-zA-Zá-úÁ-Ú ]*
                'ubigeoCode' => 'required|min:2|max:2', // patern:[0-9]*
                'status' => "in:" . implode(',', Department::DEPARTMENT_STATUS)
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors(),
                    'message' => 'Verifique sus datos cadastrados'
                ],
                400
            );
        }

        $department = Department::findOrFail($id);

        $department->name = $request->name;
        $department->ubigeoCode = $request->ubigeoCode;
        $department->status = $request->status;
        $department->createdUser = $user->id;
        $department->lastModifiedUser = $user->id;
        $department->lastModifiedDate = true;

        if($department->save()){
            return response()->json([
                'message' => 'Actualizado con suceso!',
                'department' => $department
            ], 201);
        }

        return response()->json([
            'message' => "Error al actualizar"
        ], 422);


    }
}

