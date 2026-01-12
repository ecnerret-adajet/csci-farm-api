<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Farm;

class FarmController extends Controller
{
    public function index()
    {
        $farms = Farm::with('company')->get();

        return response()->json($farms);
    }

    public function show($id){
        $farm = Farm::with('company')->find($id);

        if(!$farm){
            return response()->json(['message' => 'Farm not found'], 404);
        }

        return response()->json($farm);
    }

    public function store(Request $request){
        $farm = Farm::create($request->all());

        return response()->json($farm);
    }

    public function edit($id){
        $farm = Farm::with('company')->find($id);

        if(!$farm){
            return response()->json(['message' => 'Farm not found'], 404);
        }

        return response()->json($farm);
    }

    public function update(Request $request, $id){
        $farm = Farm::find($id);
        $farm->update($request->all());

        if(!$farm){
            return response()->json(['message' => 'Farm not updated'], 500);
        }

        return response()->json($farm);
    }

    public function destroy($id){
        $farm = Farm::find($id);
        $farm->delete();

        return response()->json(['message' => 'Farm deleted successfully']);
    }

    public function assignedFarms($company_id){
        $farms = Farm::with('company')->where('company_id', $company_id)->get();
        
        if(!$farms){
            return response()->json(['message' => 'Farms not found'], 404);
        }

        $farmsCount = count($farms);

        return response()->json(
            [
                'farms' => $farms,
                'farmsCount' => $farmsCount
            ], 200
        );
    }
}
