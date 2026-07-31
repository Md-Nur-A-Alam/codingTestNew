<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    public function index()
    {
        $models = DB::select('SELECT * FROM models');
        return view('models.index', compact('models'));
    }
}
