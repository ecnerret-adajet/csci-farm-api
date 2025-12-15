<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Material;

class MaterialController extends Controller
{
    public function index(){
        $materials = Material::all();

        return response()->json($materials);
    }

    public function show($id){
        $material = Material::find($id);

        if(!$material){
            return response()->json(['message' => 'Material not found'], 404);
        }

        return response()->json($material);
    }

    public function edit($id){
        $material = Material::find($id);

        if(!$material){
            return response()->json(['message' => 'Material not found'], 404);
        }

        return response()->json($material);
    }

    public function update(Request $request, $id){
        $material = Material::find($id);

        if(!$material){
            return response()->json(['message' => 'Material not found'], 404);
        }

        $material->update($request->all());

        return response()->json($material);
    }

    public function destroy($id){
        $material = Material::find($id);

        if(!$material){
            return response()->json(['message' => 'Material not found'], 404);
        }

        $material->delete();

        return response()->json(['message' => 'Material deleted successfully']);
    }
}
