<?php

namespace Modules\Inventory\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Inventory\App\Http\Requests\StoreInventoryRequest;
use Modules\Inventory\App\Models\Inventory;
use Throwable;

class InventoryController extends Controller
{
    public function index(){
        try{
            return response()->json(Inventory::all());
        }
        catch(Throwable $th){
            return response()->json($th->getMessage());
        }
    }

    public function store(StoreInventoryRequest $request){
        try{
            $payload  = $request->validated();
            Inventory::create($payload );
            return response()->json($payload);
        }
        catch(Throwable $th){
            return response()->json($th->getMessage());
        }
    }
}
