<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items_display = DB::select('  SELECT 
                                    t3.name brand_name,
                                    t2.name model_name,
                                    t1.name item_name, 
                                    t1.entry_date
                                FROM `items` as t1
                                JOIN `models` as t2 ON t1.model_id=t2.id
                                JOIN `brand` as t3 ON t1.brand_id=t3.id;'
                                );
        $brands = DB::select('SELECT id, name FROM brand');
        $modelsList = DB::select('SELECT id, name FROM models');
        return view('items.index', compact('items_display', 'brands', 'modelsList'));
    }
}
