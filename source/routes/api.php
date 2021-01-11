<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Route::middleware('api')->get('inventory', [InventoryController::class, 'showItems'])->name('saveItemAPI');
//Route::middleware('api')->post('inventory', [InventoryController::class, 'createitem'])->name('showItemsAPI');


Route::middleware('api')->get('department', [DepartmentController::class, 'getDepartments'])->name('showDepartamentsAPI');
Route::middleware('api')->get('department/{id}', [DepartmentController::class, 'getDepartment'])->name('showOneDepartamentsAPI');
Route::middleware('api')->post('department', [DepartmentController::class, 'addDepartment'])->name('createDepartamentAPI');
Route::middleware('api')->put('department/{id}', [DepartmentController::class, 'updateDepartment'])->name('updateOneDepartamentsAPI');
