<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\parfum;

class parfumController extends Controller
{
    public function index()
    {
        $parfums = parfum::all();
        return response()->json($parfums);
    }

    public function show($id)
    {
        $parfum = parfum::findOrFail($id);
        return response()->json($parfum);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'parfumname' => 'required|max:100',
            'marke' => 'required|max:100',
            'parfumstaerke' => 'required|integer',
            'menge' => 'required|integer',
            'beschreibung' => 'nullable|max:100',
            'inhaltsstoffe' => 'nullable|max:200',
            'bewertung' => 'nullable|max:10',
            'preis' => 'required|numeric|between:0,999999.99',
            'geschlecht' => 'required|max:20'
        ]);

        $parfum = parfum::create($validatedData);
        return response()->json($parfum, 201);
    }

    public function update(Request $request, $id)
    {
        $parfum = parfum::findOrFail($id);

        $validatedData = $request->validate([
            'parfumname' => 'required|max:100',
            'marke' => 'required|max:100',
            'parfumstaerke' => 'required|integer',
            'menge' => 'required|integer',
            'beschreibung' => 'nullable|max:100',
            'inhaltsstoffe' => 'nullable|max:200',
            'bewertung' => 'nullable|max:10',
            'preis' => 'required|numeric|between:0,999999.99',
            'geschlecht' => 'required|max:20'
        ]);

        $parfum->update($validatedData);
        return response()->json($parfum, 200);
    }

    public function destroy($id)
    {
        $parfum = parfum::findOrFail($id);
        $parfum->delete();
        return response()->json(null, 204);
    }
}
