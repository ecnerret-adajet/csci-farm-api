<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cluster;

class ClusterController extends Controller
{
    public function index(){
        $clusters = Cluster::with('farm')->get();

        return response()->json($clusters);
    }

    public function show($id){
        $cluster = Cluster::with('farm')->find($id);

        if(!$cluster){
            return response()->json(['message' => 'Cluster not found'], 404);
        }

        return response()->json($cluster);
    }

    public function store(Request $request){
        $cluster = Cluster::create($request->all());

        return response()->json($cluster);
    }

    public function edit($id){
        $cluster = Cluster::with('farm')->find($id);
        //handle if not exist
        if(!$cluster){
            return response()->json(['message' => 'Cluster not found'], 404);
        }

        return response()->json($cluster);
    }

    public function update(Request $request, $id){
        $cluster = Cluster::with('farm')->find($id);
        $cluster->update($request->all());

        // handle if missing input
        if(!$cluster){
            return response()->json(['message' => 'Cluster not updated'], 500);
        }

        return response()->json([
            'message' => 'Cluster updated successfully',
            'cluster' => $cluster,
            'status' => 200
        ]);
    }

    public function destroy($id){
        $cluster = Cluster::find($id);
        $cluster->delete();

        return response()->json(['message' => 'Cluster deleted successfully']);
    }
}
