<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\duftnoten;
 
class duftnotenController extends Controller
{
    public function index()
    {
        $duftnoten = duftnoten::all();
        return response()->json($duftnoten);
    }
 
    public function show($id)
    {
        $duftnoten = duftnoten::findOrFail($id);
        if (!$duftnoten) {
            return response()->json(['message' => 'duftnotene not found'], 404);
        }
        return response()->json($duftnoten);
    }
 
    public function destroy($id)
    {
    $duftnoten = duftnoten::findOrFail($id);
    if (!$duftnoten) {
        return response()->json(['message' => 'duftnoten nicht gefunden'], 404);
    }
   
    $duftnoten->delete();
   
    return response()->json(['message' => 'duftnoten erfolgreich gelöscht']);
    }
 
 
    public function update(Request $request, $id)
 
    {
        $validatedData = $request->validate([

            'kopfnote' => 'required|max:200',
            'herznote' => 'required|max:200',
            'basisnote' => 'required|max:200',
        ]);
 
        $duftnoten = duftnoten::findOrFail($id);
 
        $duftnoten->update($validatedData);
 
        return response()->json($duftnoten, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'kopfnote' => 'required|max:200',
            'herznote' => 'required|max:200',
            'basisnote' => 'required|max:200',
        ]);
        $duftnoten = duftnoten::create($validatedData);
        return response()->json($duftnoten, 201);
    }

}