<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModelsController extends Controller
{
    public function index()
    {
        $models_display = DB::select('  SELECT 
                                    t1.id,
                                    t2.name as brand_name,
                                    t1.brand_id,
                                    t1.name as model_name, 
                                    t1.entry_date
                                FROM `models` as t1
                                JOIN `brand` as t2 ON t1.brand_id=t2.id
                                ORDER BY t1.id DESC;'
                                );
        $brands = DB::select('SELECT id, name FROM brand ORDER BY name ASC');
        return view('models.index', compact('models_display', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);

        DB::insert('INSERT INTO models (brand_id, name, entry_date) VALUES (?, ?, ?)', [
            $request->brand_id,
            $request->name,
            now()
        ]);

        return redirect()->route('models.index')->with('success', 'Model added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);

        DB::update('UPDATE models SET brand_id = ?, name = ? WHERE id = ?', [
            $request->brand_id,
            $request->name,
            $id
        ]);

        return redirect()->route('models.index')->with('warning', 'Model updated successfully');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM models WHERE id = ?', [$id]);
        return redirect()->route('models.index')->with('error', 'Model deleted successfully');
    }
}
