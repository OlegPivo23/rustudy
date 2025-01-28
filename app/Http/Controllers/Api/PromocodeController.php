<?php

namespace App\Http\Controllers\api;

use App\Models\Promocode;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RestController;

class PromocodeController extends RestController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $getcode = $request->promocode;
        $promocode = Promocode::where('code', $getcode)->first();

        if ($promocode) {
            if ($promocode->end >= date('Y-m-d')) {
                $promocode->active = 1;
            } else {
                $promocode->active = 0;
            }
            return response()->json($promocode);
        } else {
            return response()->json("no such promocode");
        }
    }

    /**
     * Get all promocodes.
     */
    public function getAllPromocodes()
    {
        $promocodes = Promocode::all(); // Получение всех промокодов
        return response()->json($promocodes);
    }
}
