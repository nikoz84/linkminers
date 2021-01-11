<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\InventoryItem;
use App\Models\Manufacturer;

class WebController extends Controller
{

    /** departaments list */
    public function showDepartments()
    {
        $paginator = Department::paginate(5);

        return view('home')->with('paginator', $paginator);
    }

    public function showOneDepartment($id)
    {
        $department = Department::findOrFail($id);

        return view('show-department')->with('department', $department);
    }
}
