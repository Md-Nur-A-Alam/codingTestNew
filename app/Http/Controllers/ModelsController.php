<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    public function index()
    {
        $models_display = DB::select('  SELECT 
                                    t2.name brand_name,
                                    t1.name model_name, 
                                    t1.entry_date
                                FROM `models` as t1
                                JOIN `brand` as t2 ON t1.brand_id=t2.id;'
                                );
        $brands = DB::select('SELECT id, name FROM brand');
        return view('models.index', compact('models_display', 'brands'));
    }
}
