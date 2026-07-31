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

        return redirect()->route('brands.index')->with('success', 'Brand added successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
        ]);

        DB::update('UPDATE brand SET name = ? WHERE id = ?', [
            $request->name,
            $id
        ]);

        return redirect()->route('brands.index')->with('warning', 'Brand updated successfully');
    }

    public function destroy($id)
    {
        DB::delete('DELETE FROM brand WHERE id = ?', [$id]);
        return redirect()->route('brands.index')->with('error', 'Brand deleted successfully');
    }
}
