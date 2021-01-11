<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryItem;
use Illuminate\Support\Facades\Validator;


class InventoryController extends Controller
{
    public function showItems ()
    {
        $inventory = InventoryItem::paginate(10);

        return response()->json($inventory);
    }

    public function createItem (Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:150|min:3',
                'manufacturer' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors(),
                    'message' => 'Imposible crear un nuevo item'
                ],
                400
            );
        }

        $item = InventoryItem::create($validator->valid());

        if($item){
            return response()->json(
                [
                    "success" => $item,
                    "message" => "Item creado com suceso!"
                ],
                 201);
        }

        return response()->json(["success"=> false, "message" => "" ], 422);
    }
}
