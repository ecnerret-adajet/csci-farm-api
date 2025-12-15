<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MaterialApplication;

class MaterialApplicationController extends Controller
{
    public function index(){
        $materialApplication = MaterialApplication::with('material', 'farmActivity')->get();

        return response()->json($materialApplication);
    }

    public function show($id){
        $materialApplication = MaterialApplication::with('material', 'farmActivity')->find($id);

        if(!$materialApplication){
            return response()->json(['message' => 'Material Application not found'], 404);
        }

        return response()->json($materialApplication);
    }

    public function store(Request $request){
        $materialApplication = MaterialApplication::create($request->all());

        if(!$materialApplication){
            return response()->json(['message' => 'Material Application not created'], 404);
        }

        return response()->json($materialApplication);
    }

    public function edit($id){
        $materialApplication = MaterialApplication::find($id);

        if(!$materialApplication){
            return response()->json(['message' => 'Material Application not found'], 404);
        }

        return response()->json($materialApplication);
    }

    public function update(Request $request, $id){
        $materialApplication = MaterialApplication::find($id);

        if(!$materialApplication){
            return response()->json(['message' => 'Material Application not found'], 404);
        }

        $materialApplication->update($request->all());

        return response()->json($materialApplication);
    }

    public function destroy($id){
        $materialApplication = MaterialApplication::find($id);

        if(!$materialApplication){
            return response()->json(['message' => 'Material Application not found'], 404);
        }

        $materialApplication->delete();

        return response()->json(['message' => 'Material Application deleted successfully']);
    }
}


