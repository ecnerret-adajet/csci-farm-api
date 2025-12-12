<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;

class FieldController extends Controller
{
    public function index(){
        $fields = Field::with('cluster');
        
        try {
            $fields = $fields->get();
        } catch (\Exception $e) {
            return response()->json(['message' => $e], 404);
        }


        return response()->json($fields);
    }

    public function store(){
        $field = Field::create(request()->all());

        return response()->json($field);
    }

    public function show($id){
        $field = Field::with('cluster')->find($id);

        if(!$field){
            return response()->json(['message' => 'Field not found'], 404);
        }

        return response()->json($field);
    }

    public function edit($id){
        $field = Field::with('cluster')->find($id);

        if(!$field){
            return response()->json(['message' => 'Field not found'], 404);
        }

        return response()->json($field);
    }

    public function update(Request $request, $id){
        $field = Field::find($id);
        $field->update($request->all());
        
        if(!$field){
            return response()->json(['message' => 'Field not updated'], 500);
        }

        return response()->json($field);
    }

    public function destroy($id){
        $field = Field::find($id);
        $field->delete();

        return response()->json(['message' => 'Field deleted successfully']);
    }
}
