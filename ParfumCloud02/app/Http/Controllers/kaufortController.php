<?php
 
 namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
 use App\Models\Kaufort;
  
 class KaufortController extends Controller
 {
     public function index()
     {
         $kauforte = Kaufort::all();
         return response()->json($kauforte);
     }
  
     public function show($id)
     {
         $kaufort = Kaufort::findOrFail($id);
         if (!$kaufort) {
             return response()->json(['message' => 'Kaufort not found'], 404);
         }
         return response()->json($kaufort);
     }
  
     public function destroy($id)
     {
         $kaufort = Kaufort::findOrFail($id);
         if (!$kaufort) {
             return response()->json(['message' => 'Kaufort not found'], 404);
         }
    
         $kaufort->delete();
    
         return response()->json(['message' => 'Kaufort successfully deleted']);
     }
  
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'land' => 'required|max:100',
             'kanton' => 'required|max:100',
             'ort' => 'required|max:100',
             'PLZ' => 'required|integer',
             'strasse' => 'required|max:200',
             'strassennummer' => 'required|integer',
         ]);
  
         $kaufort = Kaufort::findOrFail($id);
  
         $kaufort->update($validatedData);
  
         return response()->json($kaufort, 200);
     }
 
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'land' => 'required|max:100',
             'kanton' => 'required|max:100',
             'ort' => 'required|max:100',
             'PLZ' => 'required|integer',
             'strasse' => 'required|max:200',
             'strassennummer' => 'required|integer',
         ]);
         $kaufort = Kaufort::create($validatedData);
         return response()->json($kaufort, 201);
     }
 }