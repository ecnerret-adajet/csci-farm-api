<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FarmActivityLog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FarmActivitivityLogController extends Controller
{
    public function index(){
        $farmActivityLogs = FarmActivityLog::with(['farmActivity', 'user'])->get();

        return response()->json($farmActivityLogs);
    }

    public function store(Request $request){
        $image_url = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    // Generate a random key
                    $key = Str::random(8);

                    // Generate a unique file name
                    $file_name = $request->farm_activity_id . '-' . $key . '.' . $image->getClientOriginalExtension();
                    Storage::disk('public')->putFileAs('images/farm-activity-log', $image, $file_name);
                    
                    // Add the image URL to the array
                    $image_url[] = asset('storage/images/farm-activity-log/' . $file_name);
                }
            }
        }

        $farmActivityLog = FarmActivityLog::create([
            'farm_activity_id' => $request->farm_activity_id,
            'user_id' => $request->user_id,
            'date' => $request->date,
            'mandays_accomplished' => $request->mandays_accomplished,
            'image_url' => json_encode($image_url),
            'remarks' => $request->remarks
        ]);

        // Check if the log creation failed
        if (!$farmActivityLog) {
            return response()->json(['message' => 'Farm Activity Log not created'], 500);
        }

        // Return the created farm activity log
        return response()->json([
            'message' => 'Farm Activity Log created successfully',
            'farmActivityLog' => $farmActivityLog,
            'status' => 200
        ]);
    }



    public function show($id){
        $farmActivityLog = FarmActivityLog::with(['farmActivity', 'user'])->find($id);

        if(!$farmActivityLog){
            return response()->json(['message' => 'Farm Activity Log not found'], 404);
        }

        return response()->json($farmActivityLog);
    }

    public function edit($id){
        $farmActivityLog = FarmActivityLog::find($id);

        if(!$farmActivityLog){
            return response()->json(['message' => 'Farm Activity Log not found'], 404);
        }

        return response()->json($farmActivityLog);
    }

    public function update(Request $request, $id){
        $image_url = [];

        $farmActivityLog = FarmActivityLog::find($id);

        if(!$farmActivityLog){
            return response()->json(['message' => 'Farm Activity Log not found'], 404);
        }

        $farmActivityLog->update($request->all());

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if ($image->isValid()) {
                    $key = Str::random(8);

                    // Generate a unique file name
                    $file_name = $request->farm_activity_id . '-' . $key . '.' . $image->getClientOriginalExtension();
                    Storage::disk('public')->putFileAs('images/farm-activity-log', $image, $file_name);
                    
                    // Add the image URL to the array
                    $image_url[] = asset('storage/images/farm-activity-log/' . $file_name);
                }
            }
        }

        // Update the farm activity log with the image URLs
        $farmActivityLog->update([
            'image_url' => json_encode($image_url)
        ]);

        return response()->json([
            'message' => 'Farm Activity Log updated successfully',
            'farmActivityLog' => $farmActivityLog,
            'status' => 200
        ]);
    }

    public function destroy($id){
        $farmActivityLog = FarmActivityLog::find($id);

        if(!$farmActivityLog){
            return response()->json(['message' => 'Farm Activity Log not found'], 404);
        }

        $farmActivityLog->delete();

        return response()->json(['message' => 'Farm Activity Log deleted successfully']);
    }
}
