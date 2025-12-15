<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(){
        $attendances = Attendance::with('user', 'field')->get();

        return response()->json($attendances);
    }

    public function show($id){
        $attendance = Attendance::with('user', 'field')->find($id);

        if(!$attendance){
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        return response()->json($attendance);
    }

    public function store(Request $request){
        $image = $request->file('image');

        if($request->hasFile('image')) {
            $key = Str::random(8);

            // Generate a unique file name
            $file_name = $request->user_id . '-' . $key . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/attendances', $image, $file_name);

            $attendance = Attendance::create([
                'user_id' => $request->user_id,
                'date' => $request->date,
                'field_id' => $request->field_id,
                'status' => $request->status,
                'remarks' => $request->remarks,
                'image_url' => asset('storage/images/attendances/' . $file_name)
            ]);

            return response()->json($attendance);
        }

        return response()->json(['message' => 'Image not found'], 404);
    }

    public function edit($id){

    }

    public function update(){

    }

    public function destroy($id){
        $attendance = Attendance::find($id);

        if(!$attendance){
            return response()->json(['message' => 'Attendance not found'], 404);
        }

        $attendance->delete();

        return response()->json(['message' => 'Attendance deleted successfully']);
    }

}
