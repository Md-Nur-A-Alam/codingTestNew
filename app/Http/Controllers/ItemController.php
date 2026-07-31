<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $items_display = DB::select('  SELECT 
                                    t1.id,
                                    t1.brand_id,
                                    t1.model_id,
                                    t3.name as brand_name,
                                    t2.name as model_name,
                                    t1.name as item_name, 
                                    t1.entry_date
                                FROM `items` as t1
                                JOIN `models` as t2 ON t1.model_id=t2.id
                                JOIN `brand` as t3 ON t1.brand_id=t3.id
                                ORDER BY t1.entry_date DESC, t1.id DESC;'
                                );
        $brands = DB::select('SELECT id, name FROM brand ORDER BY name ASC');
        $modelsList = DB::select('SELECT id, name, brand_id FROM models ORDER BY name ASC');
        return view('items.index', compact('items_display', 'brands', 'modelsList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|integer',
            'model_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);

        DB::insert('INSERT INTO items (brand_id, model_id, name, entry_date) VALUES (?, ?, ?, ?)', [
            $request->brand_id,
            $request->model_id,
            $request->name,
            now()
        ]);

        return redirect()->route('items.index')->with('success', 'Item added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_id' => 'required|integer',
            'model_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);

        DB::update('UPDATE items SET brand_id = ?, model_id = ?, name = ? WHERE id = ?', [
            $request->brand_id,
            $request->model_id,
            $request->name,
            $id
        ]);

        return redirect()->route('items.index')->with('warning', 'Item updated successfully');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM items WHERE id = ?', [$id]);
        return redirect()->route('items.index')->with('error', 'Item deleted successfully');
    }
}
