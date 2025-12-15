<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmActivity;

class FarmActivityController extends Controller
{
    public function index($fieldId){
        if (!$fieldId || $fieldId == 'null') {
            return response()->json(['message' => 'Missing field id'], 400);
        }

        $farmActivities = FarmActivity::with(['activityType', 'field'])
            ->where('field_id', $fieldId)
            ->orderBy('planned_start_date', 'asc')
            ->get();

        return response()->json($farmActivities);
    }

    public function show($id){
        $farmActivity = FarmActivity::with(['activityType', 'field'])->find($id);

        if(!$farmActivity){
            return response()->json(['message' => 'Farm Activity not found'], 404);
        }

        return response()->json($farmActivity);
    }

    public function store(Request $request){
        $farmActivity = FarmActivity::create($request->all());

        return response()->json($farmActivity);
    }

    public function edit($id){
        $farmActivity = FarmActivity::find($id);

        if(!$farmActivity){
            return response()->json(['message' => 'Farm Activity not found'], 404);
        }

        return response()->json($farmActivity);
    }

    public function update(Request $request, $id){
        $farmActivity = FarmActivity::find($id);

        if(!$farmActivity){
            return response()->json(['message' => 'Farm Activity not found'], 404);
        }

        $farmActivity->update($request->all());

        return response()->json([
            'message' => 'Farm Activity updated successfully',
            'farmActivity' => $farmActivity,
            'status' => 200
        ]);
    }

    public function destroy($id){
        $farmActivity = FarmActivity::find($id);

        if(!$farmActivity){
            return response()->json(['message' => 'Farm Activity not found'], 404);
        }

        $farmActivity->delete();

        return response()->json(['message' => 'Farm Activity deleted successfully']);
    }
}
