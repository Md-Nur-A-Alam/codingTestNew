<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index()
    {
        $brands = DB::select('SELECT * FROM brand ORDER BY id DESC');
        return view('brands.index', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        DB::insert('INSERT INTO brand (name, entry_date) VALUES (?, ?)', [
            $request->name,
            now()
        ]);

        return response()->json(['success' => true]);
    }
}
