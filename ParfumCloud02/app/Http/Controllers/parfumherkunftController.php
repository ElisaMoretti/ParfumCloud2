<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Parfumherkunft;
use App\Models\parfum;
 
class ParfumherkunftController extends Controller
{
    public function index()
    {
        $parfumherkunft = Parfumherkunft::all();
        return response()->json($parfumherkunft);
    }
 
    public function show($id)
    {
        $parfumherkunft = Parfumherkunft::findOrFail($id);
        if (!$parfumherkunft) {
            return response()->json(['message' => 'Parfumherkunft not found'], 404);
        }
        return response()->json($parfumherkunft);
    }

    public function search(Request $request)
    {
        $parfumname = $request->input('name');
    
        if (!$parfumname) {
            return response()->json(['message' => 'Parfum not found'], 404);
        }
    
        $parfum = Parfum::where('parfumname', $parfumname)->first();
    
        if (!$parfum) {
            return response()->json(['message' => 'Parfum not found'], 404);
        }
    
        return response()->json($parfum);
    }
 
    public function destroy($id)
    {
        $parfumherkunft = Parfumherkunft::findOrFail($id);
        if (!$parfumherkunft) {
            return response()->json(['message' => 'Parfumherkunft nicht gefunden'], 404);
        }
   
        $parfumherkunft->delete();
   
        return response()->json(['message' => 'Parfumherkunft erfolgreich gelöscht']);
    }
 
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([

            'land' => 'required|max:100',
            'kanton' => 'required|max:50',
        ]);
 
        $parfumherkunft = Parfumherkunft::findOrFail($id);
 
        $parfumherkunft->update($validatedData);
 
        return response()->json($parfumherkunft, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'land' => 'required|max:100',
            'kanton' => 'required|max:50',
        ]);
        $parfumherkunft = Parfumherkunft::create($validatedData);
        return response()->json($parfumherkunft, 201);
    }
}
